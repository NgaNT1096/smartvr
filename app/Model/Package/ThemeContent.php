<?php

namespace App\Model\Package;

use Illuminate\Database\Eloquent\Model;

class ThemeContent extends Model
{
    protected $fillable = [
        'num_content',
        'name',
        'description'
        
    ];
    public function contents()
    {
        return $this->hasMany('App\Model\Package\Content');
    }
    public function themes()
    {
        return $this->hasMany('App\Model\Package\Theme');
    }
}
