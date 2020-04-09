@extends('layouts.main')

@section('title','Show Room')

@section('content')

    <div class="jumbotron">
      <small>{{$day}}</small>
      <hr>
      @if($room->reservations->count())
        @foreach($room->reservations as $reservation)
          
        @endforeach
      
      @endif
      {{-- {{$reservation->starts<$day && $day<$reservation->ends? 'red' : 'green'}} --}}
      {{-- <span>{{$reservation->starts<$day && $day<$reservation->ends? ' Currently In Use' : ' Available'}}</span> --}}
      {{--  --}}
      <h1 class="display-5">Booking Page</h1>
      <h3>{{strtoupper($room['name'])}}<span class="{{$room->reservations->count()? 'red' : 'green'}}"><small><i>{{$room->reservations->count()? ' has some booking' : ' totally available'}}</i></small></span></h3>
      {{-- <form action="/rooms/{{$room->id}}" method="post">
          @method('PATCH')
          @csrf
          <label class="checkbox" for="status">
            <input type="checkbox" name="status" onchange="this.form.submit()" {{$room->status? 'checked' : ''}}>
          </label>
      </form> --}}
      <form action="/rooms/{{$room['id']}}/reservations" method="post">
        @csrf
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" value="{{ old('description') }}" name="description">
        </div>
        <div class="form-group">
          <label for="starts">From</label>
          <input type="datetime-local" class="form-control @error('starts') is-invalid @enderror" id="starts" value="{{ old('starts') }}" name="starts">
        </div>
        <div class="form-group">
          <label for="ends">To</label>
          <input type="datetime-local" class="form-control @error('ends') is-invalid @enderror" id="ends" value="{{ old('ends') }}" name="ends">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Book</button>
      </form>
      <script type="text/javascript">
        
        let starts=document.getElementById('starts');
        console.log(starts);
      </script>
      @if($room->reservations->count())  
      <a href="/rooms/show-details/{{$room['id']}}"><button type="submit" class="btn btn-info" style="float: right; margin-left: 25px;margin-top: 20px">Details</button></a>
      @endif
      <a href="/rooms"><button style="float: right; margin-left: 25px;margin-top: 20px" class="btn btn-secondary">Back</button></a>
    </div>

@endsection