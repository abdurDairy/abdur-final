<?php

namespace App\Http\Controllers\Backend\Result;

use App\Models\YearResult;
use Illuminate\Http\Request;
use App\Models\SubjectResult;
use App\Models\RoutineSemester;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ResultTable;
use App\Models\SubjectResult_YearResult;

class ResultController extends Controller
{
    //SUBJECT 
    public function subjectResult(){
        $allSemester = RoutineSemester::all();
        return view('Backend.Result.subjectResult',compact('allSemester'));
    }
    public function subjectResultInsert(Request $request){
        $request->validate([
            'semester' => 'required',
            'subjectName' => 'required',
        ]);

        // * INSERT DATA 
        $subjectData = new subjectResult();
        $subjectData->subject_name = $request->subjectName;
        $subjectData->routine_semester_id = $request->semester;
        $subjectData->save();
        return redirect()->route('subject.result.list')->with('success', 'Subject data insertd');
    }


    // ** SUBJECT RESULT LIST 
    public function subjectResultList()
    {
        // $allSubjectList = RoutineSemester::with('semester_Parent_Subject')->get();
        // dd($allSubjectList[0]->Semester);

        $allSubjectList = subjectResult::latest()->paginate(10);
        return view('Backend.Result.resultList',compact('allSubjectList'));
    }


    // ** SUBJECT EDIT 
    public function subjectResultEdit($id){
        $allSemester = RoutineSemester::all();
        $allSubject = SubjectResult::find($id);
        return view('Backend.Result.editSubject',compact('allSemester','allSubject'));
    }

    // ** UPDATE RESULT DATA 
    public function subjectResultUpdate(Request $request, $id){
        $request->validate([
            'semester' => 'required',
            'subjectName' => 'required',
        ]);
        
        $updateData = SubjectResult::find($id);
        $updateData->subject_name = $request->subjectName;
        $updateData->routine_semester_id = $request->semester;
        $updateData->save();
        return redirect()->route('subject.result.list')->with('success', 'Subject data insertd');
        
    }


    // ** DELEE SUBJECT 
    public function deleteSubject($id){
        DB::table('subject_results')->where('id', $id)->delete();
        return redirect()->route('subject.result.list')->with('delete', 'Subject data deleted !');
    }


    
    /**
     * 
     * 
     //*****************************__YEAR__*******************
     *
     * 
     */

     
     
    public function subjectYear(){
        return view('Backend.Result.year');
    }

    // ** YEAR INSERT 
    public function subjectYearInsert(Request $request){
        $request->validate([
            'subjectYear' => 'required|unique:year_results,passing_year',
        ]);

        $yearInsert = new YearResult();
        $yearInsert->passing_year = $request->subjectYear;
        $yearInsert->save();
        return redirect()->route('subject.year.list')->with('success', 'new year inserted!');
    }
    
    
    // ** SUBJECT YEAR LIST 
    public function subjectYearList(){
        $allYear = YearResult::latest()->paginate(2);
        return view('Backend.Result.yearList',compact('allYear'));
    }
    // **YEAR EDIT 
    public function subjectYearListEdit($id){
        $findYear = YearResult::find($id);
        return view('Backend.Result.yearEdit',compact('findYear'));
    }
    // ** YEAR UPDATE 
    public function yearUpdate(Request $request, $id, YearResult $year){
        $request->validate([
            
            'subjectYear' => 'required|unique:year_results,passing_year,except'.$year->$id,
            
        ]);
        
        $updateYear = YearResult::find($id);
        $updateYear->passing_year  = $request->subjectYear;
        $updateYear->save();
        return redirect()->route('subject.year.list')->with('success', 'new year updated !');
    }
    // ** DELEE SUBJECT 
    public function deleteYear($id){
        DB::table('year_results')->where('id', $id)->delete();
        return redirect()->route('subject.year.list')->with('delete', 'year data deleted !');
    }

    /**
     * 
     * 
     //*****************************__DETAILS__*******************
     *
     * 
     */
    public function resultDetails(){
        $allsemester = RoutineSemester::all();
        $allsubject = subjectResult::all();
        $allyear = YearResult::all();
        return view('Backend.Result.details',compact('allsubject','allyear','allsemester'));
    }
    
    public function resultDetailsUpload(Request $request){
        $resultTable = new ResultTable();
        $resultTable->subject_result_id = $request->subject;
        $resultTable->year_result_id = $request->year;
        $resultTable->result_details = $request->resultDetails;
        $resultTable->save();
        return back();
    }
}