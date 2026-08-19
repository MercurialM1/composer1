<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleryCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Получить все работы в этой категории
     */
    public function items(): HasMany
    {
        return $this->hasMany(GalleryItem::class, 'category_id');
    }

    /**
     * Получить только активные работы
     */
    public function activeItems(): HasMany
    {
        return $this->hasMany(GalleryItem::class, 'category_id')
            ->where('is_active', true)
            ->orderBy('order');
    }
}
