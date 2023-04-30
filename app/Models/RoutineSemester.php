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
 
}