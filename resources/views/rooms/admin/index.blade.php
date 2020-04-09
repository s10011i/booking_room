@extends('layouts.main')

@section('title','Rooms')   

@section('content')
  <div class="jumbotron">
    <h1 class="display-3">List of Rooms</h1>
    <div class="row">
      @foreach($rooms as $room)
        <div class="col-md-3" style="border:1px solid black; margin: 10px;height: 120px">
          <h3>{{strtoupper($room['name'])}}</h3>
          <p class="{{$room->status? 'red' : 'green'}}">{{$room->status? 'has some booking' : 'Totally available'}}</p>
          
          <form action="/rooms/{{$room->id}}" method="post">
            {{method_field('DELETE')}}
            {{csrf_field()}}
            <button type="submit" style="float: right" class="btn btn-outline-danger btn-sm"><small>Delete</small></button>
        </form> 
        </div>
      @endforeach
    </div>
    <a href="/rooms/create"><button type="button" style="margin-top: 20px" class="btn btn-outline-primary">Add Room</button></a>
          
  </div>

@endsection