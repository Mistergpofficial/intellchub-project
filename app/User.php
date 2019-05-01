<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'username', 'email', 'password', 'password_confirmation', 'mobile', 'role_id'
    ];


    public function userDepartments()
    {
        return $this->hasOne(\App\Models\UserDepartment::class, 'user_id', 'id');
    }

    public function userAppointments()
    {
        return $this->hasMany(\App\Models\UserAppointment::class, 'user_id', 'id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
