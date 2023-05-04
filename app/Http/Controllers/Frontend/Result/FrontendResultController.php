<?php

namespace App\Http\Controllers\Frontend\Result;

use App\Models\YearResult;
use App\Models\ResultTable;
use Illuminate\Http\Request;
use App\Models\SubjectResult;
use App\Models\RoutineSemester;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Result;

class FrontendResultController extends Controller
{
    // ** SEMESTER 
    public function semesterIndex(){
        $allSemester = RoutineSemester::all();
        return view('frontend.result.semester',compact('allSemester'));
    }

    // ** ALL SUBJECT 
    public function allSubject($id){
        $subjectList = RoutineSemester::with('semester_Parent_Subject')->find($id);
       // dd($subjectList);
        return view('frontend.result.subjectList',compact('subjectList'));
    }

    

    // ** SUBJECT RESULT 
    public function resultDetails($id){
        $results = YearResult::with('getResults')->find($id);
        return view('frontend.result.resultDetails',compact('results'));
    }

    // ** RESULT PDF    
    public function pdfView($id){
        $resultPDF = ResultTable::find($id);
        $semester = RoutineSemester::find($id);
        $subject = SubjectResult::find($id);
    //    dd($subject->subject_name);
        $pdf = Pdf::loadView('frontend.result.showPdf', compact('resultPDF','semester','subject'))->setPaper('a4','portrait');
        return $pdf->stream('result.pdf');
    }

    // ** PDF CONTENTS 
    // public function pdfContents($id){
    //     $result = ResultTable::find($id);
    //     return view('frontend.result.showPdf',compact('allSemester'));
    // }















    // public function showResult()
    // {
    //     $years = YearResult::get();
    //     $semisters = SubjectResult::get();
    //     return view('frontend.result.showResult', compact('years', 'semisters'));
    // }







    // public function getResultQuery(Request $request)
    // {

    //     $year = $request->year;
    //     $semister = $request->semister;

    //     $query = Result::query();

    //     if ($year) {
    //         $query->where("year_result_id", $year);
    //     }
    //     if ($semister) {
    //         $query->where("subject_result_id", $semister);
    //     }
    //     $semister = $query->with('getYear','getSemister')->get();

    //     dd($semister);
    // }
}