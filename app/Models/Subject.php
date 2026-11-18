<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'subject_name',
        'mentor_name',
        'description',
        'duration',
        'category',
        'status',
    ];

    protected $table = 'subjects';
}
