@extends('layouts.app')

@section('content')
<section class="best-practices">
    <div class="container">
        <div class="title centre">
            <h2>  - أفضل الممارسات -  </h2>
        </div>
        <div class="row">
            @foreach($practices as $practice)
                <div class="col-md-6">
                    <div class="box">
                        <div class="pull-right col-md-6">
							<img class="best-img" src="images/best.jpg">
						</div>
                        <h3 class="box-title">{{ $practice->title }}</h3>
                        <p>{{ $practice->message }}</p>
                        <a href="article.html">مشاهدة المزيد</a>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $practices->links() }}
    </div>
</section>
@endsection
