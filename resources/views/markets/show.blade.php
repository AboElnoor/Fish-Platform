@extends('layouts.app')

@section('content')
	<section class="farms details">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2 class="section-title">اسم المزرعة</h2>
				</div>
				<div class="col-md-12">
					<h4 class="section-title">عرض {{ $market->buy_request ? 'شراء' : 'بيع' }}</h4>
				</div>
				<div class="col-md-12">
                    <div class="form-group">
                        <img src="{{ $market->photo }}" alt="">
                    </div>
                </div>
				<div class="col-md-12">
                    <div class="form-group">
                        <h4>كود العرض: <i>{{ $market->id }}</i></h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <h4>تاريخ بداية العرض: <i>{{ $market->startDate }}</i></h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <h4>تاريخ نهاية العرض: <i>{{ $market->endDate }}</i></h4>
                    </div>
                </div>
                <div class="col-md-12">
					<h4 class="section-title">بيانات المزرعة</h4>
				</div>
				<div class="col-md-12">
                    <div class="form-group">
                        <h4>نوع المزرعة: <i>{{ $market->type }}</i></h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <h4>الكمية المتوفرة: <i>{{ $market->amount }}</i></h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <h4>مكان انتاج المزرعة:
                            <i>{{ $market->governorate->Governorate_Name_A ?? '-' }}</i></h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <h4>تفاصيل أخرى: <i></i></h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <h4>النوع / الصنف: <i>{{ $market->hSCode->HS_Aname ?? '-' }}</i></h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <h4>المواصفات: <i>{{ $market->specs }}</i></h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <a href="{{ route('markets.edit', $market) }}" class="btn btn-primary btn-block">تعديل</a>
                    </div>
                </div>
			</div>
		</div>
	</section>
@stop
