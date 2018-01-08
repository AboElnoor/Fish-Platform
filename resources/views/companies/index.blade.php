@extends('layouts.app')

@section('content')

<section class="companies">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 class="section-title">قائمة مستلزمات الانتاج</h2>
			</div>
			<div class="col-md-6">
				<a href="{{ route('companies.create') }}" class="btn btn-success pull-left" style="margin-top: 30px;">اضافة جديد</a>
			</div>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>كود</th>
					<th>اســم الجهة</th>
					<th>العــلامة التجارية</th>
					<th>مدخل البيانات</th>
					<th>تاريخ الادخال</th>
					<th>معدل البيانات</th>
					<th>تاريخ التعديل</th>
					<th>#</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($companies as $company)
					<tr>
						<td>{{ $company->FishCompany_ID }}</td>
						<td>{{ $company->FishCompanyName }}</td>
						<td>{{ $company->TradeMark }}</td>
						<td>{{ $company->entryUser ? $company->entryUser->FullName : '-' }}</td>
						<td>{{ $company->created_at }}</td>
						<td>{{ $company->updateUser ? $company->updateUser->FullName : '-' }}</td>
						<td>{{ $company->updated_at }}</td>
						<td>
							<a href="{{ route('companies.update', $company) }}" class="btn btn-sm btn-primary">تعديل</a>
						</td>
						<td>
							<a href="{{ route('companies.destroy', $company) }}" class="btn btn-sm btn-danger">حذف</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{{ $companies->links() }}
		</div>
	</div>
</section>

@stop
