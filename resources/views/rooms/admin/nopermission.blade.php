@extends('layouts.main')

{{-- @section('title')
    {{$title}}
@endsection --}}
@section('title','No Permission')   

@section('content')
  <div class="jumbotron" style="background-color: black">
    <h1 class="display-3" style="color:red;">YOU DON'T HAVE PERMISSION FOR THIS PAGE!!!</h1>
    <a href="/"><button style="float: right; margin-left: 25px;margin-top: 20px" class="btn btn-secondary">Back</button></a>
          
  </div>

@endsection