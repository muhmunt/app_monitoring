<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'name','keterangan','slug'
    ];

    public function list(){
        return $this->hasMany('App\StudentList','id_event');
    }
}
