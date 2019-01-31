<?php

namespace App\Model\Rental;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'pay_date',
        'note',
        'money_amount'
        
    ];
    public function payment()
    {
        return $this->belongsTo('App\Model\Rental\Payment');
    }
}
