@extends('dashboard.style.main')

@section('content')
@if(Session::has('ms_admin'))
<div class='alert alert-success' >
{{ session('ms_admin') }}
</div>
@endif
<a class='btn btn-primary' href="{{ route('admin.create') }}">Add Admin</a>
<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Admins</h4>


<table class="table table-dark">
<thead>
<tr style="text-align:center;">
<th> # </th>
<th>  User Name </th>
<th> Email </th>
<th> Gender </th>
<th> Prive </th>
<th>Edite/Delete</th>
</tr>
</thead>
<tbody>
@forelse ($data as $key =>$row)
<tr>
<td> {{ 1+$key }} </td>
<td> {{ $row->name }}</td>
<td> {{ $row->email }}</td>
<td> {{ $row->gender==1?"male":"female" }}</td>
<td> {{ $row->permission->prive==300?"owner":"" }}{{ $row->permission->prive==200?"admin":"" }}{{ $row->permission->prive==100?"auppervisor":"" }}</td>
<td>
<a href="{{ route('admin.edit',$row->id) }}" class='btn btn-primary'>Edite</a>
@include('dashboard.style.modal')

</td>
</tr>

@empty

@endforelse


</tbody>
</table>
</div>
</div>
</div>



@endsection



