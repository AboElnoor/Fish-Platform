@extends('layouts.app')

@section('content')

<section class="form farms">
    <div class="container">
        <h2 class="section-title">سوق بشاير : عرض شراء</h2>
        @include('layouts.alert')

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3 class="tab-title">الأسعار</h3>
                <div class="row">
                    <div class="col-md-12">
                        <h4><b>بيانات المحصول</b></h4>
                    </div>
                    {!!
                        Form::open([
                            'method' => isset($price) ? 'PUT' : 'POST',
                            'route' => isset($price) ? ['prices.update', $price] : 'prices.store',
                        ])
                    !!}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="hsCode">الجهة / الاسم</label>
                                <select name="hsCode" id="hsCode" class="form-control">
                                    <option value="1">اول</option>
                                    <option value="2">تانى</option>
                                    <option value="3">ثالث</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="name">اسم العارض</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="name">انجليزى</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="name">موبايل العارض</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="name">الايميل</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="name">الفاكس</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('PriceDate', 'بداية العرض') !!}
                                {!! Form::date('PriceDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('PriceMin', 'نهاية العرض') !!}
                                {!! Form::date('PriceDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4><b>بيانات التوريد</b></h4>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="hsCode">المحصول</label>
                            <select name="hsCode" id="hsCode" class="form-control">
                                <option value="1">اول</option>
                                <option value="2">تانى</option>
                                <option value="3">ثالث</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="name">النوع</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="name">انجليزى</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="name">الكمية المطلوبة</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="name">انجليزى</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="name">التعبئة المطلوبة</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="name">انجليزى</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="name">المواصفات المطلوبة</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="name">انجليزى</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="name">المواصفات المطلوبة</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="name">انجليزى</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="name">الشهادات المطلوبة</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="name">انجليزى</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <label for="file">صورة المنتج</label>
                        <input name="file" type="file">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4><b>بيانات التوريد</b></h4>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">مكان تسليم المحصول</label>
                            <label><input type="radio" name="optradio">باب المزرعة</label>
                            <label><input type="radio" name="optradio">مقر المشترى</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="hsCode">المحافظة</label>
                            <select name="hsCode" id="hsCode" class="form-control">
                                <option value="1">اول</option>
                                <option value="2">تانى</option>
                                <option value="3">ثالث</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="hsCode">المنطقة - المركز</label>
                            <select name="hsCode" id="hsCode" class="form-control">
                                <option value="1">اول</option>
                                <option value="2">تانى</option>
                                <option value="3">ثالث</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="hsCode">القرية - الحى</label>
                            <select name="hsCode" id="hsCode" class="form-control">
                                <option value="1">اول</option>
                                <option value="2">تانى</option>
                                <option value="3">ثالث</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">نوع النقل</label>
                            <label><input type="radio" name="optradio">عادى</label>
                            <label><input type="radio" name="optradio">مبرد</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">معدل التوريد</label>
                            <label><input type="radio" name="optradio">يومى</label>
                            <label><input type="radio" name="optradio">اسبوعى</label>
                            <label><input type="radio" name="optradio">شهرى</label>
                            <label><input type="radio" name="optradio">أخرى</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="name">السعر المقترح</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="name">انجليزى</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="name">طريقة الدفغ</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="name">انجليزى</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="name">تفاصيل أخرى</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="name">انجليزى</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="file">صورة المنتج</label>
                            <input name="file" type="file">
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
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ url('/js/fish.js') }}"></script>
@stop
