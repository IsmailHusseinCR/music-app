@extends('layout.app')
@section('content')
{{$admin->name}}

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
                <th scope="col">Settings</th>
              </tr>
            </thead>
            <tbody>
                <tr></tr>
                <th>ID</th>
                 

                 {{-- {{{dd($albums)}}} --}}
        
        @if (count($albums) > 0)
        @foreach ($albums as $album)
        <tr>
        <th scope="row">{{$album->id}}</th>
        <td>{{$album->title}}</td>
        <td>{{$album->genre->name}}</td>
        <td>{{$album->user->name}}</td>
        <td><a href="/album/3/edit" class="btn btn-default">Actief</a></td>
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