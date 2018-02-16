@extends('layouts.app')
@section('title') سجل مزرعتك @stop

@section('content')
<section class="form-registration">
    <div class="container">
        <div class="title centre">
            <h2>  - سجل مزرعتك -  </h2>
        </div>
        @include('layouts.alert')
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="form-wrapper">
                    {!! Form::open(['route' => 'farmers.store', 'class' => 'form-horizontal']) !!}
                        <fieldset>
                            <div class="form-group">
                                {!! Form::label(
                                    'FishFarmerName', 'اسم صاحب المزرعة', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text(
                                        'FishFarmerName', old('FishFarmerName'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Email', 'البريد الالكتروني', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::email('Email', old('Email'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('NationalNo', 'الرقم القومي', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('NationalNo', old('NationalNo'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Mob', ' الموبايل', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('Mob', old('Mob'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Phone', 'الهاتف', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('Phone', old('Phone'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label(
                                    'Memer', 'عضو في - جمعيات أهليه', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('Memer', old('Memer'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="button-custmoeize">
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        {!! Form::submit('تسجيل', ['class' => 'btn btn-primary btn-lg']) !!}
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    {!! Form::close() !!}
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
