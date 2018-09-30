@extends('layout.app')
@section('content')
    <h1>Albums</h1>
    
        <div class="card">

            <!-- Card image -->
            <!-- Card content -->
            <div class="card-body">
          
              <!-- Title -->
            <h4 class="card-title">{{$albums->title}}</h4>
              <!-- Text -->
              <p class="card-text">Added on {{$albums->added_on}} </p>
              <!-- Button -->
              <a href="#" class="btn btn-primary">Check Songs</a>
          
            </div>
          <a href="/album/{{$albums->id}}/edit" class="btn btn-default">Edit</a>

          {!!Form::open(['action' => ['CrudController@destroy', $albums->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
          {!!Form::close()!!}
          </div>
    
@endsection

