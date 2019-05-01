<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAppointment extends Model
{
    protected $table = 'user_appointments';
    protected $fillable = ['id', 'user_id', 'appointment_id'];


    public function appointment()
    {
        return $this->belongsTo(\App\Models\Appointment::class, 'appointment_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
