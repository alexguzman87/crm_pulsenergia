<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $table = 'leads';
    
    protected $fillable = [
        'name',
        'fp_cycle',
        'email',
        'phone_movile',
        'country',
        'state',
        'address',
        'city',
        'postal_code',
        'notes'
    ];
    
}
