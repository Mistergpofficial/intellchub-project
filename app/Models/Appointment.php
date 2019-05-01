<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['appointment_id', 'patient_name', 'department', 'doctor', 'date', 'time', 'patient_email', 'patient_mobile', 'message', 'user_id'];

    public function user(){
        return $this->belongsTo('App\Users');
    }

}
