@extends('layouts.app')

@section('content')

<section class="form">
    <div class="container">
        <h2 class="section-title">الأسعار</h2>
        @include('layouts.alert')

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3 class="tab-title">الأسعار</h3>
                <div class="row">
                    {!!
                        Form::open([
                            'method' => isset($price) ? 'PUT' : 'POST',
                            'route' => isset($price) ? ['prices.update', $price] : 'prices.store',
                        ])
                    !!}
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('HSCode_ID', 'منتج/ كود HS') !!}
                                {!! Form::select(
                                        'HSCode_ID',
                                        $hSCodes->prepend('من فضلك اختار', 0),
                                        $price->HSCode_ID ?? null,
                                        ['class' => 'form-control']
                                    ) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('Market_ID', 'المدينة/الســــوق') !!}
                                {!! Form::select(
                                        'Market_ID',
                                        [
                                            1 => 'من فضلك اختار',
                                            2 => 'سوق العبور/القاهرة',
                                            3 => 'سوق الجملة/6 اكتوبر',
                                            4 => 'سوق الحضرة/الاسكندرية',
                                            5 => 'سوق الجملة/اسيوط',
                                            6 => 'سوق الجملة/المنيا',
                                        ],
                                        $price->Market_ID ?? null,
                                        ['class' => 'form-control']
                                    ) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('PriceDate', 'تاريخ السعر') !!}
                                {{ Form::date('PriceDate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('PriceMin', 'أدنى سعر') !!}
                                {!! Form::text('PriceMin', $price->PriceMin ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('PriceMax', 'اعلى سعر') !!}
                                {!! Form::text('PriceMax', $price->PriceMax ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('Unit_ID', ' العبـــــوات') !!}
                                @foreach($units as $id => $unit)
                                    <div class="col-md-4">
                                        {!!
                                            Form::checkbox(
                                                'Unit_ID[]',
                                                $id,
                                                false
                                            ) . $unit->Unit_Name_A
                                        !!}
                                        {!!
                                            Form::text(
                                                'Weights',
                                                null,
                                                ['class' => 'form-control']
                                            )
                                        !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                {!! Form::label('Weight', 'الوزن') !!}
                                {!! Form::text('Weight', $price->Weight ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                {!! Form::label('Desc_A', ' المـواصفات- عربى') !!}
                                {!! Form::textarea('Desc_A', $price->Desc_A ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                {!! Form::label('Desc_E', 'المـواصفات- انجليزى') !!}
                                {!! Form::textarea('Desc_E', $price->Desc_E ?? null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ url('/js/fish.js') }}"></script>
@stop
