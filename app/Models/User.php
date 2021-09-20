<?php

namespace App\Models;

use App\Http\Controllers\roleConstant;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'address', 'role',];

    public function isAdmin() {
        return $this->role == roleConstant::ADMIN;
    }

    public function isUser()
    {
        return $this->role == roleConstant::USER;
    }

}
