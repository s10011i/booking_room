@extends('layouts.main')

@section('title','Details of Booked Room')
    
@section('content')
    <div class="jumbotron">
        <small>{{$day}}</small>
        <hr>
        <h1 class="display-3">Some info ab this booked Room</h1>
        <h3>{{strtoupper($room['name'])}}</h3>
        @if($room->reservations->count())
        <table  class="table table-hover">
            <thead>
                <tr  class="table-primary">
                    <th scope="col">User ID</th>
                    <th scope="col">Description</th>
                    <th scope="col">Starts</th>
                    <th scope="col">Ends</th>
                </tr>
            </thead>
        @foreach($room->reservations as $reservations)
        <tbody>
            <tr class="table-success {{$reservations->starts<$day && $day<$reservations->ends? 'red' : ''}} {{$reservations->starts<$day && $reservations->ends<$day? 'linthrough' : ''}} {{$day<$reservations->starts && $day<$reservations->ends? 'green' : ''}}">
                <td>{{ $reservations->user_id}}</td>
                <td>{{ $reservations->description}}</td>
                <td>{{ $reservations->starts}}</td>
                <td>{{ $reservations->ends}}</td>
            </tr>
        </tbody>
        
        @endforeach
        </table>
        @endif
        <a href="/rooms"><button style="float: right; margin-left: 25px;margin-top: 20px" class="btn btn-secondary">Back</button></a>
    </div>

@endsection