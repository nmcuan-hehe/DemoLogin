<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    public function toRegister()
    {
        return view('auth.register');
    }
    public function toLogin()
    {
        return view('auth.login');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif', // Kiểm tra file hình ảnh
        ]);

        $data = $request->all();

        $check = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'image' => file_get_contents($request->file('image')->path()), // Lưu dữ liệu hình ảnh dưới dạng binary
        ]);

        return redirect("login");
    }
    public function checkUser(Request $request)
    {      
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function listUser()
    {
        if(Auth::check()){
            $users = User::all();
            return view('auth.home', ['users' => $users]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

}
