@extends('admin.layouts.app')
@section('title') سوق مستلزمات الانتاج @stop

@section('content')
<section class="farms">
    <div class="container">
        <div class="row">
            {!! Form::open(['method' => 'GET', 'route' => 'admin.ptools.search']) !!}
                <div class="col-md-6">
                    <h2 class="section-title">سوق مستلزمات الانتاج</h2>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('type', 'نوع المنتج') !!}
                        {!! Form::select(
                                'type',
                                $types->prepend('من فضلك اختار', 0),
                                $price->type ?? null,
                                ['class' => 'form-control filter']
                            ) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('buy_request', 'نوع العرض') !!}
                        <label>{!! Form::radio('buy_request', 1, false) !!}طلب شراء</label>
                        <label>{!! Form::radio('buy_request', 0, false) !!}عرض بيع</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            {!! Form::submit('بحث', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.ptools.create') }}?buy_request=1" class="btn btn-success btn-block">ادخال طلبات شراء</a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.ptools.create') }}" class="btn btn-success btn-block">ادخال عروض بيع</a>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>كود العرض</th>
                            <th>نوع المنتج</th>
                            <th>الكمية</th>
                            <th>نوع العرض</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $markets = $markets->paginate(10);
                        @endphp
                        @forelse($markets as $market)
                            <tr>
                               <td>{{ $market->id }}</td>
                               <td>{{ $market->category->name }}</td>
                               <td>{{ $market->amount }}</td>
                               <td>{{ $market->buy_request ? 'طلب شراء' : 'عرض بيع' }}</td>
                               <td>
                                    <a href="{{ route('admin.ptools.show', $market) }}"
                                        class="btn btn-sm btn-primary btn-block">تفاصيل</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">لا توجد نتائج لعرضها</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $markets->links() }}
            </div>
        </div>
        @include('layouts.alert')
    </div>
</section>

@stop
