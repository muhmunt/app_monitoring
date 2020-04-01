<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $table = 'rayons';

    protected $fillable = [
        'rayon'
    ];
    
    public function student(){
        return $this->hasMany('App\Student');
    }
}
