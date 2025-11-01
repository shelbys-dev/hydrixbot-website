<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


class Faq extends Model
{
    use HasFactory;


    protected $fillable = [
        'faq_category_id',
        'question',
        'answer_md',
        'is_published',
        'is_featured',
        'position'
    ];


    protected static function booted(): void
    {
        static::saved(fn() => Cache::forget('faq.all'));
        static::deleted(fn() => Cache::forget('faq.all'));
    }


    public function category()
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }
}
