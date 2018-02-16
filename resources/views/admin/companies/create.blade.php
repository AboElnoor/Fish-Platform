@extends('admin.layouts.app')
@section('title')
	@if(requestUri() == 'factories')
		المصانع
	@elseif(requestUri() == 'sellers')
		التجار
	@else
		مستلزمات الانتاج
	@endif
@stop

@section('content')
<section class="form">
	<div class="container">
		<h2 class="section-title">
			@if(requestUri() == 'factories')
				المصانع
			@elseif(requestUri() == 'sellers')
				التجار
			@else
				مستلزمات الانتاج
			@endif
		</h2>
		@include('layouts.alert')

		<ul class="nav nav-tabs">
			<li class="active">
				<a data-toggle="tab" href="#home">
					@if(requestUri() == 'factories')
						استمارةالمصنعين
					@elseif(requestUri() == 'sellers')
						استمارة التجار
					@else
						استمارة بيانات مصادرمستلزمات الانتاج
					@endif
				</a>
			</li>
			<li><a data-toggle="tab" href="#menu1">الافــرع</a></li>
			<li><a data-toggle="tab" href="#menu2">الاداره والموظفين</a></li>
			<li><a data-toggle="tab" href="#menu3">البنوك التى يتعامل معها</a></li>
			<li><a data-toggle="tab" href="#menu4">العضوية فى الغرف التجارية</a></li>
			<li><a data-toggle="tab" href="#menu5">الملكية</a></li>
			<li><a data-toggle="tab" href="#menu6">أصناف الأسماك</a></li>
			<li>
				<a data-toggle="tab" href="#menu7">
					@if(requestUri() == 'factories')
						بيانات مستلزمات التصنيع
					@elseif(requestUri() == 'sellers')
						بيانات مستلزمات التجهيز
					@else
						بيانات مستلزمات التشغيل
					@endif
				</a>
			</li>
		</ul>

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<h3 class="tab-title">
					@if(requestUri() == 'factories')
						استمارةالمصنعين
					@elseif(requestUri() == 'sellers')
						استمارة التجار
					@else
						استمارة بيانات مصادرمستلزمات الانتاج
					@endif
				</h3>
				@include('admin.companies.forms.companies')
			</div>
			<div id="menu1" class="tab-pane fade">
				<h3 class="tab-title">الافــرع</h3>
				@include('admin.companies.forms.branches')
			</div>
			<div id="menu2" class="tab-pane fade">
				<h3 class="tab-title">الاداره والموظفين</h3>
				@include('admin.companies.forms.manager')
			</div>
			<div id="menu3" class="tab-pane fade">
				<h3 class="tab-title">البنوك التى يتعامل معها</h3>
				@include('admin.companies.forms.banks')
			</div>
			<div id="menu4" class="tab-pane fade">
				<h3 class="tab-title">العضوية فى الغرف التجارية</h3>
				@include('admin.companies.forms.memberships')
			</div>
			<div id="menu5" class="tab-pane fade">
				<h3 class="tab-title">الملكية</h3>
				@include('admin.companies.forms.ownerships')
			</div>
			<div id="menu6" class="tab-pane fade">
				<h3 class="tab-title">أصناف الأسماك</h3>
				@include('admin.companies.forms.hscodes')
			</div>
			<div id="menu7" class="tab-pane fade">
				<h3 class="tab-title">
					@if(requestUri() == 'factories')
						بيانات مستلزمات التصنيع
					@elseif(requestUri() == 'sellers')
						بيانات مستلزمات التجهيز
					@else
						بيانات مستلزمات التشغيل
					@endif
				</h3>
				@include('admin.companies.forms.sources')
			</div>
		</div>

	</div>
</section>
<script type="text/javascript" src="{{ url('/js/fish.js') }}"></script>
@stop
