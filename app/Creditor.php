<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creditor extends Model
{
    protected $fillable = [
        'firstname','middlename', 'lastname', 'property_owner','judge','amount', 'case_no', 'address'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }
}
