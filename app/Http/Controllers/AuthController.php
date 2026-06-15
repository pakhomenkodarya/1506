<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\Review;
use App\Models\User;
class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }
     public function register(Request $request){
        $request->validate([
         'login'=>'required|unique:users',
       'password'=>'required|min:8|regex:/^[a-zA-Z]+$/',
       'name'=>'required|',
       'addres'=>'required|',
       'tel'=>'required|regex:/^\+7\(\d{3}\)\d{3}-\d{2}-\d{2}$/',
       'email'=>'required|',
        ],
        [
         'login.required'=>'Введите логин',
         'login.unique'=>'Логин не уникален',
       'password.required'=>'Введите пароль',
        'password.min'=>'Пароль минимум 8 символов',
         'password.regex'=>'Используйте латинские цифры',
       'name.required'=>'Введите ФИО',
       'addres.required'=>'Введите адресс',
       'tel.required'=>'Введите телефон',
       'tel.regex'=>'Телефон в формате:+7(XXX)XXX-XX-XX',
       'email.required'=>'Введите email',
        ]);
        $user=User::create([
        'login'=>$request->login,
       'password'=>Hash::make($request->password),
       'name'=>$request->name,
       'addres'=>$request->addres,
       'tel'=>$request->tel,
       'email'=>$request->email,
       'role'=>'user',
        ]);
        Auth::login($user);
        return redirect()->route('appointments.index')->with('success','Вы зарегистрированы');
    }
     public function showLogin(){
        return view('auth.login');
    }
    public function login(Request $request){
        $data=$request->validate([
         'login'=>'required',
       'password'=>'required',
        ],
        [
'login.required'=>'Введите логин',
       'password.required'=>'Введите пароль',
        ]);
        if(Auth::attempt([
         'login'=>$data['login'],
       'password'=>$data['password'],
        ])){
            $request->session()->regenerate();
            if(Auth::user()->role==='admin'){return redirect()->route('admin.index')->with('success','Вы вошли в админ панель');
            }
                else{ return redirect()->route('appointments.index')->with('success','Вы вошли в аккаунт');
            }
           
        }
        return back()->withErrors(['login'=>'Неверный логин или пароль']);
    }
    public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
     return redirect()->route('welcome')->with('success','Вы вышли из аккаунта');

    }
}
