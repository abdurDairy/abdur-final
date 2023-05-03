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
                               <th>Semester</th>
                               <th>Subject Name</th>
                               <th>Year</th>
                               <th>Download PDF</th>
                           </tr>


                           @forelse ($results->semester_Parent_result as $key=>$data)
                                <tr>
                                    <td>
                                        {{ ++$key }}
                                    </td>
                                    <td>
                                        {{ $results->Semester }}
                                    </td>

                                        <td>
                                          @foreach ($results->semester_Parent_Subject as $sub)
                                             {{ $sub->subject_name  }}
                                          @endforeach
                                        </td>
                                    <td>
                                        {{ $data->year_result_id   }}
                                    </td>
                                    <td>
                                        {{ $data->result_details }}
                                    </td>
                                </tr>
                               
                           @empty
                               <strong>no data found ! </strong>
                           @endforelse
                        </table>
                    </div>
                </div>
          </div>
        </div>
    </div>
@endsection