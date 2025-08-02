<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentResult;
use App\Models\StudentsComment;
use Illuminate\Http\Request;

class ConcilerDashbordController extends Controller
{
    public function index() {

      return view('counciler_page.app');
    }
    public function create() {
        $students = Student::all();

        return view('counciler_page.view_student_result')
        ->with('students',$students);
  }

    public function store(Request $request)
    {

        $student_result= StudentResult::where('student_id',$request->studnet_id)->get();
        return view('counciler_page.view_student_result_of_selected_studnet')
        ->with('student_result',$student_result);
    }

    // public function comments()
    // {
    //     $comments = StudentsComment::all();
    //     return view('counciler_page.view_student_comment')
    //     ->with('comments',$comments);
    // }

    public function edit()
    {
        //
    }


    public function update(Request $request)
    {
        //
    }

    public function destroy()
    {
        //
    }


}

