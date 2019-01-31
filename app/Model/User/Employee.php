<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'department'
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
