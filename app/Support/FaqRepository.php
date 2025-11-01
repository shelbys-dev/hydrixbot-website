<?php

namespace App\Support;


use App\Models\FaqCategory;
use Illuminate\Support\Facades\Cache;


class FaqRepository
{
    public static function allPublished(): array
    {
        return Cache::remember('faq.all', now()->addHours(6), function () {
            return FaqCategory::query()
                ->where('is_published', true)
                ->orderBy('position')
                ->with(['faqs' => function ($q) {
                    $q->where('is_published', true)->orderBy('position');
                }])
                ->get()
                ->map(fn($cat) => [
                    'id' => $cat->id,
                    'name' => $cat->name,
                    'slug' => $cat->slug,
                    'items' => $cat->faqs->map(fn($f) => [
                        'id' => $f->id,
                        'question' => $f->question,
                        'answer_md' => $f->answer_md,
                        'is_featured' => $f->is_featured,
                    ])->values(),
                ])->values()->all();
        });
    }
}
