@extends('layouts.app')
@section('title') الرئيسية @stop

@section('content')
<section class="adbox">
    <div class="container">
        <img src="images/Garfd.png" class="img-responsive">
    </div>
</section>
<section class="icons">
    <div class="container">
        <div class="row">
            <div class="col-md-15">
                <a href="{{ route('markets.index') }}" class="icon-anchor">
                    <div class="icon-wrapper">
                        <img src="images/fish-circle.png" class="img-responsive">
                        <h3>سوق الأسماك</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-15">
                <a href="{{ route('ptools.index') }}" class="icon-anchor">
                    <div class="icon-wrapper">
                        <img src="images/production-tools-circle.png" class="img-responsive">
                        <h3>سوق مستلزمات الانتاج</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-15">
                <a href="{{ route('prices.index') }}" class="icon-anchor">
                    <div class="icon-wrapper">
                        <img src="images/price-circle.png" class="img-responsive">
                        <h3>أسعار الأسماك</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-15">
                <a href="{{ route('practices.index') }}" class="icon-anchor">
                    <div class="icon-wrapper">
                        <img src="images/best-circle.png" class="img-responsive">
                        <h3>أفضل الممارسات</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-15">
                <a href="{{ route('experts.index') }}" class="icon-anchor">
                    <div class="icon-wrapper">
                        <img src="images/icons/website-veg-fish-14X.png" class="img-responsive">
                        <h3>اسأل خبير</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="main-slider">
    <div class="col-md-12">
        <div class="col-md-8">
            <div class="news-holder">
                <ul class="news-headlines">
                    @foreach($articles->pluck('title') as $title)
                        <li class="{{ $loop->first ? 'selected' : '' }}">{{ $title }}</li>
                    @endforeach
                </ul>
                <div class="news-preview">
                    @foreach($articles as $article)
                        <div class="news-content {{ $loop->first ? 'top-content' : '' }}">
                            <img src="{{ asset('storage/' . $article->photo) }}">
                            <div class="resume">
                                <a href="{{ route('contents.show', $article) }}"
                                    class="title">{{ $article->title }}</a>
                                <p>{{ getExcerpt($article->subject) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- .news-preview -->
            </div>
            <!-- .news-holder -->
        </div>
        <div class="col-md-4 ">
            <div class="slider-ad-div">
                <img class="slider-ad" src="images/adbox-square.png">
            </div>
        </div>
    </div>
</section>

<section class="adbox">
    <div class="container">
        <img src="images/Abe.png" class="img-responsive">
    </div>
</section>

<section class="dbs icons">
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <a href="#" class="icon-anchor">
                <div class="icon-wrapper">
                    <img src="images/dbs-circle.png" class="img-responsive">
                    <h3>قواعد البيانات</h3>
                </div>
            </a>
        </div>
    </div>
</section>

<section class="icons-blue icons">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('farmers.index') }}" class="icon-anchor">
                    <img src="images/icons/website-veg-fish-13.png" class="img-responsive">
                    <h5> مزارع الأسماك</h5>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ route('companies.index') }}" class="icon-anchor">
                    <img src="images/icons/website-veg-fish-12.png" class="img-responsive">
                    <h5>موردى المستلزمات</h5>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ route('factories.index') }}" class="icon-anchor">
                    <img src="images/icons/website-veg-fish-11.png" class="img-responsive">
                    <h5>تصنيع الأسماك</h5>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ route('sellers.index') }}" class="icon-anchor">
                    <img src="images/icons/website-veg-fish-10.png" class="img-responsive">
                    <h5>موزعى الأسماك</h5>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ route('contents.type', 7) }}" class="icon-anchor">
                    <img src="images/icons/website-veg-fish-09.png" class="img-responsive">
                    <h5>مجتمع قطاع الأسماك</h5>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ route('farmers.create') }}" class="icon-anchor">
                    <img src="images/icons/website-veg-fish-08.png" class="img-responsive">
                    <h5>سجل في الشبكة</h5>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="adbox">
    <div class="container">
        <img src="images/boxa.png" class="img-responsive">
    </div>
</section>

<section class="four-icons icons">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2 col-md-offset-1">
                        <a href="{{ route('contents.type', 8) }}" class="icon-anchor">
                            <img src="images/icons/website-veg-fish-dollar.png" class="img-responsive">
                            <h5>خدمات تمويل</h5>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('contents.type', 2) }}" class="icon-anchor">
                            <img src="images/icons/website-veg-fish-18.png" class="img-responsive">
                            <h5>رواد الأعمال / المشاريع الصغيرة</h5>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="#" class="icon-anchor">
                            <img src="images/icons/website-veg-fish-17.png" class="img-responsive">
                            <h5>وظائف</h5>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('contents.type', 3) }}" class="icon-anchor">
                            <img src="images/icons/website-veg-fish-16.png" class="img-responsive">
                            <h5>ارشادات وقوانين التصدير</h5>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('videos.index') }}" class="icon-anchor">
                            <img src="images/icons/website-veg-fish-15.png" class="img-responsive">
                            <h5>أفلام ارشادية</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="adbox">
    <div class="container">
        <img src="images/boxa.png" class="img-responsive">
    </div>
</section>

<section class="contact" id="contact-form">
    <div class="title centre ">
        <h2>  - تواصل معانا -  </h2>
    </div>
    <div class="container">
        <div class="col-md-5 right-col">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="الأسم"> <span class="required">*</span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="التليفون"> <span class="required">*</span>
            </div>
            <div class="form-group">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    أريد التواصل مع
                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">بشاير</a></li>
                        <li><a href="#">المركز الدولي للأسماك</a></li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <textarea name="message" id="" cols="30" rows="8" class="form-control" placeholder="الرسالة ..."></textarea>
            </div>
            <button class="btn btn-primary pull-left">ارسال</button>
        </div>
        <div class="col-md-7 left-col">
            <div class="col-md-6 no-padding">
                <img class="contact-logo" src="images/logo-b.png">
                <div class="row">
                    <div class="col-md-5 no-padding-left">
                        <div class="icon">
                            <img src="images/contact-call-b.png" alt="">
                        </div>
                        <div class="desc">
                            <p>012 0154 7720</p>
                            <p>012 7713 3052</p>
                        </div>
                    </div>
                    <div class="col-md-7 no-padding">
                        <div class="icon">
                            <img src="images/contact-location-b.png" alt="">
                        </div>
                        <div class="desc">
                            <p>٢٧ ش حسن عاصم، <br/>الزمالك، القاهرة، مصر</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 no-padding-left">
                        <div class="icon">
                            <img src="images/contact-fax-b.png" alt="">
                        </div>
                        <div class="desc">
                            <p>02 / 27371998</p>
                        </div>
                    </div>
                    <div class="col-md-7 no-padding">
                        <div class="icon">
                            <img src="images/contact-email-b.png" alt="">
                        </div>
                        <div class="desc">
                            <p>mail@bashaier.net</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 no-padding">
                <img class="contact-logo" src="images/logo.png">
                <div class="row">
                    <div class="col-md-5 no-padding">
                        <div class="icon">
                            <img src="images/contact-call.png" alt="">
                        </div>
                        <div class="desc">
                            <p>+20 227364114</p>
                            <p>+2- 01000 77 68 21</p>
                        </div>
                    </div>
                    <div class="col-md-7 no-padding">
                        <div class="icon">
                            <img src="images/contact-location.png" alt="">
                        </div>
                        <div class="desc">
                            <p>
                                18ب
                                 شارع مرعشلي
                                <br/>
                                الدور الرابع، شقة 17، الزمالك
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 no-padding">
                        <div class="icon">
                            <img src="images/contact-fax.png" alt="">
                        </div>
                        <div class="desc">
                            <p>20 227364112</p>
                        </div>
                    </div>
                    <div class="col-md-7 no-padding">
                        <div class="icon">
                            <img src="images/contact-email.png" alt="">
                        </div>
                        <div class="desc">
                            <p>m.elazzazy@worldfishcenter.org</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="600" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=Egypt, cairo, worldfish&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="adbox">
    <div class="container">
        <img src="images/boxa.png" class="img-responsive">
    </div>
</section>
@endsection
