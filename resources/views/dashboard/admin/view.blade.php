@extends('dashboard.style.main')

@section('content')
@if(Session::has('ms_admin'))
<div class='alert alert-success' >
{{ session('ms_admin') }}
</div>
@endif
<a class='btn btn-primary' href="{{ route('admin.create') }}">Add Admin</a>

@endsection



