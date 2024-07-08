<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelLead extends Model
{
    use HasFactory;

    protected $table = 'level_leads';
    
    protected $fillable = [
        'name'
    ];
}
