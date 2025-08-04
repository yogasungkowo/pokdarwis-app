<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'vision',
        'mission',
        'history',
        'localtion',
        'image',
    ];
}
