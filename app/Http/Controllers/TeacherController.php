<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Grade;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil semua guru dengan relasi user, grade (wali kelas), dan grades (guru mapel)
        $teachers = Teacher::with(['user', 'grade', 'grades'])->get();

        return view('users.teachers_data', compact('teachers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all(); // ambil semua kelas
        return view('users.teacher_form', compact('grades'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip'          => 'required|string|max:18|unique:teachers,nip',
            'name'         => 'required|string|max:50',
            'teacher_type' => 'required|in:wali_kelas,mapel',
            'dob'          => 'required|date',
            'gender'       => 'required|in:Laki-Laki,Perempuan',
            'subject'      => 'nullable|string|max:50',
            'address'      => 'required|string|max:255',
            'phone'        => 'required|string|max:15',
            'grade_id'     => 'nullable|required_if:teacher_type,wali_kelas|exists:grades,id',
            'mapel_grades' => 'nullable|array',
            'mapel_grades.*' => 'exists:grades,id'
        ]);

        if ($validated['teacher_type'] === 'wali_kelas') {
            $validated['subject'] = 'Mengajar semua pelajaran umum';
        }

        $user = User::create([
            'name'        => $validated['name'],
            'email'       => strtolower(str_replace(' ', '', $validated['nip'])) . '@sekolah.com',
            'password'    => bcrypt('password123'),
            'user_type_id'=> 2,
        ]);

        $teacher = new Teacher($validated);
        $teacher->user_id = $user->id;
        $teacher->save();

        // Simpan pivot untuk guru mapel
        if ($validated['teacher_type'] === 'mapel' && isset($validated['mapel_grades'])) {
            $teacher->grades()->sync($validated['mapel_grades']);
        }

        Session::flash('success', 'Guru berhasil ditambahkan.');
        return redirect()->route('teacher.index');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'nip'          => 'required|string|max:18|unique:teachers,nip,' . $teacher->id,
            'name'         => 'required|string|max:50',
            'teacher_type' => 'required|in:wali_kelas,mapel',
            'dob'          => 'required|date',
            'gender'       => 'required|in:Laki-Laki,Perempuan',
            'subject'      => 'nullable|string|max:50',
            'address'      => 'required|string|max:255',
            'phone'        => 'required|string|max:15',
            'grade_id'     => 'nullable|required_if:teacher_type,wali_kelas|exists:grades,id'
        ]);

        if ($validated['teacher_type'] === 'wali_kelas') {
            $validated['subject'] = 'Mengajar semua pelajaran umum';
        }

        $teacher->update($validated);

        if ($teacher->user) {
            $teacher->user->update(['name' => $validated['name']]);
        }

        Session::flash('success', 'Guru berhasil diupdate.');
        return redirect()->route('teacher.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
