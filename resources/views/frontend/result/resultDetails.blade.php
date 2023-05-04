@extends('frontend.navFooter')
@section('home.content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="header" style="background: #094270;padding:8px 30px;display: inline-block;">
                    <h4 style="color:#ffff; font-family:sans-serif;font-weight:bold;">Show Result</h4>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-responsive table-hover">
                           <tr>
                               <th>SN</th>
                               {{-- <th>Semester</th> --}}
                               {{-- <th>Subject Name</th> --}}
                               <th>Year</th>
                               <th>Download PDF</th>
                           </tr>

                           @forelse ( $results->getResults as $key=>$result)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $results->passing_year }}</td>
                                    <td>
                                        <a href="{{ route('pdf.index',$result->id) }}">Download PDF</a>
                                    </td>
                                </tr>
                           @empty
                               <div class="row col-12 card ">
                                   <h4>No Data Found ..</h4>
                               </div>
                           @endforelse
                        </table>
                    </div>
                </div>
          </div>
        </div>
    </div>
@endsection