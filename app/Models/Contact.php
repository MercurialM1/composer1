<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Contact extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'status',
        'subject',
        'department',
        'user_id',

    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
