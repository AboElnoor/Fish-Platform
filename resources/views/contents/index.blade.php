@extends('layouts.app')
@section('title') {{ $type->name }} @stop

@section('content')
<section class="best-practices">
    <div class="container">
        <div class="title centre">
            <h2>  - {{ $type->name }} -  </h2>
        </div>
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-6">
                    <div class="box">
                        <div class="pull-right col-md-6">
                            <img class="best-img" src="{{ asset('storage/' . $article->photo) }}">
                        </div>
                        <h3 class="box-title">{{ $article->title }}</h3>
                        <p>{!! in_array(
                            $type->id, [7, 8, 9, 10]) ? $article->subject : getExcerpt($article->subject) !!}</p>
                        @if(!in_array($type->id, [7, 8, 9, 10]))
                            <a href="{{ route('contents.show', $article) }}">مشاهدة المزيد</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        {{ $articles->links() }}
    </div>
</section>
@endsection
