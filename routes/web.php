<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherBlogController;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['revalidate']],function(){
    
    Route::get('logout', function () {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser', null);
            
            return redirect('teacherlogin');
        }
        
    });
    Route::get('logout_student', function () {
        if(session()->has('LoggedStudent')){
            session()->pull('LoggedStudent', null);
            return redirect('studentlogin');
        }
    });

    Route::get('teacherlogin', function () {
        if(session()->has('LoggedUser')){
            return redirect('studentpanel');
        }else{
            if(session()->has('LoggedStudent')){
                return (new StudentController)->index();
            }
        }
        return view('teacherLogin');
    });
    
    Route::get('studentpanel', function () {
        if(session()->has('LoggedUser')){
            return (new StudentController)->showStudent();
        }
        return redirect('teacherlogin');
    });

    Route::get('studentlogin', function () {
        if(session()->has('LoggedStudent')){
            return redirect('studentblog');
        }else{
            if(session()->has('LoggedUser')){
                return (new StudentController)->showStudent();
            }
        }
        return view('studentLogin');
    });
    
    Route::get('studentblog', function () {
        if(session()->has('LoggedStudent')){
            return (new StudentController)->index();
        }
        return redirect('studentlogin');
    });

    Route::post('addData', [StudentController::class, 'addData']);
    Route::post('auth', [LoginController::class, 'loginTeacher']);
    Route::post('updateStu', [StudentController::class, 'editStudentPanel']);
    
    //middleware for teacher authentication
    Route::group(['middleware'=>['AuthCheck']],function(){
        Route::get('addstudent', [StudentController::class, 'addStudentData']);
        Route::get('student_view_blog_panel', [TeacherBlogController::class, 'ViewStudentBlog']);
        Route::get('delete_teacher_blog/{id}', [TeacherBlogController::class, 'teacherBlogDelete']);
        Route::get("update_teacher_blog/{id}", [TeacherBlogController::class, 'teacherViewEditBlog']);
        Route::get('view_studentdata/{id}', [StudentController::class, 'viewStudentData']);
        Route::get("updateStudent/{id}", [StudentController::class, 'showEditStudent']);
        // Route::get('updateStudent/{id}/resetPassword', [StudentController::class, 'resetPasswordView']);
});
Route::post('addstudent', [StudentController::class, 'addData']);
Route::post('student_view_blog_panel', [TeacherBlogController::class, 'teacherViewStudentBlog']);
Route::post("update_teacher_blog/{id}", [TeacherBlogController::class, 'teacherEditBlog']);
// Route::post('updateStudent/{id}/resetPassword', [StudentController::class, 'resetPassword']);

//middleware for Student authentication
    Route::group(['middleware'=>['CheckLogged']],function(){
        Route::get('view_studentblog/{id}', [StudentController::class, 'viewStudentBlog']);
        Route::get('createblog', [StudentController::class, 'createStudentBlog']);
        Route::get("update/{id}", [StudentController::class, 'showData']);
        Route::get('view_studentblog/{id}', [StudentController::class, 'viewStudentBlog']);
});
Route::post('createblog', [StudentController::class, 'createBlog']);
// Route::get("update/{id}", [StudentController::class, 'showData']);
    

    Route::get('view_student_home_blog/{id}', [StudentController::class, 'viewStudentHomeBlog']);
   
    Route::post('edit', [StudentController::class, 'edit']);

    Route::post('blogpage', [LoginController::class, 'studentAuth']);

    Route::get('/', [StudentController::class, 'homeBlogCard'] );

    Route::get('deleteblog/{id}', [StudentController::class, 'delete']);

    Route::get('delete/{id}', [StudentController::class, 'deleteStudentData']);
        
});
