@extends('admin.layouts.app')

@section('content')

<section class="farms">
    <div class="container">
        <div class="row">
            {!! Form::open(['method' => 'GET', 'route' => 'admin.markets.search']) !!}
                <div class="col-md-6">
                    <h2 class="section-title">الأسعار</h2>
                </div>
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
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('buy_request', 'نوع العرض') !!}
                        <label>{!! Form::radio('buy_request', 0, false) !!}عرض شراء</label>
                        <label>{!! Form::radio('buy_request', 1, false) !!}عرض بيع</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('startDate', 'من تاريخ') !!}
                        {!! Form::date('startDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('endDate', 'الى تاريخ') !!}
                        {!! Form::date('endDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            {!! Form::submit('بحث', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.markets.create') }}" class="btn btn-success btn-block">ادخال عروض شراء</a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.markets.create') }}?buy_request=1" class="btn btn-success btn-block">ادخال عروض بيع</a>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>كود العرض</th>
                            <th>منتج / كود HS</th>
                            <th>الكمية</th>
                            <th>تاريخ التسليم</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($markets as $market)
                            <tr>
                               <td>{{ $market->id }}</td>
                               <td>{{ $market->hSCode->HS_Aname ?? '' }}</td>
                               <td>{{ $market->amount }}</td>
                               <td>{{ $market->startDate }}</td>
                               <td>
                                    <a href="{{ route('admin.markets.show', $market) }}"
                                        class="btn btn-sm btn-primary btn-block edit">تفاصيل</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">لا توجد نتائج لعرضها</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @include('layouts.alert')
    </div>
</section>

@stop
