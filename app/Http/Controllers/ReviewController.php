<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\Review;
use App\Models\User;
class ReviewController extends Controller
{
    public function create(){
        return view('reviews.create');
    }
}
