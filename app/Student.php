<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table='students';

    protected $fillable=['student_name','student_sex','student_age','student_dept'];

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class,'student_lesson')->withPivot('grade');
    }
}
