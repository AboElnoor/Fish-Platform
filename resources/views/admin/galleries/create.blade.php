@extends('admin.layouts.app')
@section('title') عارض الصور @stop

@section('content')
<section class="form">
    <div class="container">
        @include('layouts.alert')
        {!! Form::open([
                'method' => isset($gallery) ? 'PUT' : 'POST',
                'route' => isset($gallery) ? ['admin.galleries.update', $gallery] : 'admin.galleries.store',
            ]) !!}
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('FishCompanyType_ID', 'القسم') !!}
                    {!! Form::select(
                            'FishCompanyType_ID',
                            $categories->prepend('مزارع الاسماك', 0), $gallery->FishCompanyType_ID ?? null,
                            ['class' => 'form-control']
                        ) !!}
                </div>
                <div class="form-group col-md-3">
                    <div class="fileUpload btn btn-primary">
                        {!! Form::label('photo', 'إضافة صورة') !!}
                        {!! Form::file('photo', ['id' => 'photo', 'class' => 'upload']) !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    {!! Form::label('title', 'العنوان:') !!}
                    {!! Form::text('title', $gallery->title ?? null, ['id' => 'title', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('subject', 'النص:') !!}
                    {!! Form::textarea(
                        'subject', $gallery->subject ?? null, ['id' => 'subject', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-12">
                    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
 </section>
<script type="text/javascript" src="{{ url('/js/fish.js') }}"></script>
@stop
