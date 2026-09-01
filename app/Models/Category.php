<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
#[Table('categories')]
class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'sort',
        'is_active',
    ];


    public function photos()
{
    return $this->belongsToMany(Photo::class);//чё то типо связи между моделями
}//
}
