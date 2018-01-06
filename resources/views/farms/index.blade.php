@extends('layouts.app')

@section('content')

<section class="farms">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 class="section-title">قــائمة مــزارع الاســماك</h2>
			</div>
			<div class="col-md-6">
				<a href="farms/create" class="btn btn-success pull-left" style="margin-top: 30px;">اضافة جديد</a>
			</div>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>كود</th>
					<th>الاسم</th>
					<th>الموبايل</th>
					<th>مدخل البيانات</th>
					<th>تاريخ الادخال</th>
					<th>معدل البيانات</th>
					<th>تاريخ التعديل</th>
					<th>#</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1031</td>
					<td>وليد عباس</td>
					<td>01022365294</td>
					<td>نعمة العربى</td>
					<td>12/2/2017</td>
					<td>نعمة العربى</td>
					<td>12/2/2017</td>
					<td>
						<button class="btn btn-sm btn-primary">تعديل</button>
					</td>
					<td>
						<button class="btn btn-sm btn-danger">حذف</button>
					</td>
				</tr>
				<tr>
					<td>1031</td>
					<td>وليد عباس</td>
					<td>01022365294</td>
					<td>نعمة العربى</td>
					<td>12/2/2017</td>
					<td>نعمة العربى</td>
					<td>12/2/2017</td>
					<td>
						<button class="btn btn-sm btn-primary">تعديل</button>
					</td>
					<td>
						<button class="btn btn-sm btn-danger">حذف</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</section>

@stop