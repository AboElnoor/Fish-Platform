@extends('admin.layouts.app')

@section('content')
<section class="home">
    <div class="container">
        <div class="row">
            <div class="title ">
                <h2>قواعد البيانات</h2>
            </div>
             <div class="col-md-3">
                <a href="{{ route('admin.farmers.index') }}" class="box-anchor">
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
                <a href="{{ route('admin.sellers.index') }}" class="box-anchor">
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
                <a href="{{ route('admin.companies.index') }}" class="box-anchor">
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
                <a href="{{ route('admin.factories.index') }}" class="box-anchor">
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
        </div>
        <div class="row">
            <div class="title">
                <h2> السوق والاسعار</h2>
            </div>
            
            <div class="col-md-3">
                <a href="{{ route('admin.prices.index') }}" class="box-anchor">
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
                <a href="{{ route('admin.markets.index') }}" class="box-anchor">
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
                            <i class="fa fa-tasks fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4> سوق مستلزمات الإنتاج</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="title">
                <h2>  إدارة المحتوي</h2>
            </div>
            <div class="col-md-3">
             <a href="{{ route('admin.contents.create') }}" class="box-anchor">
                <div class="box">
                   <div class="box-icon">
                      <i class="fa fa-folder-open fa-2x" aria-hidden="true"></i>
                   </div>
                   <div class="box-title">
                      <h4>المحتوي</h4>
                   </div>
                </div>
             </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.practices.create') }}" class="box-anchor">
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
                <a href="{{ route('admin.experts.index') }}" class="box-anchor">
                    <div class="box">
                       <div class="box-icon">
                          <i class="fa fa-question fa-2x" aria-hidden="true"></i>
                       </div>
                       <div class="box-title">
                          <h4>اسأل خبير </h4>
                       </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="title">
                <h2>الأعضاء والمستخدمين</h2>
            </div>
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
                <a href="#" class="box-anchor">
                    <div class="box">
                        <div class="box-icon">
                            <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="box-title">
                            <h4>الأعضاء</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="box-anchor">
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
            
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</section>
@endsection
