@extends('welcome')
@section('content')
  @if(session()->has('error'))
  <div class="alert alert-danger">
    {{ session()->get('error') }}
  </div>
  @endif
<div class="container">
  <form method="post" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">wulung@tes.com pass = 123</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection