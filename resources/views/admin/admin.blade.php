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
        <td> 
                @if($album->active == 0)
                {!!Form::open(['action' => ['AdminController@switch'], 'method' => 'POST'])!!}
                {{Form::hidden('id', $album->id)}}
                {{Form::hidden('message', 'Album visible')}}
                {{Form::submit('Show', ['class' => 'btn btn-danger float-right mx-0'])}}
                {!!Form::close()!!}
            @else
                {!!Form::open(['action' => ['AdminController@switch'], 'method' => 'POST'])!!}
                {{Form::hidden('id', $album->id)}}
                {{Form::hidden('message', 'Album hidden')}}
                {{Form::submit('Hide', ['class' => 'btn btn-primary float-right'])}}
                {!!Form::close()!!}
            @endif
        </td>
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