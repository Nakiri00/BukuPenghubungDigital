<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
       return view('student_page.students.index')->with('students', $students);
    }


    public function create()
    {

        $grades = Grade::all();
        return view('student_page.students.create')->with('grades', $grades);
    }

    public function store(Request $request)
    {
        $student = Student::where('user_id',auth()->user()->id)->first();
        if(!is_null($student) <= 0){
        $validated = $this->validate($request,[
            'dob'=>'required',
            'gender'=>'required',
            'nationality'=>'required',
            'phone_no'=>'required',
            'father_name'=>'required',
            'father_phone_no'=>'required',
            'mother_name'=>'required',
            'mother_phone_no'=>'required',
            'address'=>'required',
            'grade_id'=>'required',
            'religion'=>'required',
        ]);
        $student = new Student;
        $student->user_id = auth()->user()->id;
        $student->name = auth()->user()->name;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->nationality = $request->nationality;
        $student->email = auth()->user()->email;
        $student->phone_no = $request->phone_no;
        $student->father_name = $request->father_name;
        $student->father_phone_no = $request->father_phone_no;
        $student->mother_name = $request->mother_name;
        $student->mother_phone_no = $request->mother_phone_no;
        $student->address = $request->address;
        $student->grade_id = $request->grade_id;
        $student->religion = $request->religion;
        $student->status = 1;
        $student->save();
        Session::flash('success', 'Student  registered successfully');
        // return redirect()->route('customer.index');
        return redirect()->route('student_dashboard');
    }
    Session::flash('error', 'Student  already registered');
    return redirect()->route('student_dashboard');
    }


    public function view_student_result(Student $student)
    {
        $student = Student::where('user_id',auth()->user()->id)->first();
        // dd($student);
        $student_results = StudentResult::where('student_id', $student->id ?? 0)->get();
        return view('student_page.students.view_student_result')
        ->with('student_results',$student_results);
    }
    public function student_contact_counciler(Student $student)
    {
        $students = User::where('user_type_id',3)->get();
        return view('student_page.students.contact_counciler_index')
        ->with('students',$students);
    }




    public function edit(Student $student)
    {
        //
    }


    public function update(Request $request, Student $student)
    {
        //
    }


    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->back()->with('success', 'Student berhasil dihapus.');
    }

}
