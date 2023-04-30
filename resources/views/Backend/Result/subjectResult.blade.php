@extends('Admin.adminMaster')
@section('general-content')
    
<h1>SUBJECT</h1>
@foreach ($year as $data)
    {{ $data }}
@endforeach
@endsection