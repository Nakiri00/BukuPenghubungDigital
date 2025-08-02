<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudetDashbordController extends Controller
{

      public function index() {
          $student = Student::where('user_id',auth()->user()->id)->first();

        return view('student_page.student_home')->with('student',$student);
      }

      public function edit() {
        return view('student_page.student_home');
      }
}
