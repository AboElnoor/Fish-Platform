@extends('layouts.app')

@section('content')

<section class="companies">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 class="section-title">
					@if(requestUri() == 'factories')
						قائمة المصانع
					@elseif(requestUri() == 'sellers')
						قائمة التجار
					@else
						قائمة مستلزمات الانتاج
					@endif
				</h2>
			</div>
			<div class="col-md-6">
				<a href="{{ route(requestUri() . '.create') }}"
					class="btn btn-success pull-left" style="margin-top: 30px;">اضافة جديد</a>
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
				@forelse($companies as $company)
					<tr>
						<td>{{ $company->FishCompany_ID }}</td>
						<td>{{ $company->FishCompanyName }}</td>
						<td>{{ $company->TradeMark }}</td>
						<td>{{ $company->entryUser ? $company->entryUser->FullName : '-' }}</td>
						<td>{{ $company->created_at }}</td>
						<td>{{ $company->updateUser ? $company->updateUser->FullName : '-' }}</td>
						<td>{{ $company->updated_at }}</td>
						<td>
							<a href="{{ route(requestUri() . '.edit', $company) }}"
								class="btn btn-sm btn-primary">تعديل</a>
						</td>
						<td>
							<a href="{{ route(requestUri() . '.destroy', $company) }}"
								class="btn btn-sm btn-danger">حذف</a>
						</td>
					</tr>
				@empty
					<tr>
                        <td colspan="9">لا توجد نتائج لعرضها</td>
                    </tr>
				@endforelse
			</tbody>
		</table>
		<div class="text-center">
			{{ $companies->links() }}
		</div>
	</div>
</section>

@stop
