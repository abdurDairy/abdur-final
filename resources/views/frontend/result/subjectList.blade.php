@extends('frontend.navFooter')
@section('home.content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="header" style="background: #094270;padding:8px 30px;display: inline-block;">
                    <h4 style="color:#ffff; font-family:sans-serif;font-weight:bold;">Select Subject For Checking Result</h4>
                </div>
                <div class="content-body my-5">
                    <div class="row">
                        @forelse ($subjectList->semester_Parent_Subject as $subject)
                            <div class="col-lg-4 my-2">
                                <a href="{{ route('result.index',$subject->id) }}" style="color:#fff;text-align:center;">
                                    <div class="subject-btn" style="padding: 30px;background:#08a83d;">
                                       <span style="font-size:18px;font-family:'Times New Roman', Times, serif;"> {{ $subject->subject_name  }}</span>
                                    </div>
                                </a>
                            </div> 
                        @empty
                            <div class="row">
                                <div class="col-12">
                                    <h4>No data found</h4>
                                </div>
                            </div>
                        @endforelse
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection