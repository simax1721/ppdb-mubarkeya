<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lulus_user extends Model
{
    protected $guarded = [''];
    public $incrementing = false;

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    function jurusan() {
        return $this->belongsTo(Jurusan::class, 'jurusans_id', 'id');
    }
}
