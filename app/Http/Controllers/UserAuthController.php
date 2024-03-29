<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserAuthController extends Controller
{

    public function page()
    {
        return view('index/addStaff');
    }

    public function login(Request $req)
    {
        return view('userlogin');
    }

    public function register(Request $req)
    {
        $test = User::where('name',$req->name)->where('last_name',$req->last_name)->where('father',$req->father)->exists();
        if($test)
        {
            return back()->with('user_exists','This User Already Exists In The Database');
        }

        $credentials= $req->validate([
            'user_name' => ['required','alpha'],
            'user_last_name' => ['required','alpha'],
            'user_father_name' => ['required','alpha'],
            'role' => ['required'],
        ]);

        $password = Str::random(8);

        $new = new User();

        $new->name = $req->user_name;
        $new->father = $req->user_father_name;
        $new->last_name = $req->user_last_name;
        $new->password = Hash::make($password);
        if($req->role == 1)
        {
            $new->teacher = true;
        }
        else if($req->role == 2)
        {
            $new->guide = true;
        }

        $new->save();

        return back()->with('user_success','User Registered Successfully,Password is: '.$password);
    }

    public function ChangePassword(Request $req)
    {
        return view('index/change password');
    }

    public function HandleAdminChangePassword(Request $req)
    {
        $credentials= $req->validate([
            'oldpass' => ['required','current_password'],
            'newpass' => ['required'],
        ]);

        $password = $req->newpass;
        $mintest = true;
        $capitaltest = false;   //Must Have A Capital Character
        $numtest = false;   //Must Have At Least One Number
        $specialtest = false; //Must Have At Least One Special Character

        if(strlen($req->newpass) < 8)
        {
            Session::flash("mintest_error","The Password Must Be At Least 8 Characters Long!");
            $mintest = false;
        }
    
        for ($i = 0; $i < strlen($password); $i++) 
        {
            if ($password[$i] >= 'A' && $password[$i] <= 'Z') 
            {
                $capitaltest = true;
            }
            if ($password[$i] >= '0' && $password[$i] <= '9') 
            {
                $numtest = true;
            }
            if(!($password[$i] >= 'A' && $password[$i] <= 'Z') && !($password[$i] >= 'a' && $password[$i] <= 'z') && !($password[$i] >= '0' && $password[$i] <= '9'))
            {
                $specialtest = true;
            }
        }
        if(!$capitaltest)
        {
           Session::flash('capitaltest_error',"The Password Must Have At Least One Capital Character!");
        }
        if(!$numtest)
        {
            Session::flash('numtest_error',"The Password Must Contain At Least One Number!");
        }
        if(!$specialtest)
        {
            Session::flash('specialtest_error',"The Password Must Contain At Least One Special Characeter!");
        }

        if(!$specialtest || !$numtest || !$capitaltest || !$mintest)
        {
            error_log("Entered The Back Function");
            return back();
        }

        $user = User::findorfail($req->id);
        $user->password = Hash::make($req->newpass);
        $user->save();

        return redirect()->intended('/')->with('change_success','Password Changed Successfully');
    }

    public function HandleChangePassword(Request $req)
    {
        $credentials= $req->validate([
            'oldpass' => ['required','current_password'],
            'newpass' => ['required'],
        ]);

        $user = User::where('id',$req->id)->first();
        $user->password = Hash::make($req->newpass);
        $user->save();
        return redirect()->intended('/')->with('change_success','Password Changed Successfully');
    }

    public function Handlelogin(Request $req)
    {
        $credentials= $req->validate([
            'name' => ['required'],
            'last_name' => ['required'],
            'father' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt(['name'=> $req->name , 'last_name'=> $req->last_name, 'father'=> $req->father, 'password'=> $req->password],$req->remember_me))
        {
            $req->session()->regenerate();
 
            return redirect()->intended('/');
        }

        return back()->with('error','The Login Credentials Do Not Match With Our Database');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->intended('/');
    }

    public function staffinfo()
    {
        return view('index/List_of_Teachers');
    }
}
