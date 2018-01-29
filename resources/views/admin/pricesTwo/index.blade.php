@extends('admin.layouts.app')

@section('content')

	<section class="farms prices">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="section-title">الأسعار ٢</h2>
				</div>
				<div class="col-md-12">
					<div class="form-group">
                        <label for="hsCode">السوق</label>
                        <select name="hsCode" id="hsCode" class="form-control">
                            <option value="1">اول</option>
                            <option value="2">تانى</option>
                            <option value="3">ثالث</option>
                        </select>
                    </div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label for="name">الكود</label>
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('fromDate', 'تاريخ السعر') !!}
                        {!! Form::date('fromDate', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                </div>
				<div class="col-md-12">
	                <table class="table table-striped">
	                    <thead>
	                        <tr>
	                            <th>حجم العبوة</th>
	                            <th>العبوة</th>
	                            <th>متوسط السعر</th>
	                            <th>السعر إلى</th>
	                            <th>السعر إلى</th>
	                            <th>الأصناف</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                            <tr>
	                               <td>10</td>
	                               <td>برتقال صيفى</td>
	                               <td>10</td>
	                               <td>10/12/2016</td>
	                               <td>10/12/2016</td>
	                               <td>10/12/2016</td>
	                            </tr>
	                            {{-- <tr>
	                                <td colspan="11">لا توجد نتائج لعرضها</td>
	                            </tr> --}}
	                    </tbody>
	                </table>
	            </div>
	            <div class="col-md-6">
                    <a href="#" class="btn btn-success btn-block">حفظ</a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="btn btn-danger btn-block">حذف</a>
                </div>
                <div class="col-md-12">
	                <table class="table table-striped">
	                    <thead>
	                        <tr>
	                            <th>كود</th>
	                            <th>السوق</th>
	                            <th>المستخدم</th>
	                            <th>تاريخ الادخال</th>
	                            <th>#</th>
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
	                               		<a href="#" class="btn btn-sm btn-primary edit">تعديل</a>
	                               </td>
	                               <td>
	                               		<a href="#" class="btn btn-sm btn-danger edit">حذف</a>
	                               </td>
	                            </tr>
	                            {{-- <tr>
	                                <td colspan="11">لا توجد نتائج لعرضها</td>
	                            </tr> --}}
	                    </tbody>
	                </table>
	            </div>
			</div>
		</div>
	</section>

@stop
