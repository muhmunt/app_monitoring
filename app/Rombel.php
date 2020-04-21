<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $table = 'rombels';

    protected $fillable = [
        'rombel'
    ];

    public function student(){
        return $this->hasMany('App\Siswa');
    }
}
