@extends('layouts.app')

@section('content')

<section class="farms">
    <div class="container">
        <div class="row">
            {!! Form::open(['method' => 'GET', 'route' => 'prices.search']) !!}
                <div class="col-md-6">
                    <h2 class="section-title">الأسعار</h2>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="hsCode">منتج/ كود HS</label>
                        <select name="hsCode" id="hsCode" class="form-control">
                            <option value="1">اول</option>
                            <option value="2">تانى</option>
                            <option value="3">ثالث</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">نوع العرض</label>
                        <label><input type="radio" name="optradio">عرض شراء</label>
                        <label><input type="radio" name="optradio">عرض بيع</label>
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
                        <div class="col-md-4">
                            {!! Form::submit('بحث', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-success btn-block">ادخال عروض شراء</a>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-success btn-block">ادخال عروض بيع</a>
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
                            <tr>
                               <td>10</td>
                               <td>برتقال صيفى</td>
                               <td>10</td>
                               <td>10/12/2016</td>
                               <td>
                                    <a href="#" class="btn btn-sm btn-primary btn-block edit">تفاصيل</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="11">لا توجد نتائج لعرضها</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @include('layouts.alert')
    </div>
</section>

@stop
