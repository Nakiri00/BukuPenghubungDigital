<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function index() {
        return view('teacher_page.app');
      }
      public function teacher_contact_counciler() {
        $students = Student::all();
        $councilors = User::where('user_type_id',3)->get();
        return view('teacher_page.contact_counciler_index')
        ->with('students',$students)
        ->with('councilors',$councilors);

      }

}
