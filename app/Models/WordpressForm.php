<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordpressForm extends Model
{
    use HasFactory;

    protected $connection = 'wp_form_entries';

    /***ESTA ES LA TABLA DE FLUENT FORM***/
    //protected $table = '6jmdda9o9_fluentform_entry_details';

    /***ESTA ES LA TABLA DE WP FORM***/
    protected $table = '6jmdda9o9_wpforms_entries';

}
