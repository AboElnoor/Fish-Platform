<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/front-styles.css">
    <title>مزارع الأسماك</title>
</head>
<body>

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('home') }}">الرئيسية</a></li>
                    <li><a href="{{ route('about') }}">من نحن</a></li>
                    <li><a href="#">اتصل بنا</a></li>
                    <li><a href="#">خريطة الموقع</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    @guest
                        <li><a class="login" href="#">دخول</a></li>
                        <li><a href="{{ route('register') }}">تسجيل</a></li>
                    @else
                        <li>
                            <a href="#">
                                <span class="badge">1</span>
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                تسجيل الخروج
                            </a>

                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                    <li><a href="#" class="btn btn-orange">English</a></li>
                    <li>
                        <a href="#" class="social-icon fb">
                            <div class="centerize">
                                <div class="v-center">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="social-icon fb">
                            <div class="centerize">
                                <div class="v-center">
                                    <i class="fa fa-youtube" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
        <div class="login-wrapper">
            <form>
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="اسم المستخدم">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">
                </div>
                <div class="form-group">
                    <a href="#forgotpassword" class="open-popup">هل نسيت كلمة المرور او اسم المستخدم؟</a>
                </div>
                <button type="submit" class="btn btn-block btn-main">إرسال</button>
            </form>
        </div>
    </nav>

    <section class="intro padding20">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="intro-certificate">
                        <a href="#"><img src="/images/certificate-intro.png" class="img-responsive"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="intro-text text-center">
                        <img src="/images/logo-type.png" class="img-responsive">
                        <p>شبكة تسويق الأسماك ومستلزمات الانتاج المدعمة بالمعلومات التسويقية والإرشاد.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="intro-logo">
                        <a href="#"><img src="/images/logo.png" class="img-responsive"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @yield('content')

    <footer>
        <div class="container">
            <ul>
                <li class="title"><b>ملتقى الأسماك</b></li>
                <li><a href="#">أحدث المنتجات والخدمات</a></li>
                <li><a href="#">ابتكارات</a></li>
                <li><a href="#">رواد الأعمال</a></li>
            </ul>
            <ul>
                <li class="title"><b>روابط هامة</b></li>
                <li><a href="#">المكتبة الرقمية</a></li>
                <li><a href="#">روابط مفيدة</a></li>
            </ul>
        </div>
    </footer>

    <section class="bottom-footer">
        <div class="container">
            <a href="#">سياسة الخصوصية</a>
            <a href="#">شروط الاستخدام</a>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="/js/scripts.js"></script>
    <script type="text/javascript" src="{{ url('/js/fish.js') }}"></script>
</body>
</html>
