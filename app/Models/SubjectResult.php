<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectResult extends Model
{
    use HasFactory;

    public function getResult(){
        return $this->hasMany(ResultTable::class);
    }

    // ** RELATION WITH ROUTINE SEMESTER 
    public function subject_Belongs_semester(){
        return $this->belongsTo(RoutineSemester::class);
    }
}