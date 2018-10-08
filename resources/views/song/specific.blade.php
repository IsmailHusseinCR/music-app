@extends('layout.app')
@section('content')
    <h1>Song</h1>
    
        <div class="card">

            <!-- Card image -->
            <!-- Card content -->
            <div class="card-body">
          
              <!-- Title -->
            <h4 class="card-title">{{$songs->title}}</h4>
              <!-- Text -->
              <p class="card-text">Added on {{$songs->created_at}} </p>
              {{-- <p class="card-text">Genre : {{$album->genre->name}} </p> --}}
              <!-- Button -->
              {{-- <a href="/song" class="btn btn-primary">Check Songs</a> --}}
              <a href="/song/{{$songs->id}}/edit" class="btn btn-default">Edit</a>
              {!!Form::open(['action' => ['SongController@destroy', $songs->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            </div>
          </div>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Lyrics</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <th scope="row">{{$songs->id}}</th>
                    <td>{{$songs->lyrics->text}}</td>
              </tr>
            </tbody>
          </table>
    
@endsection

