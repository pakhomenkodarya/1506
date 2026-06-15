<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\Review;
use App\Models\User;
class AppointmentController extends Controller
{
    public function index(){
        $appointments=Appointment::where('user_id',Auth::id())->latest()->get();
        return view('appointments.index',compact('appointments'));
    }
    public function create(){
    return view('appointments.create');
    }
    public function store(Request $request){
    $data=$request->validate([
      'category'=>'required',
      'brand'=>'required',
      'number'=>'required',
      'problem'=>'required',
      'method'=>'required',
    ],
    [
    'category.required'=>'Выберите категорию техники',
      'brand.required'=>'Укажите бренд',
      'number.required'=>'Введите серийный номер устройства',
      'problem.required'=>'Опишите поломку',
      'method.required'=>'Выберите способ получения',
    ]);
    $appointment=Appointment::create([
     'user_id'=>Auth::id(),
      'category'=>$data['category'],
      'brand'=>$data['brand'],
      'number'=>$data['number'],
      'problem'=>$data['problem'],
      'method'=>$data['method'],
      'status'=>'Новая',
    ]);
     return redirect()->route('appointments.index')->with('success','Заявка создана');
    }
}
