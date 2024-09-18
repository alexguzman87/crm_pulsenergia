<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileSave extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'file_saves';
    
    protected $fillable = [
        'id_contact',
        'id_oportunity',
        'fileName',
        'file',
    ];

}
