@extends('layout.app')
@section('content')
    {!! Form::open(['action' => ['CrudController@update', $albums->id], 'method' => 'POST']) !!}
         <div class="card mt-5">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Edit Album</strong>
            </h5>
                <div class="card-body px-lg-5 pt-0">
                    <div class="md-form">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', $albums->title,['class' => 'form-control'])}}
                    </div>

                    <div class="md-form">
                    <p>Date</p>
                    {{Form::date('date', '',['class' => 'form-control'])}}
                    </div>

                    <div class="md-form">
                    <p>Genre</p>
                     {{Form::select('genre', ['2' => 'R&B', '3' => 'Rock', '4' => 'Pop','5' => 'Jazz', '6' => 'Dance'], ['class' => 'mdb-select md-form colorful-select dropdown-primary'])}}
                    </div>
                
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
         </div>
    {!! Form::close() !!}

@endsection