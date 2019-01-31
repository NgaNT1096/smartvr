<?php

namespace App\Model\Rental;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'status',
        'method',
        'rented_date',
        'note'
        
    ];

}
