@extends('layout.app')
@section('content')

  
<div class="card">

    <!-- Card image -->
    <!-- Card content -->
    <div class="card-body">
  
      <!-- Title -->
    <h4 class="card-title"></h4>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Genre</th>
            <th scope="col">Artist</th>
          </tr>
        </thead>
        <tbody>
    
    @if (count($albums) > 0)
    @foreach ($albums as $album)
    <tr>
        <th scope="row">{{$album->id}}</th>
            <td>{{$album->title}}</td>
            <td>{{$album->genre->name}}</td>
            <td>{{$album->user->name}}</td>
            
    </tr>

    
@endforeach
    @else
    <td>Sorry , niks gevonden</td>
    @endif
        </tbody>
    </table>
    </div>
</div>
@endsection
