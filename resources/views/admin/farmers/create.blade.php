@extends('admin.layouts.app')

@section('content')

<section class="form">
	<div class="container">
		<h2 class="section-title">مزرعــــة جديــدة</h2>
		@include('layouts.alert')

		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#menu0">المزارعين</a></li>
			<li><a data-toggle="tab" href="#menu1">المزارع</a></li>
			<li><a data-toggle="tab" href="#menu2">بيانات الانتاج</a></li>
			<li><a data-toggle="tab" href="#menu3">بيانات مستلزمات الانتاج</a></li>
			<li><a data-toggle="tab" href="#menu4">العملاء</a></li>
		</ul>

		<div class="tab-content">
			<div id="menu0" class="tab-pane fade in active">
				<h3 class="tab-title">المزارعين</h3>
				@include('admin.farmers.forms.farmers')
			</div>
			<div id="menu1" class="tab-pane fade">
				<h3 class="tab-title">المزارع</h3>
				@include('admin.farmers.forms.farms')
			</div>
			<div id="menu2" class="tab-pane fade">
				<h3 class="tab-title">بيانات الانتاج</h3>
				@include('admin.farmers.forms.hscodes')
			</div>
			<div id="menu3" class="tab-pane fade">
				<h3 class="tab-title">بيانات مستلزمات الانتاج</h3>
				@include('admin.farmers.forms.sources')
			</div>
			<div id="menu4" class="tab-pane fade">
				<h3 class="tab-title">العملاء</h3>
				@include('admin.farmers.forms.clients')
			</div>
		</div>

	</div>
</section>
<script type="text/javascript" src="{{ url('/js/fish.js') }}"></script>
@stop
