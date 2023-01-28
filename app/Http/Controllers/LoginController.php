<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected function loginTeacher(Request $req){
        $req->validate([
            'username'=>'required',
            'password'=> 'required'
        ]);
        $userInfo = Teacher::where('username',"=", $req->username)->first();
        if(!$userInfo){
            return back()->with('fail','Incorrect username');
        }else{
            if($req->password == $userInfo->password){
                $req->session()->put('LoggedUser', $userInfo->id);
                return redirect('studentpanel');
            }else{
                return back()->with('fail', 'Incorrect password');
            }
        }
    }
    
    protected function studentAuth(Request $req){
        $req->validate([
            'username'=>'required',
            'password'=> 'required | min:8'
        ]);
        $studentInfo = Student::where('username',"=", $req->username)->first();
       
        if(!$studentInfo){
            return back()->with('fail','Incorrect username');
        }else{
            $hashpassword = Hash::check($req->password, $studentInfo->password);
            if($hashpassword == true){
                $req->session()->put('LoggedStudent', $studentInfo->id);
                return redirect('studentblog');
            }else{
                return back()->with('fail', 'Incorrect password');
            }
        }
    }
}
