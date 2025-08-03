<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;


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
    public function edit()
    {
        $user = Auth::user();
        $teacher = Teacher::where('user_id', $user->id)->first();

        return view('teacher_page.edit_profile', compact('user', 'teacher'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user()->load('teacher'); 
        $teacher = Teacher::where('user_id', $user->id)->first();

        $request->validate([
            'nip' => 'required|string|max:50|unique:teachers,nip,' . $teacher->id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'required|string|max:255',
            'password' => 'nullable|string|confirmed|min:8',
        ]);

        // Update data di tabel users
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        // Update data di tabel teachers
        $teacher->nip = $request->nip;
        $teacher->name = $request->name; // Sync name dengan user name
        $teacher->address = $request->address;
        $teacher->save();

        return redirect()->route('teacher.profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }

    public function editProfile($id)
    {
        $teacher = Teacher::findOrFail($id);
        $grades = Grade::all(); // Untuk dropdown kelas (grade)
        return view('users.edit_teachers', compact('teacher', 'grades'));
    }

    public function update(Request $request, $id)
    {
       $teacher = Teacher::findOrFail($id);

    // Validasi umum
    $rules = [
        'nip' => 'required|string|max:50|unique:teachers,nip,' . $teacher->id,
        'name' => 'required|string|max:255',
        'teacher_type' => 'required|in:wali_kelas,mapel',
    ];

    if ($request->teacher_type == 'wali_kelas') {
        $rules['grade_id'] = 'required|exists:grades,id';
    } else {
        $rules['mapel_grades'] = 'required|array|min:1';
        $rules['mapel_grades.*'] = 'exists:grades,id';
        $rules['subject'] = 'required|string|max:255';
    }

    $validated = $request->validate($rules);

    // Update Teacher Data
    $teacher->nip = $validated['nip'];
    $teacher->name = $validated['name'];
    $teacher->teacher_type = $validated['teacher_type'];

    if ($validated['teacher_type'] == 'wali_kelas') {
        $teacher->grade_id = $validated['grade_id'];
        $teacher->subject = 'Mengajar semua pelajaran umum';
        $teacher->grades()->detach();
    } else {
        $teacher->grade_id = null;
        $teacher->subject = $validated['subject'];
        $teacher->grades()->sync($validated['mapel_grades']);
    }

    $teacher->save();

    // Update User Name (users table)
    if ($teacher->user_id) {
        $user = $teacher->user;
        $user->name = $validated['name'];
        $user->save();
    }

    return redirect()->route('users.teachers_data')->with('success', 'Data guru berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);

        // Hapus relasi kelas mapel jika ada (pivot table)
        if ($teacher->teacher_type === 'mapel') {
            $teacher->grades()->detach();
        }

        // Hapus data user terkait
        if ($teacher->user_id) {
            $user = User::find($teacher->user_id);
            if ($user) {
                $user->delete();
            }
        }

        // Hapus data guru
        $teacher->delete();

        return redirect()->route('users.teachers_data')->with('success', 'Data guru & user berhasil dihapus.');
    }
}
