<?php

use App\Http\Controllers\ConcilerDashbordController;
use App\Http\Controllers\FamillyDashbordController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentResultController;
use App\Http\Controllers\StudentsCommentController;
use App\Http\Controllers\StudetDashbordController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::resource('student', StudentController::class);
    Route::get('student_dashboard', [StudetDashbordController::class,'index'])->name('student_dashboard');
    Route::get('student_contact_counciler', [StudentController::class,'student_contact_counciler'])->name('student_contact_counciler');
    Route::get('view_student_result', [StudentController::class,'view_student_result'])->name('view_student_result');
    Route::get('teacher_contact_counciler', [TeacherDashboardController::class,'teacher_contact_counciler'])->name('teacher_contact_counciler');
    Route::get('teacher_dashboard', [TeacherDashboardController::class,'index'])->name('teacher_dashboard');
    Route::get('conciliar_dashboard.comments', [ConcilerDashbordController::class,'comments'])->name('conciliar_dashboard.comments');
    Route::resource('conciliar_dashboard', ConcilerDashbordController::class);
    Route::resource('students_comment', StudentsCommentController::class);
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('family_dashboard', [FamillyDashbordController::class,'index'])->name('family_dashboard');
    // Route::post('family_student_form', [FamillyDashbordController::class,'storeStudent'])->name('family_student_form');
    Route::get('family_view_student_result', [FamillyDashbordController::class,'viewStudentResults'])->name('family_view_student_result');
    Route::post('family_store_student', [FamillyDashbordController::class,'storeStudent'])->name('family_store_student');
    Route::get('family_student_form', [FamillyDashbordController::class,'show'])->name('family_student_form');
    Route::put('family_student_update/{id}', [FamillyDashbordController::class,'update'])->name('family_student_update');
    Route::get('teacher_form', [TeacherController::class,'create'])->name('users.teacher_form');
    Route::post('teacher_store', [TeacherController::class,'store'])->name('user.teacher_store');
    Route::get('teachers_data', [TeacherController::class,'index'])->name('users.teachers_data');
    Route::get('teacher_edit/{id}', [TeacherController::class,'edit'])->name('user.teacher_edit');
    Route::put('teacher_update/{id}', [TeacherController::class,'update'])->name('user.teacher_update');
    Route::delete('teacher_destroy/{id}', [TeacherController::class,'destroy'])->name('user.teacher_destroy');
    Route::get('teacher_show/{id}', [TeacherController::class,'show'])->name('user.teacher_show');
    Route::resource('teacher', TeacherController::class);
    Route::get('/teacher_page/students_comment_form', [StudentsCommentController::class, 'create'])->name('students_comment.create');
    Route::post('/teacher_page/students_comment_form', [StudentsCommentController::class, 'store'])->name('students_comment.store');



    Route::resource('student_result', StudentResultController::class);

    Route::resource('user', UserController::class);

});

// Matikan register bawaan Laravel
Auth::routes(['register' => false]);

// Custom Register
Route::get('/register', function () {
    return view('auth.register'); // form register
})->name('register');

Route::post('/register', [UserController::class, 'register'])->name('register.submit');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
