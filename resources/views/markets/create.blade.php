@extends('layouts.app')
@section('title') {{ $buy ? 'طلب شراء' : 'عرض بيع' }} @stop

@section('content')
<section class="form-registration">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-3">
                    <div class="product-img">
                        <img src="/images/potatoes.png">
                        <h3 class="text-center"> - {{ $buy ? 'طلب شراء' : 'عرض بيع' }} -</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-2">
                @include('layouts.alert')
                <div class="form-wrapper">
                    {!!
                        Form::open([
                            'method' => 'POST', 'files' => true,
                            'route' => isset($market) ? [requestUri() . '.update', $market] : requestUri() . '.store',
                        ])
                    !!}
                        <fieldset>
                            {!! Form::hidden('buy_request', $buy, ['class' => 'form-control']) !!}
                            <!-- Name input-->
                            <div class="form-group">
                                {!! Form::label('HSCode_ID', 'نوع السمك', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::select(
                                            'HSCode_ID',
                                            $hSCodes->prepend('من فضلك اختار', 0),
                                            null,
                                            ['class' => 'form-control']
                                        ) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', 'اسم المنتج', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label(
                                    'startDate',
                                    'تاريخ ' . ($buy ? 'الطلب' : 'العرض'),
                                    ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::date('startDate', old('startDate'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label(
                                    'endDate',
                                    ($buy ? 'الطلب' : 'العرض') . ' ساري حتي',
                                    ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::date('endDate', old('endDate'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('amount', 'الكميه المطلوبة', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('amount', old('amount'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            @if(requestUri() == 'markets')
                                <div class="form-group">
                                    {!! Form::label(
                                        'transportDate', 'تاريخ التوريد', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::date(
                                            'transportDate', old('transportDate'), ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('price', 'السعر المقترح', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('price', old('price'), ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    {!! Form::label(
                                        'ptoolType', 'نوع المنتج', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        {!! Form::select(
                                            'ptoolType',
                                            $types->prepend('من فضلك اختار', 0),
                                            $market->ptoolType ?? null,
                                            ['class' => 'form-control']
                                        ) !!}
                                    </div>
                                </div>
                            @endif
                            <div class="button-custmoeize">
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        {!! Form::submit('اضافة', ['class' => 'btn btn-primary btn-lg']) !!}
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ url('/js/fish.js') }}"></script>
@stop
