@extends('layouts.app')

@section('content')
<section class="icons">
    <div class="container">
        <div class="row">
            <div class="col-md-15">
                <a href="/fishplat/fish-market.html" class="icon-anchor">
                    <div class="icon-wrapper">
                        <img src="images/fish-circle.png" class="img-responsive">
                        <h3>سوق الأسماك</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-15">
                <a href="/fishplat/production-tools.html" class="icon-anchor">
                    <div class="icon-wrapper">
                        <img src="images/production-tools-circle.png" class="img-responsive">
                        <h3>سوق مستلزمات الانتاج</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-15">
                <a href="/fishplat/prices.html" class="icon-anchor">
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
                <a href="/fishplat/ask-expert.html" class="icon-anchor">
                    <div class="icon-wrapper">
                        <img src="images/icons/website-veg-fish-14X.png" class="img-responsive">
                        <h3>اسأل خبير</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="carousel-news">
    <div class="carousel-wrapper">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="http://lorempixel.com/1800/800/sports/1/">
                    <div class="carousel-caption">
                        <h2 class="new-title">عنوان الخبر</h2>
                        <p>تفاصيل الخبر: بشاير أول شبكة تسويق زراعى فى مصر مدعمة بسوق أونلاين لبيع وشراء المحاصيل الزراعية</p>
                    </div>
                </div>
                <div class="item">
                    <img src="http://lorempixel.com/1800/800/sports/1/">
                    <div class="carousel-caption">
                        <h2 class="new-title">عنوان الخبر</h2>
                        <p>تفاصيل الخبر: بشاير أول شبكة تسويق زراعى فى مصر مدعمة بسوق أونلاين لبيع وشراء المحاصيل الزراعية</p>
                    </div>
                </div>
            </div>

            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>
        </div>
    </div>
    <div class="container">
        <div class="carousel-bottom text-center">
            <p>عن خدمة بشاير الإخبارية بشاير : أول شبكة تسويق زراعي في مصر مدعمة بسوق اونلاين لبيع و شراء المحاصيل الزراعية ومستلزمات الأنتاج علي النت و المحمول و الربط المباشر بين المزارعين و جمعياتهم الزراعية و الأهلية مع كل فئات السوق: مصانع, مصدرين, سلاسل تجزئة, شركات مستلزمات الإنتاج لإتمام عقود البيع الفوري وعقود التوريد والزراعة التعاقدية.</p>
            <a href="#" class="btn btn-primary">المزيد من الأخبار</a>
        </div>
    </div>
</section>

<section class="adbox">
    <div class="container">
        <img src="images/boxa.png" class="img-responsive">
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
                <a href="#" class="icon-anchor">
                    <img src="images/icons/website-veg-fish-13.png" class="img-responsive">
                    <h5>أفضل الممارسات</h5>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#" class="icon-anchor">
                    <img src="images/icons/website-veg-fish-12.png" class="img-responsive">
                    <h5>موردى المستلزمات</h5>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#" class="icon-anchor">
                    <img src="images/icons/website-veg-fish-11.png" class="img-responsive">
                    <h5>تصنيع الأسماك</h5>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#" class="icon-anchor">
                    <img src="images/icons/website-veg-fish-10.png" class="img-responsive">
                    <h5>موزعى الأسماك</h5>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#" class="icon-anchor">
                    <img src="images/icons/website-veg-fish-09.png" class="img-responsive">
                    <h5>مجتمع قطاع الأسماك</h5>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#" class="icon-anchor">
                    <img src="images/icons/website-veg-fish-08.png" class="img-responsive">
                    <h5>سجل مزرعتك/شركتك</h5>
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
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-md-3">
                        <a href="#" class="icon-anchor">
                            <img src="images/icons/website-veg-fish-18.png" class="img-responsive">
                            <h5>رواد الأعمال / المشاريع الصغيرة</h5>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="icon-anchor">
                            <img src="images/icons/website-veg-fish-17.png" class="img-responsive">
                            <h5>وظائف</h5>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="icon-anchor">
                            <img src="images/icons/website-veg-fish-16.png" class="img-responsive">
                            <h5>ارشادات وقوانين التصدير</h5>
                        </a>
                    </div>
                    <div class="col-md-3">
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

<section class="contact">
    <div class="container">
        <h2 class="section-title">تواصل معنا</h2>
        <div class="col-md-6 right-col">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="الأسم">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="التليفون">
            </div>
            <div class="form-group">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        الموضوع
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">واحد</a></li>
                        <li><a href="#">اتنين</a></li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="الرسالة ..."></textarea>
            </div>
            <button class="btn btn-primary pull-left">ارسال</button>
        </div>
        <div class="col-md-6 left-col">
            <div class="row">
                <div class="col-md-5">
                    <div class="icon">
                        <img src="images/contact-call.png" alt="">
                    </div>
                    <div class="desc">
                        <p>012 0154 7720</p>
                        <p>012 7713 3052</p>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="icon">
                        <img src="images/contact-location.png" alt="">
                    </div>
                    <div class="desc">
                        <p>٢٧ ش حسن عاصم، الزمالك، القاهرة، مصر</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="icon">
                        <img src="images/contact-fax.png" alt="">
                    </div>
                    <div class="desc">
                        <p>02 / 27371998</p>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="icon">
                        <img src="images/contact-email.png" alt="">
                    </div>
                    <div class="desc">
                        <p>mail@bashaier.net</p>
                    </div>
                </div>
            </div>
            <img src="images/contact-map.png" class="img-responsive mapImg">
        </div>
    </div>
</section>

<section class="adbox">
    <div class="container">
        <img src="images/boxa.png" class="img-responsive">
    </div>
</section>
@endsection
