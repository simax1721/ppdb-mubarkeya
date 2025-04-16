<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulir_user extends Model
{
    protected $guarded = [''];
    public $incrementing = false;

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    function pilihan1() {
        return $this->belongsTo(Jurusan::class, 'jurusan1', 'id');
    }
    
    function pilihan2() {
        return $this->belongsTo(Jurusan::class, 'jurusan2', 'id');
    }
}
