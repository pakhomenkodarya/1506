<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\Review;
use App\Models\User;
class Appointment extends Model
{
    protected $fillable = [
      'user_id',
      'category',
      'brand',
      'number',
      'problem',
      'method',
      'status',
    ];
    public function review(){
        return $this->hasOne(Review::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
