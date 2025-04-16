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
}
