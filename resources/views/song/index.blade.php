@extends('layout.app')
@section('content')
    <h1>Songs</h1>
    
    @if (count($songs) > 0)
        @foreach ($songs as $song)
        <div class="card">

            <!-- Card image -->
            <!-- Card content -->
            <div class="card-body">
          
              <!-- Title -->
            <h4 class="card-title"><a href="/song/{{$song->id}}">{{$song->title}}</a></h4>
              <!-- Text -->
              <p class="card-text">Added on {{$song->created_at}} </p>
              <!-- Button -->
              <a href="/song/{{$song->id}}" class="btn btn-primary">Check song</a>
          
            </div>
          
          </div>
        @endforeach
    @else
        <p>Geen songs</p>
    @endif
@endsection