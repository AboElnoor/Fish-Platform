@extends('layouts.app')

@section('content')

<section class="farms">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="section-title">الأسعار</h2>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="HSCode_ID">منتج/ كود HS</label>
                    <select id="HSCode_ID" name="HSCode_ID" class="form-control">
                        <option value="0">من فضلك اختار</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="HSCode_ID">المدينة/الســوق</label>
                    <select id="HSCode_ID" name="HSCode_ID" class="form-control">
                        <option value="0">القاهره</option>
                        <option value="0">اسكندرية</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">من تاريخ</label>
                    {{ Form::date('PriceDate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">الى تاريخ</label>
                    {{ Form::date('PriceDate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        {!! Form::submit('بحث', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::submit('اضافة جديد', ['class' => 'btn btn-success btn-block']) !!}
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>كود</th>
                            <th>منتج</th>
                            <th>سوق</th>
                            <th>تاريخ السفر</th>
                            <th>سعر السوق</th>
                            <th>من</th>
                            <th>الى</th>
                            <th>العبوة</th>
                            <th>الصلاحية</th>
                            <th>المستخدم</th>
                            <th>الادخال</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                               <td>9127</td> 
                               <td>أ</td> 
                               <td>العبور</td> 
                               <td>١٨-١١-٢٠١٨</td> 
                               <td>١٨ جنية</td> 
                               <td>١</td> 
                               <td>٣</td> 
                               <td>٩</td> 
                               <td>١٨ شهر</td> 
                               <td>عادل</td> 
                               <td>اليوم</td> 
                               <td>
                                    <a href="#" class="btn btn-sm btn-primary edit">تعديل</a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger">حذف</a>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @include('layouts.alert')
        {{-- <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="HSCode_ID">منتج/ كود HS</label>
                            <select id="HSCode_ID" name="HSCode_ID" class="form-control">
                                <option value="0">من فضلك اختار</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="HSCode_ID">المدينة/الســوق</label>
                            <select id="HSCode_ID" name="HSCode_ID" class="form-control">
                                <option value="0">القاهره</option>
                                <option value="0">اسكندرية</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">من تاريخ</label>
                            {{ Form::date('PriceDate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">الى تاريخ</label>
                            {{ Form::date('PriceDate', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                {!! Form::submit('بحث', ['class' => 'btn btn-primary btn-block']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::submit('اضافة جديد', ['class' => 'btn btn-success btn-block']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
                
        <div class="text-center">
            {{-- {{ $farmers->links() }} --}}
        </div>
    </div>
</section>

@stop
