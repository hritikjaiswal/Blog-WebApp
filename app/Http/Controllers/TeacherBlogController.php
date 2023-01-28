<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sblog;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class TeacherBlogController extends Controller
{
    public function teacherViewEditBlog($id){
        $data = Sblog::find($id);
        $category = Category::all();
        return view('teacherEditViewBlog', ['data'=>$data, 'categories'=>$category]);
    }
    public function teacherEditBlog(Request $req){
        $req->validate([
            
            'title'=>'required',
            'data'=> 'required'
        ]);
        $page = Sblog::find($req->id);
        $page->category = $req->category;
        $page->title = $req->title;
        $page->description = $req->data;
        $page->save();
        return redirect('student_view_blog_panel');
    }
    public function teacherBlogDelete($id){
        $page = Sblog::find($id);
        $page->delete();
        return redirect('student_view_blog_panel');
    }
    public function ViewStudentBlog(){
        $data = DB::table('s_blog')
        ->join('students', 's_blog.s_loginid', '=', 'students.id')
        ->select('s_blog.*', 'students.s_name', 'students.username');
        $data= $data->get();
        return view("teacherViewStudentBlog", ['members'=>$data]);

    }
}
