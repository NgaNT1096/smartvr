<?php

namespace App\Model\Package;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type_data',
        'link',
        'price'
        
    ];
    public function Theme_Contents(){
        return $this->belongsToMany('App\Model\Package\ThemeContent');
    }
}
