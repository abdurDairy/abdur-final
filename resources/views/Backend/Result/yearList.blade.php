@extends('Admin.adminMaster')

@section('general-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header bg-info text-light py-4">
                        <h1>Result List</h1>
                    </div>
                    {{-- ** LIST DETAILS ** --}}
                    <div class="card-body">
                        <table class="table table-responsive table-hover">
                            {{-- *SUCCESS MESSAGE START** --}}
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                            @endif
                            {{-- *SUCCESS MESSAGE END** --}}
                            {{-- *DELETE MESSAGE START** --}}
                            @if(Session::has('delete'))
                                <div class="alert alert-danger">
                                    {{Session::get('delete')}}
                                </div>
                            @endif
                            {{-- *DELETE MESSAGE END** --}}
                            <tr>
                                <td>SL</td>
                                <td>Year</td>
                                <td>Action</td>
                            </tr>

                            @foreach ($allYear as $key => $year)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $year->passing_year }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('subject.year.list.edit',$year->id) }}" class="btn ntn-sm btn-primary">Edit</a>
                                            <a href="{{ route('year.delete',$year->id ) }}" class="dlt_btn btn ntn-sm btn-danger">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center">
                            {!! $allYear->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('sweetJs')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

let deleteBtn = $('.dlt_btn')
deleteBtn.click(function(event){
    event.preventDefault();
    Swal.fire({
    title: 'Are you sure?',
    text: "if you delete this then all data will be delete regurding this subject",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        window.location.href = $(this).attr('href')
        Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
    }
    })
    
})
</script>
@endpush