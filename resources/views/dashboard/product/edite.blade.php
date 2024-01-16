@extends('dashboard.style.main')


@section('content')
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Basic form elements</h4>
<p class="card-description"> Basic form elements </p>
<form class="forms-sample" action="{{ route('admin.store') }}" method="post">
@csrf
<div class="form-group">
<label for="exampleInputName1">Name</label>
<input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
</div>
<div class="form-group">
<label for="exampleInputEmail3">Email address</label>
<input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email">
</div>
<div class="form-group">
<label for="exampleInputPassword4">Password</label>
<input type="password" class="form-control" id="exampleInputPassword4" name="password" placeholder="Password">
</div>
<div class="form-group">
<label for="exampleInputPassword4">Confirm Password </label>
<input type="password" class="form-control" id="exampleInputPassword4" name="password_confirmation" placeholder="Password">
</div>

<div class="form-group">
<label for="exampleSelectGender">Gender</label>
<select name="gender" class="form-control" id="exampleSelectGender">
<option value="1">Male</option>
<option value="0">Female</option>
</select>
</div>



<div class="form-group">
<label for="exampleSelectGender">Gender</label>
<select name="prive" class="form-control" id="exampleSelectGender">
@forelse (config('permission')["prive"] as $key=>$value)
<option value="{{ $value }}">{{ $key }}</option>
@empty
@endforelse
</select>
</div>

<div class="col-md-6">
<div class="form-group">
@forelse (config('permission')['permission'] as $value)
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" value="{{ $value }}" name="permission[]"> {{ $value }} <i class="input-helper"></i></label>
</div>

@empty

@endforelse


</div>
</div>

<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<button class="btn btn-light">Cancel</button>
</form>
</div>
</div>
</div>
@endsection

