<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class UserAuthController extends Controller
{
    public function login(Request $req)
    {
        return view('userlogin');
    }

    public function register(Request $req)
    {
        $credentials= $req->validate([
            'name' => ['required'],
            'last_name' => ['required'],
            'father' => ['required'],
            'role' => ['required'],
        ]);

        $password = Str::random(8);

        $new = new User();

        $new->name = $req->name;
        $new->father = $req->father;
        $new->last_name = $req->last_name;
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
        return view('user change password');
    }

    public function HandleChangePassword(Request $req)
    {
        $credentials= $req->validate([
            'oldpass' => ['required'],
            'newpass' => ['required'],
        ]);
        
        $user = User::where('id',$req->id)->first();
        if(Hash::check($req->oldpass,$user->password))
        {
            $user->password = Hash::make($req->newpass);
            $user->save();
            return redirect()->intended('/')->with('change_success','Password Changed Successfully');
        }

        else
        {
            return back()->with('error','The Old Password Is Not Right');
        }
    }

    public function Handlelogin(Request $req)
    {
        $credentials= $req->validate([
            'name' => ['required'],
            'last_name' => ['required'],
            'father' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt(['name'=> $req->name , 'last_name'=> $req->last_name, 'father'=> $req->father, 'password'=> $req->password]))
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
}
