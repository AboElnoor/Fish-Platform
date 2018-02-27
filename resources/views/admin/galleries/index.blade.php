@extends('admin.layouts.app')
@section('title') قــائمة مــزارع الاســماك @stop

@section('content')
<section class="farms">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 class="section-title">قــائمة مــزارع الاســماك</h2>
			</div>
			<div class="col-md-6">
				<a href="{{ route('admin.galleries.create') }}" class="btn btn-success pull-left" style="margin-top: 30px;">اضافة جديد</a>
			</div>
		</div>
		@include('layouts.alert')
		<table class="table table-striped">
			<thead>
				<tr>
					<th>كود</th>
					<th>العنوان</th>
					<th>النص</th>
					<th>القسم</th>
					<th>#</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				@forelse($galleries as $gallary)
					<tr>
						<td>{{ $gallary->id }}</td>
						<td>{{ $gallary->title }}</td>
						<td>{{ $gallary->subject }}</td>
						<td>{{
							$gallary->FishCompanyType_ID ? $gallary->category->FishCompanyType_Name : 'مزارع الاسماك' }}</td>
						<td>
							<a href="{{ route('admin.galleries.edit', $gallary) }}" class="btn btn-sm btn-primary">تعديل</a>
						</td>
						<td>
							{!! Form::open(['method' => 'DELETE', 'route' => ['admin.galleries.destroy', $gallary]]) !!}
					            {!! Form::submit('حذف', ['class' => 'btn btn-sm btn-danger']) !!}
							{!! Form::close() !!}
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
			{{ $galleries->links() }}
		</div>
	</div>
</section>
@stop
