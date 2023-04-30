<?php

namespace App\Http\Controllers\Frontend\Result;


use App\Models\ResultYear;
use Illuminate\Http\Request;
use App\Models\ResultDetails;
use App\Models\RoutineSemester;
use App\Models\SemesterSubject;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\RelationalSessionYear;
use Illuminate\Contracts\View\View;

class CtResultController extends Controller
{
    public function resultSemester()
    {
        $allSemester = RoutineSemester::all();
        return view('frontend.result.resultSemester',compact('allSemester'));
    }

    // *SUJECT FIND
    public function resultSubject($id)
    {
        $allSubject = RoutineSemester::with(['semesterSubject'])->find($id);
        return view('frontend.result.resultSubject',compact('allSubject'));
    }

    // **ACADEMIC YEAR 
    public function academicYear($id){
        $academicYear = SemesterSubject::with('relationalSessionYear')->find($id);
        dd($academicYear);
        return view('frontend.result.resultYear',compact('academicYear'));
    }

    // ** RESULT DETAILS 
    public function resultDetails($id){
        
        $resultDetails = ResultDetails::find($id);
        // dd($resultDetails);
       
        $pdf = Pdf::loadView('frontend.result.test', array('resultDetails' => $resultDetails));
       // return view('frontend.result.test');
        return $pdf->stream('result.pdf');
    }



    public function resultPdf($id){
        $allResult = ResultYear::with('finalResult')->find($id);
        // dd($allResult);
        return view('frontend.result.resultPdfView',compact('allResult'));
    }
}