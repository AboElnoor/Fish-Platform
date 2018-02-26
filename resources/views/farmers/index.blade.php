@extends('layouts.app')
@section('title') مزارع الأسماك @stop

@section('content')
<section class="films best-practices">
    <div class="container">
        <div class="title centre">
            <h2>  - مزارع الأسماك -  </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="title"> نماذج للمزارع المتميزة </h2>
                <div class="carousel slide fishCarousel" id="myCarouselFishFarm">
                    <div class="carousel-inner">
                        @foreach($galleries as $gallery)
                            <div class="item  @if($loop->first) active @endif">
                                <div class="col-md-4">
                                    <a href="#">
                                        <img src="{{ imageUrl($gallery->photo) }}" class="img-responsive">
                                        <div class="carousel-caption">
                                            <h2>{{ $gallery->title }}</h2>
                                            <p>{{ $gallery->subject }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#myCarouselFishFarm" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right carousel-control" href="#myCarouselFishFarm" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div>
            <h3> تحتوي قاعدة بيانات شبكة الأسماك على<span class="number">{{ $farmers->total() }} </span> مزارع ، انضم الآن لشبكة الأسماك وسجل مزرعتك</h3>
            <h4>يمكنك الإنضمام إلى المزارع على قاعدة بيانات شبكة الأسماك <a href="{{ route('farmers.create') }}">من هنا</a></h4>
            <h4>
                للدخول إلي قاعدة بيانات شبكة الاسماك كاملة يرجى الاتصال بنا على ‫02-27371998‬‬ أو من خلال هذه الاستمارة ال <a href="{{ route('home') }}#contact-form" >contact form </a>
            </h4>
        </div>
    </div>
</section>
@stop
