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
        return view('appointments.index');
    }
}
