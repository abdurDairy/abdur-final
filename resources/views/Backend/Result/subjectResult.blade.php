@extends('Admin.adminMaster')
@section('general-content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card p-5">
                    <div class="card-header bg-info text-light py-4">
                        <h1>insert a subject</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{  route('subject.result.insert') }}" method="POST">
                            @csrf

                            {{-- **SEMESTER SELECT * --}}
                            <label for="semester">Select a semester for subject</label>
                            <select name="semester" id="semester" class="form-control my-3">
                                <option value="" disabled selected>Select Semester</option>

                                {{-- ** ALL SEMESTER FROM ROUTINE SEMESTER MODEL --}}
                                @foreach ($allSemester as $semesterData)
                                  <option value="{{ $semesterData->id }}">{{ $semesterData->Semester }}</option>
                                @endforeach
                            </select>
                            {{-- **ERROR MESSAGE ** --}}
                            @if($errors->has('semester'))
                                <div class="error"><strong style="color:red;font-weight:bold;">{{ $errors->first('subjectName') }}</strong></div>
                            @endif


                            {{-- **INPUT SUBJECT NAME ** --}}
                            <label for="subjectName">write a new subject name</label>
                            <input name="subjectName" id="subjectName" type="text" class="form-control" placeholder="write a new subject name..">
                            {{-- **ERROR MESSAGE ** --}}
                            @if($errors->has('subjectName'))
                                <div class="error"><strong style="color:red;font-weight:bold;">{{ $errors->first('subjectName') }}</strong></div>
                            @endif

                            <button class="btn btn-primary w-100 mt-3">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection