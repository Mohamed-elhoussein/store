@extends('dashboard.style.main')


@section('content')
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Basic form elements</h4>
<p class="card-description"> Basic form elements </p>
<form class="forms-sample" action="{{ route('product.update',$data->id) }}" method="post" enctype="multipart/form-data">
@method('PUT')
@include('dashboard.product.form')
@endsection

