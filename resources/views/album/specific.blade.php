@extends('layout.app')
@section('content')
    <h1>Albums</h1>
    
        <div class="card">

            <!-- Card image -->
            <!-- Card content -->
            <div class="card-body">
          
              <!-- Title -->
            <h4 class="card-title">{{$album->title}}</h4>
              <!-- Text -->
              <p class="card-text">Added on {{$album->added_on}} </p>
              <p class="card-text">Genre : {{$album->genre->name}} </p>
              <!-- Button -->
              <a href="#" class="btn btn-primary">Check Songs</a>
              <a href="/album/{{$album->id}}/edit" class="btn btn-default">Edit</a>
              {!!Form::open(['action' => ['CrudController@destroy', $album->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            </div>
          </div>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
              </tr>
            </thead>
            <tbody>
                @foreach($album->songs as $song)
                <tr>
                  <th scope="row">{{$song->id}}</th>
                  <td>{{ $song->title }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    
@endsection

