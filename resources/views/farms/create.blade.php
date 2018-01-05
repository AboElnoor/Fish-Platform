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

@include('farms.forms.farmers')

المزارع
@include('farms.forms.farms')

بيانات الانتاج
@include('farms.forms.production')

بيانات مستلزمات الانتاج
@include('farms.forms.facilities')

العملاء
@include('farms.forms.customers')

@stop
