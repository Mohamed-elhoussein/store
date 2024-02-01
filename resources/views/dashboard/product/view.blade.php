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
@foreach ($row->images as $img)
<img src="{{ asset('storage/images/'.$img->image) }}">
@endforeach
</td>
{{-- image --}}
<td>
<a href="{{ route('product.show',$row->id) }}" class='btn btn-primary'>Edite</a>
<form action="{{ route('product.destroy',$row->id) }}" method="post" style="display: contents;">
@csrf
@method('DELETE')
<input type="submit"  class="btn btn-danger" value="Delete">
</form>
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




