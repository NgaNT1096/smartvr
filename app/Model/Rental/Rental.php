<?php

namespace App\Model\Rental;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'rental_date',
        'actual_price',
        'description',
        
    ];
    public function package_theme()
    {
        return $this->belongstoMany('App\Model\Package\PackageTheme');
    }

    public function employee()
    {
        return $this->belongstoMany('App\Model\User\Employee');
    }
    public function customer()
    {
        return $this->belongstoMany('App\Model\User\Customer');
    }
    public function payment()
    {
        return $this->hasOne('App\Model\Rental\Payment');
    }
}
