<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
#[Table(name: 'contact')]
class contact extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'status',

    ];
}
