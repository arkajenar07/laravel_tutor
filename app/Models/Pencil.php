<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pencil extends Model
{
    protected $fillable = [
        'brand',
        'color',
        'description',
        'stock',
        'price',
    ];

    protected $table = 'pencils';

}
