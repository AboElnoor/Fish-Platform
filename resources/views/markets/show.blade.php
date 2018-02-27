@extends('layouts.app')
@section('title') {{ $market->buy_request ? 'طلب شراء' : 'عرض بيع' }} @stop

@section('content')
<section class="farms details">
    <div class="container">
    <div class="row">
        @include('layouts.alert')
        <div class="col-md-4 col-xs-12">
            <div class="title">
                <h2>{{ $market->buy_request ? 'طلب شراء' : 'عرض بيع' }}</h2>
            </div>
            <div class="offerimg">
                <img class="product-img img-responsive" src="{{ asset('storage/' . $market->photo) }}">
            </div>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>
                            <h4>تاريخ بداية العرض: </h4>
                        </td>
                        <td>
                            <h4><i>{{ $market->user->startDate ?? '-' }}</i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>تاريخ نهاية العرض: </h4>
                        </td>
                        <td>
                            <h4><i>{{ $market->user->endDate ?? '-' }}</i></h4>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="col-md-12">
                <a href="{{ route('markets.request', $market) }}" class="col-md-4 btn btn-primary pull-left">اتصل بصاحب العرض</a>
            </div>
            <div class="title">
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
                            <h4><i>{{ $market->pType->name ?? '-' }}</i></h4>
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
                            <h4>اسم المنتج:</h4>
                        </td>
                        <td>
                            <h4><i>{{ $market->type }}</i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>الكمية:</h4>
                        </td>
                        <td>
                            <h4><i>{{ $market->amount }}</i></h4>
                        </td>
                    </tr>
                    @if(requestUri() == 'markets')
                    <tr>
                        <td>
                            <h4>مكان انتاج المنتج:</h4>
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
                            <h4><i>{{ $market->more }}</i></h4>
                        </td>
                    </tr>
                    @endif
                </tbody>
                <tr>
                    <td>
                        <h4>المواصفات: </h4>
                    </td>
                    <td>
                        <h4><i>{{ $market->specs ?? '-' }}</i></h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>
@stop
