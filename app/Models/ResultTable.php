<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultTable extends Model
{
    use HasFactory;
    public function result_Parent_year(){
        return $this->hasMany(YearResult::class);
    }

    
    public function result_parent_subject(){
        return $this->hasMany(SubjectResult::class);
    }
    
    public function result_belong_routine(){
        return $this->belongsTo(RoutineSemester::class);
    }
}