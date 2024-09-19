<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class SubAdmin extends Authenticatable
{
use HasFactory, HasApiTokens;

protected $fillable = [
'name', 'email', 'location', 'password', 'permissions',
];

protected $hidden = [
'password', 'remember_token',
];
}
