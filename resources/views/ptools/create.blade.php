@extends('layouts.app')
@section('title') {{ $buy ?? $market->buy_request ? 'طلب شراء' : 'عرض بيع' }} @stop

@section('content')
<section class="form-registration">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-3">
                    <div class="product-img">
                        <img src="images/potatoes.png">
                        <h3 class="text-center"> - {{ $buy ? 'طلب شراء' : 'عرض بيع' }} -</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-2">
                <div class="form-wrapper">
                    {!!
                        Form::open([
                            'method' => 'POST', 'files' => true,
                            'route' => isset($market) ? ['markets.update', $market] : 'markets.store',
                        ])
                    !!}
                        <fieldset>
                            <!-- Name input-->
                            <div class="form-group">
                                {!! Form::label('type', 'نوع المنتج', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::select(
                                            'type',
                                            $types->prepend('من فضلك اختار', 0),
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
                                {!! Form::label('amount', 'الكميه المطلوبيه', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('amount', old('amount'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">تاريخ التوريد</label>
                                <div class="col-md-8">
                                    <input id="name" name="name" type="text" placeholder="١٤-٨-٢٠١٧" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">السعر المقترح</label>
                                <div class="col-md-8">
                                    <input id="name" name="name" type="text" placeholder="سعر السوق" class="form-control">
                                </div>
                            </div>
                            <div class="button-custmoeize">
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary btn-lg">اضافه</button>
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
