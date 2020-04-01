<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentList extends Model
{
    protected $table = 'student_lists';
    protected $fillable = [
        'nis','id_student','id_event'
    ];

    public function student(){
        return $this->belongsTo('App\Student','id_student');
    }

    public function event(){
        return $this->belongsTo('App\Event','id_event');
    }

}
