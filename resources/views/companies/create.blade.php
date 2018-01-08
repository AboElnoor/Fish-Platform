@extends('layouts.app')

@section('content')

<section class="form">
	<div class="container">
		<h2 class="section-title">مستلزمات الانتاج</h2>
		@include('layouts.alert')

		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">استمارة بيانات مصادرمستلزمات الانتاج</a></li>
			<li><a data-toggle="tab" href="#menu1">الافــرع</a></li>
			<li><a data-toggle="tab" href="#menu2">الاداره والموظفين</a></li>
			<li><a data-toggle="tab" href="#menu3">البنوك التى يتعامل معها</a></li>
			<li><a data-toggle="tab" href="#menu4">العضوية فى الغرف التجارية</a></li>
			<li><a data-toggle="tab" href="#menu5">الملكية</a></li>
			<li><a data-toggle="tab" href="#menu6">مجموعة الشركات التابع لها</a></li>
			<li><a data-toggle="tab" href="#menu7">بيانات مستلزمات التشغيل</a></li>
		</ul>

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<h3 class="tab-title">استمارة بيانات مصادرمستلزمات الانتاج</h3>
				@include('companies.forms.companies')
			</div>
			<div id="menu1" class="tab-pane fade">
				<h3 class="tab-title">الافــرع</h3>
				@include('companies.forms.branches')
			</div>
			<div id="menu2" class="tab-pane fade">
				<h3 class="tab-title">الاداره والموظفين</h3>
				@include('companies.forms.manager')
			</div>
			<div id="menu3" class="tab-pane fade">
				<h3 class="tab-title">البنوك التى يتعامل معها</h3>
				@include('companies.forms.banks')
			</div>
			<div id="menu4" class="tab-pane fade">
				<h3 class="tab-title">العضوية فى الغرف التجارية</h3>
				@include('companies.forms.memberships')
			</div>
			<div id="menu5" class="tab-pane fade">
				<h3 class="tab-title">الملكية</h3>
				@include('companies.forms.ownerships')
			</div>
			<div id="menu6" class="tab-pane fade">
				<h3 class="tab-title">مجموعة الشركات التابع لها</h3>
				@include('companies.forms.hscodes')
			</div>
			<div id="menu7" class="tab-pane fade">
				<h3 class="tab-title">بيانات مستلزمات التشغيل</h3>
				@include('companies.forms.sources')
			</div>
		</div>

	</div>
</section>

@stop
