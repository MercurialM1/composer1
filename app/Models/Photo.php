<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Table('photos')]
class Photo extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'path',
        'title',
        'description',
        'sort',
        'is_active',
        'image'

    ];
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

}
