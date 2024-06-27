@extends('web.layouts.web')
@section('content')
<div class="frm text-center">
  @if(session('success'))

      <div class="alert alert-success">{{session('success')}}</div>

  @endif
  <h2 class="text-danger text-center mt-5">Signin</h2>
<form action="sigin" method="POST" style="width:30%; margin-left: 500px;">
  @csrf
  <div class="form-group mt-5" style="text-align: left;">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
    @error('email')
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group mt-4" style="text-align: left;">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="{{ old('password') }}">
    @error('password')
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group mt-4" style="text-align: left;">
   <label for="message">Message</label>
   <textarea class="form-control" name="message" placeholder="Enter message..." row="5">{{ old('message')}}</textarea>
   @error('message')
    <div class="text-danger">{{$message}}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-dark mt-4">Submit</button>
</form>
</div>

@endsection

