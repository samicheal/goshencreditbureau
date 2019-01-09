<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    protected $fillable = [
        'company_name', 'property_owner','judge','amount', 'case_no', 'address'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }
}
