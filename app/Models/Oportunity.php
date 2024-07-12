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
        'id_origins',
        'id_type',
        'id_level',
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
        'probability',
        'description',
        'id_contact'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','id_user','id');
    }

    public function origin(){
        return $this->belongsTo('App\Models\Origin','id_origins','id');
    }

    public function type(){
        return $this->belongsTo('App\Models\TypesLead','id_type','id');
    }

    public function level(){
        return $this->belongsTo('App\Models\LevelLead','id_level','id');
    }

    public function contact(){
        return $this->belongsTo('App\Models\Contact','id_contact','id');
    }


}



