<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordpressForm extends Model
{
    use HasFactory;

    protected $connection = 'test';

    protected $table = '6myowA_wpforms_entries';

}
