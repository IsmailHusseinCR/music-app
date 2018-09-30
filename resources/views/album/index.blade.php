@extends('layout.app')
@section('content')
    <h1>Albums</h1>
    
    @if (count($albums) > 0)
        @foreach ($albums as $album)
        <div class="card">

            <!-- Card image -->
            <!-- Card content -->
            <div class="card-body">
          
              <!-- Title -->
            <h4 class="card-title"><a href="/album/{{$album->id}}">{{$album->title}}</a></h4>
              <!-- Text -->
              <p class="card-text">Added on {{$album->added_on}} </p>
              <!-- Button -->
              <a href="#" class="btn btn-primary">Check Songs</a>
          
            </div>
          
          </div>
        @endforeach
    @else
        <p>Geen Albums</p>
    @endif
@endsection

