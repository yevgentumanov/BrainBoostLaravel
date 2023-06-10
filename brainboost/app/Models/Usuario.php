<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;

class Usuario extends User implements MustVerifyEmail
{
    use HasFactory, Notifiable, MustVerifyEmailTrait;

    protected $table = 'usuarios';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre_usuario',
        'google_id',
        'password',
        'email',
        'email_verified_at'
    ];
}
