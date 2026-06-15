<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\Review;
use App\Models\User;
class AdminController extends Controller
{
    public function index(){
        $appointments=Appointment::with('user')->latest()->get();
        return view('admin.index',compact('appointments'));
    }
    public function updateStatus(Request $request,Appointment $appointment){
    $request->validate([
    'status'=>'required',
    ],[
    'status.required'=>'Укажите статус',
    ]);
    $allowed=[
        'Новая'=>['Диагностика'],
        'Диагностика'=>['В работе'],
        'В работе'=>['Готово к выдаче'],
        'Готово к выдаче'=>[],
    ];
    if(!in_array($request->status,$allowed[$appointment->status])){
        return back()->with('error','Недопустимый переход статуса');
    }
    $appointment->status=$request->status;
    $appointment->save();
    return redirect()->route('admin.index')->with('success','Статус обновлен');
    }
}
