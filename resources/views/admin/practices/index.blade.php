@extends('admin.layouts.app')

@section('content')

<section class="farms">
    <div class="container">
        <div class="row">
            {!! Form::open(['method' => 'GET', 'route' => 'admin.prices.search']) !!}
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
                        {!! Form::label('Market_ID', 'المدينة/الســــوق') !!}
                        {!! Form::select(
                                'Market_ID',
                                [
                                    0 => 'من فضلك اختار',
                                    1 => 'سوق العبور/القاهرة',
                                    2 => 'سوق الجملة/6 اكتوبر',
                                    3 => 'سوق الحضرة/الاسكندرية',
                                    4 => 'سوق الجملة/اسيوط',
                                    5 => 'سوق الجملة/المنيا',
                                ],
                                $price->Market_ID ?? null,
                                ['class' => 'form-control']
                            ) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('fromDate', 'من تاريخ') !!}
                        {!! Form::date('fromDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('toDate', 'الى تاريخ') !!}
                        {!! Form::date('toDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            {!! Form::submit('بحث', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.prices.create') }}" class="btn btn-success btn-block">اضافة جديد</a>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>كود</th>
                            <th>منتج</th>
                            <th>سوق</th>
                            <th>تاريخ السعر</th>
                            <th>سعر السوق</th>
                            <th>من</th>
                            <th>الى</th>
                            <th>المستخدم</th>
                            <th>الادخال</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prices as $price)
                            <tr>
                               <td>{{ $price->PriceDB_ID }}</td>
                               <td>{{ $price->hSCode->HS_Aname }}</td>
                               <td>العبور</td>
                               <td>{{ $price->PriceDate }}</td>
                               <td>{{ $price->PriceAverage }}</td>
                               <td>{{ $price->PriceMin }}</td>
                               <td>{{ $price->PriceMax }}</td>
                               <td>{{ $price->updateUser->FullName }}</td>
                               <td>{{ $price->updated_at }}</td>
                               <td>
                                    <a href="{{ route('admin.prices.edit', $price) }}"
                                        class="btn btn-sm btn-primary edit">تعديل</a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.prices.destroy', $price]]) !!}
                                        {!! Form::submit('حذف', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">لا توجد نتائج لعرضها</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $prices->links() }}
                </div>
            </div>
        </div>
        @include('admin.layouts.alert')
    </div>
</section>

@stop
