<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoutineSemesterDetails extends Model
{
    use HasFactory;
    public function RoutineSemester(){
        return $this->belongsTo(RoutineSemester::class);
    }
    
    // public function resultYear(){
    //     return $this->belongsTo(ResultYear::class);
    // }
}