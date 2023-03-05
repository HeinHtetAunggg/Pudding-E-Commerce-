<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view ('auth.register');
    }

    public function store()
    {
        $formData=request()->validate([
            'name'=>['required','min:3'],
            'username'=>['required','min:3',Rule::unique('users','username')],
            'avatar'=>['image'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:8'],
        ]);
        if(request()->hasFile('image')){
            $formData['avatar']=request()->file('image')->store('thumbnails');
        }else{
            $formData['avatar']='thumbnails/default.jpg';
        }
        $user=User::create($formData);
        auth()->login($user);
        return redirect('/')->with('success', 'Welcome Dear '.$user->name);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function post_login()
    {
        $formData=request()->validate([
            'email'=>['required','email',Rule::exists('users','email')],
            'password'=>['required','min:8','max:255'],
        ],[
            'email'=>'Email Does Not Exist',
            'password'=>'The password length must be 8 characters',
        ]);
        if(auth()->attempt($formData))
        {
            return redirect('/')->with('success','Welcome Back');
        }else{
            return redirect()->back()->withErrors([
             'email'=>'User Credentials Wrong'
            ]);
        }

    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success','Good Bye');
    }
}
