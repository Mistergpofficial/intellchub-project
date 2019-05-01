<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['full_name', 'start_time', 'end_time', 'message', 'department', 'user_id'];
}
