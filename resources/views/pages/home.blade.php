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
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <!-- Button -->
                          <a href="/album/create" class="btn btn-primary">Create Album</a>
                        </div>
                      
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
