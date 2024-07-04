<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oportunity extends Model
{
    use HasFactory;

    protected $table = 'oportunities';
    
    protected $fillable = [
        'id_user',
        'title',
        'contact_name',
        'organization',
        'email',
        'phone',
        'country',
        'state',
        'address',
        'city',
        'postal_code',
        'status',
        'type',
        'budget',
        'currency',
        'probability',
        'description'
    ];
}



