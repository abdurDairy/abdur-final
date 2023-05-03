<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoutineSemester extends Model
{
    use HasFactory;
    public function RoutineSemesterDetails(){
        return $this->hasMany(RoutineSemesterDetails::class);
    } 

    // ** RELATION FOR RESULT SUBJECT 
    public function semester_Parent_Subject(){
        return $this->hasMany(SubjectResult::class);
    }

    // ** RELATION FOR RESULT DETAILS 
    public function semester_Parent_result(){
        return $this->hasMany(ResultTable::class);
    }
}