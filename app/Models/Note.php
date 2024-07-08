<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';
    
    protected $fillable = [
        'id_contact',
        'id_oportunity',
        'notes'
    ];
    
}
