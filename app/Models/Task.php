<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'tasks';
    
    protected $fillable = [
        'task',
        'coordinate',
        'id_user',
        'id_oportunity',
        'id_contact',
        'priority',
        'status',
        'assigned_date',
        'assigned_time',
        'done_date',
        'done_time'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','id_user','id');
    }
    
    public function contact(){
        return $this->belongsTo('App\Models\Contact','id_contact','id');
    }

    public function oportunity(){
        return $this->belongsTo('App\Models\Oportunity','id_oportunity','id');
    }
}
