<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsComment extends Model
{
    use HasFactory;
    protected $table = 'student_comments';
    protected $fillable = [
        'user_id',
        'comment',
        'student_id',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function user() // Guru yang memberi komentar
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
