<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultTable extends Model
{
    use HasFactory;
    public function getYear(){
        return $this->belongsTo(YearResult::class,'year_result_id');
    }

    public function getSubject(){
        return $this->belongsTo(SubjectResult::class, 'subject_result_id');
    }

    public function getSemester(){
        return $this->belongsTo(RoutineSemester::class);
    }
}