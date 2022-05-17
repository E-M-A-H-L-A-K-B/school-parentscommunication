<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Str;
class StudentAuthController extends Controller
{
    public function login(Request $req)
    {
        return view('studentlogin');
    }

    public function ChangePassword(Request $req)
    {
        return view('student change password');
    }

    public function HandleChangePassword(Request $req)
    {
        $credentials= $req->validate([
            'oldpass' => ['required','current_password:student'],
            'newpass' => ['required'],
        ]);

        $user = Student::where('id',$req->id)->first();
        $user->password = Hash::make($req->newpass);
        $user->save();
        return redirect()->intended('/')->with('change_success','Password Changed Successfully');
    }

    public function register(Request $req)
    {
        $test = Student::where('name',$req->name)->where('last_name',$req->last_name)->where('father',$req->father)->exists();
        if($test)
        {
            return back()->with('student_exists','This Student Already Exists In The Database');
        }

        /*$credentials= $req->validate([
            'name' => ['required'],
            'last_name' => ['required'],
            'father' => ['required'],
            'mother_name'=>['required'],
            'national_number'=>['required'],
            'class_number'=>['required','between:1,12'],
            'date_of_birth'=>['required','date'],
            'place_of_birth'=>['required'],
        ]);*/

        if(Student::where('national_number',$req->national_number)->exists())
        {
            return back()->with('national_number_exist','This National Number Already Exists');
        }

        $new = new Student();

        $new->last_name = $req->last_name;
        $new->name = $req->name;
        $new->father = $req->father;
        $new->mother_name = $req->mother_name;
        $new->national_number = $req->national_number;
        $new->class_num = $req->class_number;
        $new->section_id = 0;
        $new->date_of_birth = $req->date_of_birth;
        $new->place_of_birth = $req->place_of_birth;

        $save_password = Str::random(8);
        $new->password = Hash::make($save_password);

        $new->save();

        return back()->with('student_success','Student Registered Successfully,Password is: '.$save_password);
    }

    public function Handlelogin(Request $req)
    {
        $credentials= $req->validate([
            'name' => ['required'],
            'last_name' => ['required'],
            'father' => ['required'],
            'password' => ['required'],
        ]);

        //if statement
        if(Auth::guard('student')->attempt(['name'=> $req->name , 'last_name'=> $req->last_name, 'father'=> $req->father, 'password'=> $req->password]))
        {
            $req->session()->regenerate();
 
            return redirect()->intended('/');
        }

        return back()->with('error','The Login Credentials Do Not Match With Our Database');
    }

    public function logout()
    {
        Auth::guard('student')->logout();

        return redirect()->intended('/');
    }
}
