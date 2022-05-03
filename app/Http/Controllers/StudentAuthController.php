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
            'oldpass' => ['required','current_password'],
            'newpass' => ['required'],
        ]);

        $user = Student::where('id',$req->id)->first();
        $user->password = Hash::make($req->newpass);
        $user->save();
        return redirect()->intended('/')->with('change_success','Password Changed Successfully');
    }

    public function register(Request $req)
    {
        $credentials= $req->validate([
            'name' => ['required'],
            'last_name' => ['required'],
            'father' => ['required'],
        ]);

        $password = Str::random(8);

        $new = new Student();

        $new->name = $req->name;
        $new->father = $req->father;
        $new->last_name = $req->last_name;
        $new->password = Hash::make($password);

        $new->save();

        return back()->with('student_success','Student Registered Successfully,Password is: '.$password);
    }

    public function Handlelogin(Request $req)
    {
        $credentials= $req->validate([
            'name' => ['required'],
            'last_name' => ['required'],
            'father' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::guard('student')->attempt(['name'=> $req->name , 'last_name'=> $req->last_name, 'father'=> $req->father, 'password'=> $req->password]))
        {
            $req->session()->regenerate();
 
            return redirect()->intended('/');
        }

        return back();
    }

    public function logout()
    {
        Auth::guard('student')->logout();

        return redirect()->intended('/');
    }
}
