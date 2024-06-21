<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'type_user',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password']=bcrypt($value);
    }

    public function scopeName ($query, $name){
        if ($name)
        return $query->where('name', 'Like', "%$name%");

    }

    public function scopeEmail ($query, $email){
        if ($email)
        return $query->where('email', 'Like', "%$email%");

    }

    public function scopeType_User ($query, $type_user){
        if ($type_user)
        return $query->where('type_user', 'Like', "%$type_user%");

    }

    public function scopeUsername ($query, $username){
        if ($username)
        return $query->where('username', 'Like', "%$username%");

    }

    public function scopeId ($query, $id){
        if ($id)
        return $query->where('id', 'Like', "%$id%");

    }



}
