<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class YearResult extends Model
{
    use HasFactory;

    public function year_Belongs_result(){
        return $this->belongsTo(ResultTable::class);
    }
}