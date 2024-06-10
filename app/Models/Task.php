<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $table = 'tasks';
    
    protected $fillable = [
        'task',
        'id_user',
        'priority',
        'status',
        'assigned_date',
        'done_date'
    ];

    public function user(){
        return $this->belongsTo('App\Models\Contact','id_user','id');
    }
    
}
