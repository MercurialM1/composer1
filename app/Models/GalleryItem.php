<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryItem extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'image',
        'client',
        'project_date',
        'link',
        'tags',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'project_date' => 'date',
    ];

    /**
     * Получить категорию этой работы
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }

    /**
     * Получить массив slug'ов всех категорий работы.
     * Slug'и хранятся в поле tags через запятую, например: "print,motion"
     * Если tags пустые, возвращается slug основной категории.
     */
    public function getCategorySlugsArray(): array
    {
        if (!empty($this->tags)) {
            return array_filter(array_map('trim', explode(',', $this->tags)));
        }

        return $this->category ? [$this->category->slug] : [];
    }

    /**
     * Получить CSS-классы для фильтрации Cubeportfolio
     */
    public function getFilterClassesAttribute(): string
    {
        return implode(' ', $this->getCategorySlugsArray());
    }

}
