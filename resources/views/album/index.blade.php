@extends('layout.app')
@section('content')
    <h1>Albums</h1>
    
    @if (count($albums) > 0)
        
        @foreach ($albums as $album)
  
        @if ($album->active == 1)
        <div class="card">

                <!-- Card image -->
                <!-- Card content -->
                <div class="card-body">
              
                  <!-- Title -->
                <h4 class="card-title"><a href="/album/{{$album->id}}">{{$album->title}}</a></h4>
                  <!-- Text -->
                  <p class="card-text">Added on {{$album->added_on}} by {{$album->user->name}} </p>
                  <!-- Button -->
                  <a href="/album/{{$album->id}}" class="btn btn-primary">Check Album</a>
              
        
                  @if(!Auth::guest())
                  @foreach ($bookmarks as $bookmark)

                  {!!Form::open(['action' => ['BookmarkController@index'], 'method' => 'POST'])!!}
                  {{Form::hidden('id', $album->id)}}
                  {{Form::hidden('user_id', auth()->user()->id)}}
                  @if ($bookmark->album_id == $album->id)
                  {{ Form::button('Bookmarked', ['class' => 'btn btn-outline-primary btn-md my-2 my-sm-0 ml-3', 'disabled' => 'disabled']) }}
                  @else
                  {{Form::submit('Bookmark', ['class' => 'btn btn-outline-dark btn-md my-2 my-sm-0 ml-3'], array('disabled'))}}
                  @endif
                  {!!Form::close()!!}


                  @endforeach
                  
                      
                  @endif
                  
          
                 
                </div>
              
              </div>
        @else

        <div class="card">

                <!-- Card image -->
                <!-- Card content -->
                <div class="card-body">
              
                  <!-- Title -->
                <h4 class="card-title">{{$album->title}}</h4>
                  <!-- Text -->
                  <p class="card-text">Album niet actief</p>

              
                </div>
              
              </div>

              
              <div class="list-group float-right border">
                  <a href="#!" class="list-group-item list-group-item-action">
                      Genres
                    </a>
                    @foreach ($genre as $category)
                  <a href="{{ route('filter', $category->id)}}" class="list-group-item list-group-item-action">{{$category->name}}</a>
                @endforeach
                </div>
                
       

        @endif

        @endforeach
    @else
        <p>Geen Albums</p>
    @endif
@endsection

