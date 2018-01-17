@extends('layouts.app')

@section('content')
<section class="home">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
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
            <div class="col-md-3">
                <a href="{{ route('farmers.index') }}" class="box-anchor">
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
            <div class="col-md-3">
                <a href="{{ route('companies.index') }}" class="box-anchor">
                    <div class="box">
                        <div class="box-icon">
                            <i class="fa fa-cogs fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4>مستلزمات الانتاج </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('factories.index') }}" class="box-anchor">
                    <div class="box">
                        <div class="box-icon">
                            <i class="fa fa-building fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4>المصانع</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('sellers.index') }}" class="box-anchor">
                    <div class="box">
                        <div class="box-icon">
                            <i class="fa fa-user-secret fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4>التجار</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('prices.index') }}" class="box-anchor">
                    <div class="box">
                        <div class="box-icon">
                            <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4>الأسعار</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
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
            <div class="col-md-3">
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
            <div class="col-md-3">
                <a href="{{ route('practices.index') }}" class="box-anchor">
                    <div class="box">
                        <div class="box-icon">
                            <i class="fa fa-object-ungroup fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4>أفضل الممارسات</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('markets') }}" class="box-anchor">
                    <div class="box">
                        <div class="box-icon">
                            <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4>سوق السمك</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
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
