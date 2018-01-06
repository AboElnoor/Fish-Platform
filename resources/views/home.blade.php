@extends('layouts.app')

@section('content')
<section class="home">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="box-anchor">
                    <div class="box">
                        <div class="box-icon">
                            <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4>المستخدمين</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('farms.index') }}" class="box-anchor">
                    <div class="box">
                        <div class="box-icon">
                            <i class="fa fa-line-chart fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4>مزارع الأسماك</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('companies.index') }}" class="box-anchor">
                    <div class="box">
                        <div class="box-icon">
                            <i class="fa fa-cogs fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4>مستلزمات الانتاج والمصانع والتجار</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="box-anchor">
                    <div class="box">
                        <div class="box-icon">
                            <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4>الجمعيات</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="box-anchor">
                    <div class="box">
                        <div class="box-icon">
                            <i class="fa fa-tachometer fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4>الجهات والخدمات</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="box-anchor">
                    <div class="box">
                        <div class="box-icon">
                            <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4>خروج</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
