@extends('layout.app')
@section('content')
    {!! Form::open(['action' => 'CrudController@store', 'method' => 'POST']) !!}
         <div class="card mt-5">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Create Album</strong>
            </h5>
                <div class="card-body px-lg-5 pt-0">
                    <div class="md-form">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', '',['class' => 'form-control'])}}
                    </div>
                    <div class="md-form">
                            {{Form::label('date', 'Date')}}
                            {{Form::date('date', '',['class' => 'form-control'])}}
                </div>
                {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
         </div>
    {!! Form::close() !!}

@endsection