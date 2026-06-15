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
        'name',
        'email',
        'password',
    ];
    public function(){
        return $this->(::class),
    }
}
