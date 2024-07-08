<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesLead extends Model
{
    use HasFactory;
    
    protected $table = 'types_leads';
    
    protected $fillable = [
        'name'
    ];
}
