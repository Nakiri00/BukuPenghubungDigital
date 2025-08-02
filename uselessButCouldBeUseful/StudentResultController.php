<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentResult;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentResultController extends Controller
{

    public function index()
    {

        $student_results = StudentResult::all();
        return view('teacher_page.student_result.index')
        ->with('student_results',$student_results);
    }


    public function create()
    {
        $grades = Grade::all();
        $subjects = Subject::all();
        $students = Student::all();
        return view('teacher_page.student_result.create')
        ->with('grades',$grades)
        ->with('subjects',$subjects)
        ->with('students',$students);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'grade_id'=>'required',
            'student_id'=>'required',
            'subject_id'=>'required',
            'score'=>'required',
        ]);
       $studnet_result = new StudentResult;
       $studnet_result->user_id = auth()->user()->id;
       $studnet_result->grade_id = $request->grade_id;
       $studnet_result->student_id = $request->student_id;
       $studnet_result->subject_id = $request->subject_id;
       $studnet_result->score = $request->score;
       $studnet_result->status = 1;

       $studnet_result->save();
        Session::flash('success', 'Student Result registered successfully');
        // return redirect()->route('customer.index');
        return redirect()->route('student_result.index');
    }

    public function show(StudentResult $studentResult)
    {
        //
    }


    public function edit($id)
    {
        $grades = Grade::all();
        $students = Student::all();
        $subjects = Subject::all();
        $student_result = StudentResult::findorFail($id);
        return view('teacher_page.student_result.edit')
        ->with('grades',$grades)
        ->with('student_result',$student_result)
        ->with('students',$students)
        ->with('subjects',$subjects);

    }


    public function update(Request $request, StudentResult $studentResult)
    {
        $this->validate($request,[
            'grade_id'=>'required',
            'student_id'=>'required',
            'subject_id'=>'required',
            'score'=>'required',
        ]);
       $studnet_result = $studentResult;
       $studnet_result->user_id = auth()->user()->id;
       $studnet_result->grade_id = $request->grade_id;
       $studnet_result->student_id = $request->student_id;
       $studnet_result->subject_id = $request->subject_id;
       $studnet_result->score = $request->score;
       $studnet_result->status = 1;

       $studnet_result->save();
        Session::flash('success', 'Student Result registered successfully');
        // return redirect()->route('customer.index');
        return redirect()->route('student_result.index');
    }

    public function destroy(StudentResult $studentResult)
    {
        $studentResult->delete();
        Session::flash('success', 'Region Deleted successfully!!');
        return redirect()->back();
    }
}
