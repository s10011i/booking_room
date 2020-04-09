@extends('layouts.main')

{{-- @section('title')
    {{$title}}
@endsection --}}
@section('title','Rooms')   

@section('content')
  <div class="jumbotron">
    <small>{{$day}}</small>
    <hr>
    <h1 class="display-3">List of Rooms</h1>
    <div class="row">
      @foreach($rooms as $room)
        <div class="col-md-3" style="border:1px solid black; margin: 10px;height: 120px">
          <h3>{{strtoupper($room['name'])}}</h3>
          <p class="{{$room->status? 'red' : 'green'}}">{{$room->status? 'has some booking' : 'Totally available'}}</p>
          @if($room->status)
            <a href="/rooms/show-details/{{$room['id']}}"><button type="submit" class="btn btn-info btn-sm">Details</button></a>
          @endif
          <a href="/rooms/{{$room['id']}}"><button style="float: right" type="submit" class="btn btn-primary btn-sm">Book Now</button></a>
          
        </div>
      @endforeach
    </div>
          
  </div>

@endsection