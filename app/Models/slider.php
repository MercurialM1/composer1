<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

#[Table('Slider')] //Вроде название таблицы
class slider extends Model // список с таблицами
{
    public $timestamps = false; //не добавлять время
    protected $fillable = [ //записывает только это
        'Zagalovok',
        'Description',
        'Image',
        'Active',
        'sort',
    ];
    public function order() //sortirovka
    {
        return $this->hasOne(Slider::class, 'id', 'id');
    }
}
