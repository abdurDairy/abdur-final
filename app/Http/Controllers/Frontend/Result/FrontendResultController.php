<?php

namespace App\Http\Controllers\Frontend\Result;

use App\Http\Controllers\Controller;
use App\Models\ResultTable;
use App\Models\RoutineSemester;
use App\Models\SubjectResult;
use Illuminate\Http\Request;

class FrontendResultController extends Controller
{
    // ** SEMESTER 
    public function semesterIndex(){
        $allSemester = RoutineSemester::all();
        return view('frontend.result.semester',compact('allSemester'));
    }

    // ** ALL SUBJECT 
    // public function allSubject($id){
    //     $subjectList = RoutineSemester::with('semester_Parent_Subject')->find($id);
    //     return view('frontend.result.subjectList',compact('subjectList'));
    // }

    // ** SUBJECT RESULT 
    public function resultDetails($id){
        $results = RoutineSemester::with(['semester_Parent_result','semester_Parent_Subject'])->find($id);
        // dd($results->semester_Parent_Subject[0]->subject_name);
        return view('frontend.result.resultDetails',compact('results'));
    }
}