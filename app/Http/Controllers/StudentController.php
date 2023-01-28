<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sblog;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Password;

class StudentController extends Controller
{
    public function addStudentData(){
        return view("addStudent");
    }

    public function addData(Request $req){
        $page = new Student();
        $req->validate([
            'name'=>'required',
            'username'=> ['required','regex: /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix' ,'unique:students,username'],
            'password'=> ['required',
                        'min:8'],
            'datePicker'=>'required',
            'address'=>'required',
            'imageUpload' => 'required|mimes:jpeg,png,jpg|max:5000'        
        ]);
        // ['required | regex: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g | unique:students,username' ]
        $page->s_name= $req->name;
        $page->dob = $req->datePicker;
        $page->department = $req->department;
        $page->address = $req->address;
        $page->username = $req->username;
        $page->password = Hash::make($req->password);

        //images upload
        $imageName = time().'.'.$req->imageUpload->extension(); 
        $req->imageUpload->move(public_path('images'), $imageName);
        $page->image_path = $imageName;
        $page->save();
        return redirect('studentpanel');
    }
    
    public function viewStudentData($id){
        $data = Student::where('id',$id)->get();
        return view('viewStudentDetail',['members'=>$data]);
    }

    public function deleteStudentData($id){
        $page = Student::find($id);
        $page->delete();
        return redirect('/studentpanel');
    }

    //Edit for student panel 
    public function editStudentPanel(Request $req){
        $req->validate([
            'name'=>'required',
            'username'=> ['required','regex: /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix' ,'unique:students,username, '.$req->id.',id'],
            'imageUpload' => 'mimes:jpeg,png,jpg|max:2000' ,  
            // 'password'=>
        ]);
        $page = Student::find($req->id);
        $page->s_name = $req->name;
        $page->username = $req->username;
        $page->department = $req->department;
        $page->address = $req->address;
       
        if($req->confpassword==''){
        $nullPass = $page->password;
        $page->password = $nullPass;
    
        }else{
            $confirmpassword = Hash::check($req->confpassword, $page->password);
            if($confirmpassword == true){
                $page->password = Hash::make($req->password);
                $page->save();
                }else{
                    return back()->with('fail', 'Incorrect password');
                }
        }
          // upload image
        if (!$req->has('imageUpload')) {
            $nullImage= $page->image_path;
            $page->image_path = $nullImage;
            $page->save();
            return redirect('studentpanel');
        }

        $imageName = time().'.'.$req->imageUpload->extension(); 
        $req->imageUpload->move(public_path('images'), $imageName);
        $page->image_path = $imageName;
        $page->save();
        return redirect('studentpanel');
    }
    public function resetPasswordView(Request $req){
        return view("resetPassword");
        
    }
    
    //show data for update
    public function showEditStudent($id){
        $data = Student::find($id);
        return view('studentPanelEdit', ['data'=>$data]);
    }

    public function showStudent(){
        $data = Student::paginate(2);
        return view('studentPanel',['members'=>$data]);
    }

//////////////////////////////// Teacher sides ////////////////////////////////////////

    public  function createStudentBlog(){
        $category = Category::all();
        return view('createBlogStudent', ['categories'=>$category]);

    }

    public function createBlog(Request $req){
        $req->validate([
            'title'=>'required',
            'data'=> 'required'
        ]);
        $page = new Sblog();
        $page->category = $req->category;
        $page->title = $req->title;
        $page->description = $req->data;
        $page->s_loginid = session('LoggedStudent');
        $page2 = Category::select('id')->where('cate_name', '=', $req->category)->get('id');
        foreach($page2 as $p){
            $page->category_id = $p['id'];
        }
        $page->save();
        return redirect('studentblog');
    }

    public function viewStudentBlog($id){
        $data = Sblog::where('id',$id)->get();
        return view('viewStudentBlog',['members'=>$data]); 
    }

    public function delete($id){
        $page = Sblog::find($id);
        $page->delete();
        return redirect('studentblog');
    }

    public function edit(Request $req){
        $req->validate([
            'title'=>'required',
            'data'=> 'required'
        ]);
        $page = Sblog::find($req->id);
        $page->title = $req->title;
        $page->description = $req->data;
        $page->category =$req->category;
        $page->save();
        return redirect('studentblog');
    }

    public function index(){
        $data = Sblog::join('students', 's_blog.s_loginid', '=', 'students.id')
        ->where('s_loginid',"=", session('LoggedStudent'))
        ->select('s_blog.*', 'students.s_name', 'students.username')->paginate(2);
        $distinct= DB::table('students')->distinct()->get();
        return view('studentblog',['members'=>$data, 'distinct'=>$distinct]);
    }

    public function showData($id){
        $data = Sblog::find($id);
        $category = Category::all();
        return view('updateStudent', ['data'=>$data, 'categories'=>$category]);
    }
    /////////////////////////////////////////Home card////////////////////
    public function homeBlogCard(){
        $data = Sblog::all();
        return view("welcome", ['members'=>$data]);
    }

    public function viewStudentHomeBlog($id){
        $data = DB::table('s_blog')
        ->join('students', 's_blog.s_loginid', '=', 'students.id')
        ->select('s_blog.*', 'students.s_name', 'students.username')
        ->where('s_blog.id',"=","$id");
        $data= $data->get();
        return view('viewHomeBlog', ['data'=>$data]);
    }
}
