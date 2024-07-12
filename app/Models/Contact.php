<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    
    protected $fillable = [
        'id_user',
        'name',
        'email',
        'second_email',
        'phone',
        'second_phone',
        'country',
        'state',
        'address',
        'city',
        'postal_code',
        'id_origins',
        'id_type',
        'id_level',
        'image',
    ];

    public function scopeName ($query, $name){
        if ($name)
        return $query->where('name', 'Like', "%$name%");

    }

    public function scopeEmail ($query, $email){
        if ($email)
        return $query->where('email', 'Like', "%$email%");

    }

    public function scopePhone ($query, $phone){
        if ($phone)
        return $query->where('phone', 'Like', "%$phone%");

    }

    public function scopeId ($query, $id){
        if ($id)
        return $query->where('id', 'Like', "%$id%");

    }

    public function scopeId_type ($query, $id_type){
        if ($id_type)
        return $query->where('id_type', 'Like', "%$id_type%");

    }

    public function scopeDate ($query, $created_at){
        if ($created_at)
        return $query->where('created_at', 'Like', "%$created_at%");

    }

    public function origin(){
        return $this->belongsTo('App\Models\Origin','id_origins','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','id_user','id');
    }

    public function type(){
        return $this->belongsTo('App\Models\TypesLead','id_type','id');
    }

    public function level(){
        return $this->belongsTo('App\Models\LevelLead','id_level','id');
    }



}
