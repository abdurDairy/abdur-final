@extends('Admin.adminMaster')
@section('general-content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card p-5">
                    <div class="card-header bg-info text-light py-4">
                        <h1>Edit Year</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subject.year.insert') }}" method="POST">
                            @csrf

                            {{-- **INPUT SUBJECT NAME ** --}}
                            <label for="subjectYear">write a new subject name</label>
                            <input value="{{ $findYear->passing_year  }}" name="subjectYear" id="subjectYear" type="number" class="form-control" placeholder="insert a 4 digit year..Like 2022">
                            {{-- **ERROR MESSAGE ** --}}
                            @if($errors->has('subjectYear'))
                                <div class="error"><strong style="color:red;font-weight:bold;">{{ $errors->first('subjectYear') }}</strong></div>
                            @endif

                            <button class="btn btn-primary w-100 mt-3">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection