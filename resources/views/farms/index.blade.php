@extends('layouts.app')

@section('content')

<section class="farms">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 class="section-title">قــائمة مــزارع الاســماك</h2>
			</div>
			<div class="col-md-6">
				<a href="{{ route('farms.create') }}" class="btn btn-success pull-left" style="margin-top: 30px;">اضافة جديد</a>
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
				@foreach($farmers as $farmer)
					<tr>
						<td>{{ $farmer->FishFarmer_ID }}</td>
						<td>{{ $farmer->FishFarmerName }}</td>
						<td>{{ $farmer->Mob }}</td>
						<td>{{ $farmer->entryUser ? $farmer->entryUser->FullName : '-' }}</td>
						<td>{{ $farmer->created_at }}</td>
						<td>{{ $farmer->updateUser ? $farmer->updateUser->FullName : '-' }}</td>
						<td>{{ $farmer->updated_at }}</td>
						<td>
							<a href="{{ route('farms.update', $farmer) }}" class="btn btn-sm btn-primary">تعديل</a>
						</td>
						<td>
							<a href="{{ route('farms.destroy', $farmer) }}" class="btn btn-sm btn-danger">حذف</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{{ $farmers->links() }}
		</div>
	</div>
</section>

@stop
