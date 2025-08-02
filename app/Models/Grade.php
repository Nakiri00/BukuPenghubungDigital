<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function student_results()
    {
        return $this->hasMany(StudentResult::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'grade_teacher');
    }

}
