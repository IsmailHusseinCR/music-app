@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">

                        <!-- Card image -->
                      
                        <!-- Card content -->
                        <div class="card-body">
                      
                          <!-- Title -->
                          <h4 class="card-title"><a>Dashboard</a></h4>
                          <!-- Text -->
                        <p class="card-text">
                            Uw albums hieronder
                        </p>
                          <!-- Button -->
                          <a href="/album/create" class="btn btn-primary">Create Album</a>
                        </div>
                      
                      </div>
                    
                      @if (count($albums) > 0)
                      
              
                      <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Artist</th>
                              </tr>
                            </thead>
                            <tbody>
                      @foreach ($albums as $album)
                        <tr>
                            <th scope="row">{{$album->id}}</th>
                            <td>{{ $album->title }}</td>
                            <td>{{ $album->user->name }}</td>
                        <td><a href="/album/{{$album->id}}/edit" class="btn btn-default">Edit</a></td>
                        <td>
                            {!!Form::open(['action' => ['CrudController@destroy', $album->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>


                <div class="card">
                    <div class="card-body">
                      
                        <!-- Title -->
                        <h4 class="card-title"><a>Bookmarks</a></h4>
                        <!-- Text -->
                        @foreach ($bookmarks as $bookmark)
                      <p class="card-text">
                           {{$bookmark->album->title}} 
                      </p>
                      @endforeach
                        <!-- Button -->
                    </div>

                </div>
                @else
                <p>U heeft geen albums</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
