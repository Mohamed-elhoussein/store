@extends('dashboard.style.main')


@section('content')

@if(Session::has('ms_admin'))
<div class='alert alert-success' >
{{ session('ms_admin') }}
</div>
@endif
<a class="btn btn-primary" href="{{ route('product.create') }}">Add Product</a>
<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Admins</h4>


<table class="table table-dark">
<thead>
<tr style="text-align:center;">
<th> # </th>
<th> # </th>
<th>  Name </th>
<th> price </th>
<th> sale </th>
<th> quntity </th>
<th> cteogry </th>
<th> images </th>
<th>Edite/Delete</th>
</tr>
</thead>
<tbody>

@forelse ($data_product as $key=> $row)
<tr>
<td>{{ ++$key }}<td>
<td> {{ $row->name }} </td>
<td> {{ $row->price }} </td>
<td> {{ $row->sale }} </td>
<td> {{ $row->quntity }} </td>
<td> {{ $row->cteogry }} </td>
{{-- image --}}
<td>
@foreach ($row->images as $row)
<img src="{{ asset('storage/images/'.$row->image) }}">
@endforeach
</td>
{{-- image --}}
<td><a href="" class='btn btn-primary'>Edite</a></td>
</tr>
@empty

@endforelse







</tbody>
</table>
</div>
</div>
</div>

@endsection




