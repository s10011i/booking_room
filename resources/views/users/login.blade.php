@extends('layouts.main')

@section('title','Login')   

@section('content')
    <div class="jumbotron">
        <h1 class="display-3">Login Page</h1>
        <form action="{{Route('login')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ old('email') }}" name="email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password">
          </div>
          
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>

@endsection