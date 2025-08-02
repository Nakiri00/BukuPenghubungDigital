<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentsCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = StudentsComment::all();
        return view('counciler_page.contact_student_index')
        ->with('students', $students);

    }


    public function create(Request $request)
{
    $teacher = auth()->user()->teacher;

    // Jika user bukan guru
    if (!$teacher) {
        return redirect()->back()->withErrors('Akun ini belum terdaftar sebagai guru.');
    }

    $kelasList = collect();

    if ($teacher->teacher_type === 'wali_kelas') {
        $kelasList = collect([$teacher->grade]);
    } else {
        $kelasList = $teacher->grades;
    }

    $selectedKelasId = $request->get('kelas_id');
    $students = collect();

    if ($selectedKelasId) {
        $students = Student::where('grade_id', $selectedKelasId)->get();
    }

    return view('teacher_page/student_comment_form', compact(
        'kelasList', 'selectedKelasId', 'students'
    ));
}




 public function store(Request $request)
{
    $request->validate([
        'studnet_id' => 'required|exists:students,id',
        'body' => 'required|string',
    ]);

    StudentsComment::create([
        'student_id' => $request->studnet_id,
        'comment' => $request->body,
        'user_id' => auth()->id(), // ganti teacher_id jadi user_id
    ]);

    return redirect()->route('students_comment.create')
                     ->with('success', 'Komentar berhasil ditambahkan');
}




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentsComment  $studentsComment
     * @return \Illuminate\Http\Response
     */
    public function show(StudentsComment $studentsComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentsComment  $studentsComment
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentsComment $studentsComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentsComment  $studentsComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentsComment $studentsComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentsComment  $studentsComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentsComment $studentsComment)
    {
        //
    }
}
