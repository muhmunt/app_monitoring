<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'nis','nama','jk','id_rombel','id_rayon'
    ];

    public function student_list(){
        return $this->hasMany('App\StudentList');
    }
    
    public function rombel(){        
        return $this->belongsTo('App\Rombel','id_rombel');
    }

    public function rayon(){
        return $this->belongsTo('App\Rayon','id_rayon');
    }
}
