<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip', 'name', 'dob', 'gender',
        'teacher_type', 'subject', 'address', 'phone', 'grade_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class); // wali kelas
    }

    public function grades() 
    {
        return $this->belongsToMany(Grade::class, 'grade_teacher'); // guru mapel
    }
}
