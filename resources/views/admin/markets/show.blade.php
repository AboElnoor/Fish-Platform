@extends('admin.layouts.app')
@section('title') {{ $market->buy_request ? 'طلب شراء' : 'عرض بيع' }} @stop

@section('content')
<section class="farms details">
    <div class="container">
        <div class="row">
            <div class="title ">
                <h2>{{ $market->buy_request ? 'طلب شراء' : 'عرض بيع' }}</h2>
            </div>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>{{ $market->buy_request ? 'طلب شراء' : 'عرض بيع' }}</td>
                        <td>
                            <h4><i><img src="{{ asset('storage/' . $market->photo) }}" alt=""></i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>كود العرض: </h4>
                        </td>
                        <td>
                            <h4><i>{{ $market->id }}</i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>تاريخ بداية العرض: </h4>
                        </td>
                        <td>
                            <h4> <i>{{ $market->user->startDate ?? '-' }}</i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>تاريخ نهاية العرض: </h4>
                        </td>
                        <td>
                            <h4><i>{{ $market->user->endDate }}</i></h4>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="title ">
                <h2>بيانات المنتج</h2>
            </div>
            <table class="table table-striped">
                <tbody>
                    @if(requestUri() == 'ptools')
                        <tr>
                            <td>
                                <h4>نوع المنتج: </h4>
                            </td>
                            <td>
                                <h4><i>{{ $market->pType->HS_Aname ?? '-' }}</i></h4>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td>
                            <h4>نوع الاسماك: </h4>
                        </td>
                        <td>
                            <h4><i>{{ $market->hSCode->HS_Aname ?? '-' }}</i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>نوع المنتج (نوع الاسماك):</h4>
                        </td>
                        <td>
                            <h4><i>{{ $market->type }}</i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>المواصفات: </h4>
                        </td>
                        <td>
                            <h4><i>{{ $market->specs ?? '-' }}</i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>الكمية المطلوبة:</h4>
                        </td>
                        <td>
                            <h4><i>{{ $market->amount }}</i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>مكان انتاج المزرعة:</h4>
                        </td>
                        <td>
                            <h4><i>{{ $market->transport->governorate->Governorate_Name_A ?? '-' }}</i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>تفاصيل أخرى: </h4>
                        </td>
                        <td>
                            <h4><i>-</i></h4>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <a href="{{ route('admin.' . requestUri() . '.edit', $market) }}"
                            class="btn btn-primary btn-block">تعديل</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
