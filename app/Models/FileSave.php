<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileSave extends Model
{
    use HasFactory;

    protected $table = 'file_saves';
    
    protected $fillable = [
        'id_contact',
        'fileName',
        'file',
    ];

}
