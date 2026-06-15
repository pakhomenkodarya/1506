<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\Review;
use App\Models\User;
class Review extends Model
{
    protected $fillable = [
      'user_id',
      'appointment_id',
      'raiting'
    ];
    public function appointment(){
        return $this->belongsTo(Appointment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
