<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postsales extends Model
{
    use HasFactory;

    protected $table = 'postsales';
    
    protected $fillable = [
        'id_contact',
        'id_oportunity',
        'notes'
    ];

    public function contact(){
        return $this->belongsTo('App\Models\Contact','id_contact','id');
    }

    public function oportunity(){
        return $this->belongsTo('App\Models\Oportunity','id_oportunity','id');
    }
}
