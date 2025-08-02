<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'parent_name',
        'nisn',
        'id',
        'name',
        'dob',
        'gender',
        'nationality',
        'email',
        'address',
        'grade_id',
        'status',
        'religion',
    ];
    /**
     * Get the user that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student_results()
    {
        return $this->hasMany(StudentResult::class);
    }
    public function parent() // Orang tua dari siswa
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function comments() // Komentar untuk siswa
    {
        return $this->hasMany(StudentsComment::class, 'student_id');
    }




}
