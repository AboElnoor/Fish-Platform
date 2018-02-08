@extends('admin.layouts.app')

@section('content')
<section class="form">
    <div class="title text-center"><h2>المحتوي</h2></div>
    <div class="container">
        @include('layouts.alert')
        <div class="col-md-12">
            {!! Form::open(['route' => 'admin.contents.store', 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('type', 'المحصول') !!}
                    {!! Form::select(
                        'type', $types->prepend('من فضلك اختار', 0), old('type'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'العنوان:') !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('subject', 'الموضوع:') !!}
                    {!! Form::textarea('subject', old('subject'), ['class' => 'form-control', 'id' => 'wysiwyg']) !!}
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <div class="fileUpload btn btn-primary">
                            {!! Form::label('photo', 'إضافة صورة') !!}
                            {!! Form::file('photo', ['class' => 'upload', 'onchange' => 'readURL(this)']) !!}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <img id="blah" src="images/1.png" alt="الصورة" />
                    </div>
                </div>
                <div class="col-md-12">
                    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@stop

