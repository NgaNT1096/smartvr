<?php

namespace App\Model\Package;

use Illuminate\Database\Eloquent\Model;

class Oculus extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status'
        
    ];
    public function theme_content()
    {
        return $this->belongsToMany('App\Model\Package\ThemeContent');
    }
}
