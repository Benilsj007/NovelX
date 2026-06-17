<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'course_name',
        'subject_name',
        'teacher_name',
        'course_duration',
        'course_start_date',
        'marks',
        'credits',
        'semester',
        'description'
    ];
}