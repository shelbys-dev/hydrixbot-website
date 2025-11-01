<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;


class FaqCategory extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'slug', 'position', 'is_published'];


    protected static function booted(): void
    {
        static::saved(fn() => Cache::forget('faq.all'));
        static::deleted(fn() => Cache::forget('faq.all'));
    }


    public function faqs()
    {
        return $this->hasMany(Faq::class)->orderBy('position');
    }
}
