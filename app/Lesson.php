<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    protected $table='lessons';

    protected $fillable=['lesson_name','lesson_credit'];
    public function students()
    {
        return $this->belongsToMany(Student::class,'student_lesson')->withPivot('grade');
    }
}
