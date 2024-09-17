<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginRegister extends Model
{
    use HasFactory;

    protected $table = 'login_registers';
    
    protected $fillable = [
        'id_user'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','id_user','id');
    }

}
