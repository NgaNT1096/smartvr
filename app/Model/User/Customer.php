<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'phone_number',
        'address',
        'company'
        
    ];
    public function rental()
    {
        return $this->hasMany('App\Model\Rental\Rental');
    }
    public function user()
    {
        return $this->belongsto('App\User');
    }
}
