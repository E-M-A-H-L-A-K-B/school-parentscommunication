<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Student extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table='students';

    protected $fillable = ['name', 'last_name', 'father',  'password'];

    protected $hidden = ['password',  'remember_token'];
}
