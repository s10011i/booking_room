@extends('layouts.main')

@section('title','Show Room')
    

@section('content')

    <div class="jumbotron">
        <h1 class="display-3">Adding Room</h1>
        
        <form action="/rooms" method="post">
          @csrf
          <div class="form-group">
            <label for="name">Name of the room</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" name="name">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Add</button>
        </form>
          
        <a href="/rooms"><button type="button" style="float: right; margin-left: 25px; margin-top: 20px" class="btn btn-secondary">Back</button></a>
    </div>

@endsection

