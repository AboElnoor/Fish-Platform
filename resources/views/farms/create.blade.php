@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="form-group">
        {!! Form::label('code', 'كود صاحب المزرعة') !!}
        {!! Form::text('code', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'اسم صاحب المزرعة') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'البريد الالكتروني') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
    </div>


    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}

 </div>
@stop
