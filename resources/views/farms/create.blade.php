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
    {!! Form::open(['route' => 'farmers.store']) !!}

    <div class="form-group">
        {!! Form::label('FishFarmer_ID', 'كود صاحب المزرعة') !!}
        {!! Form::text('FishFarmer_ID', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('FishFarmerName', 'اسم صاحب المزرعة') !!}
        {!! Form::text('FishFarmerName', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Email', 'البريد الالكتروني') !!}
        {!! Form::email('Email', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('NationalNo', 'الرقم القومي') !!}
        {!! Form::text('NationalNo', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Mob', ' الموبايل') !!}
        {!! Form::text('Mob', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Phone', 'التليفون') !!}
        {!! Form::text('Phone', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Memer', 'عضو في - جمعيات أهليه') !!}
        {!! Form::textarea('Memer', null, ['class' => 'form-control']) !!}
    </div>


    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}

 </div>

 <div>
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="form-group">
        {!! Form::label('Governorate_ID', '(*)عنوان المزرعة - المحافظة') !!}
        {!! Form::text('Governorate_ID', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Locality_ID', '(*)مركز') !!}
        {!! Form::text('Locality_ID', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Village_ID', 'قرية') !!}
        {!! Form::email('Village_ID', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Address', 'تفاصيل العنوان') !!}
        {!! Form::text('Address', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('EstDate', 'تاريخ بداء النشاط') !!}
        {!! Form::text('EstDate', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('OwnerID', 'نوع الملكية') !!}
        {!! Form::text('OwnerID', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('OwnerID', 'نوع الملكية') !!}
        {!! Form::text('OwnerID', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('OwnerType', 'رقم الملكية') !!}
        {!! Form::text('OwnerType', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('FarmSize', 'مساحة المزرعة') !!}
        {!! Form::text('FarmSize', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('EmpA', 'عدد العاملين:عمالة دائمة') !!}
        {!! Form::text('EmpA', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('EmpB', 'عدد العاملين:عمالة مؤقته') !!}
        {!! Form::text('EmpB', null, ['class' => 'form-control']) !!}
    </div>


    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}

 </div>
@stop
