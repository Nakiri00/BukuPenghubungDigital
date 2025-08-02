<?php

namespace App\Http\Controllers;

use App\Models\Familly;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\StudentsComment;
use App\Models\Grade;
use App\Models\Comment;

class FamillyDashbordController extends Controller
{
    public function index() {
        return view('familly_page.app');
      }
  public function viewStudentResults(){
    $student = Student::where('parent_id', auth()->id())->first();

    if (!$student) {
        return view('familly_page.view_student_result', [
            'student' => null,
            'comments' => [],
        ]);
    }

    $comments = StudentsComment::where('student_id', $student->id)->get();

    return view('familly_page.view_student_result', [
        'student' => $student,
        'comments' => $comments,
    ]);}



    public function storeStudent(Request $request)
    {
        $student = Student::where('parent_id',auth()->user()->id)->first();
        if(!is_null($student)<= 0){
        $validated = $this->validate($request,[
            'nisn'=>'required',
            'full_name'=>'required',
            'dob'=>'required',
            'gender'=>'required',
            'nationality'=>'required',
            'address'=>'required',
            'grade_id'=>'required',
            'religion'=>'required',
        ]);
        $student = new Student;
        $student->parent_id = auth()->user()->id;
        $student->parent_name = auth()->user()->name;
        $student->nisn = $request->nisn;
        $student->name = $request->full_name;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->nationality = $request->nationality;
        $student->address = $request->address;
        $student->grade_id = $request->grade_id;
        $student->religion = $request->religion;
        $student->status = 1;
        $student->save();
        Session::flash('success', 'Student  registered successfully');
        // return redirect()->route('customer.index');
        return redirect()->route('family_student_form');
    }
    Session::flash('error', 'Student  already registered');
    return redirect()->route('family_student_form');
    }
    
    public function show(Request $request){
    // Ambil data siswa berdasarkan parent_id 
    $student = Student::where('parent_id', auth()->id())->first();
    $grades = Grade::all();
    return view('familly_page.student_form', compact('student', 'grades'));
    }

    public function update(Request $request, $id){
    $student = Student::findOrFail($id);
     \Log::info('Incoming data:', $request->all());
    $student->update([
        'nisn' => $request->nisn,
        'name' => $request->full_name,
        'dob' => $request->dob,
        'gender' => $request->gender,
        'nationality' => $request->nationality,
        'address' => $request->address,
        'grade_id' => $request->grade_id,
        'religion' => $request->religion,
    ]);

    return redirect()->route('family_student_form')->with('success', 'Data siswa berhasil diupdate.');
    }
}
