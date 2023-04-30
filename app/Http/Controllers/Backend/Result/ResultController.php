<?php

namespace App\Http\Controllers\Backend\Result;

use App\Http\Controllers\Controller;
use App\Models\SubjectResult;
use App\Models\SubjectResult_YearResult;
use App\Models\YearResult;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    //SUBJECT 
    public function subjectResult(){
        $year = SubjectResult::with('year')->get();
        dd($year);
        return view('Backend.Result.subjectResult',compact('year'));
    }
}