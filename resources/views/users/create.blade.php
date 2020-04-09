@extends('layouts.main')

@section('title','Registration')   

@section('content')
    <div class="jumbotron">
        <h1 class="display-3">Registration Page</h1>
        <form action="{{Route('users.store')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}"  name="name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}"  name="email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control @error('email') is-invalid @enderror" id="exampleInputPassword1" name="password">
          </div>
          
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>

@endsection