@extends('layouts.app')
@section('title') {{ $expert->title }} @stop

@section('content')
<section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title">{{ $expert->title }}</h2>
                    <div class="col-md-8">
                        <p class="ask-p">{{ $expert->question }}</p>
                    </div>
                    <div class="col-md-4"><img class="ques-img" src="{{ imageUrl($expert->question_photo) }}"></div>
                </div>

                <div class="col-md-12">
                    <h2 class="title">الإجابة:</h2>
                    <div class="col-md-8">
                        <p class="ask-p">{{ $expert->answer }}</p>
                    </div>
                    <div class="col-md-4"><img class="ques-img" src="{{ imageUrl($expert->photo) }}"></div>
                </div>

            </div>
        </div>
    </section>
@endsection
