@extends('admin.layouts.app')

@section('content')

<section class="form farms">
    <div class="container">
        <h2 class="section-title">
            سوق مستلزمات الانتاج : {{ $buy ?? $ptool->buy_request ?? false ? 'طلب شراء' : 'عرض بيع' }}
        </h2>
        @include('layouts.alert')

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                {!!
                    Form::open([
                        'method' => isset($ptool) ? 'PUT' : 'POST', 'files' => true,
                        'route' => isset($ptool) ? ['admin.ptools.update', $ptool] : 'admin.ptools.store',
                    ])
                !!}
                    {!! Form::hidden(
                        'buy_request', $buy ?? $ptool->buy_request ?? null, ['class' => 'form-control']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <h4><b>بيانات المنتج</b></h4>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('type', 'المنتج') !!}
                                {!! Form::select(
                                        'type',
                                        $types->prepend('من فضلك اختار', 0),
                                        $ptool->type ?? null,
                                        ['class' => 'form-control']
                                    ) !!}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                {!! Form::label('name', 'الاسم') !!}
                                {!! Form::text('name', $ptool->name ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('amount', 'الكمية') !!}
                                {!! Form::text('amount', $ptool->amount ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('description', 'الوصف') !!}
                                {!! Form::textarea(
                                    'description', $ptool->description ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('photo', 'صورة المنتج') !!}
                                {!! Form::file('photo', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ url('/js/fish.js') }}"></script>
@stop
