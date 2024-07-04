<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordpressForm extends Model
{
    use HasFactory;

    protected $connection = 'wp_form_entries';

    protected $table = '6jmdda9o9_fluentform_entry_details';

}
