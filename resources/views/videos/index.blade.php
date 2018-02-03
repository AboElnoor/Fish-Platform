@extends('layouts.app')

@section('content')
<section class="films best-practices">
    <div class="container">
        <div class="title centre">
            <h2>  - أفضل الممارسات -  </h2>
        </div>
        <div class="row">
            @foreach($videos as $video)
                <div class="col-md-4">
                    <div class="box">
                        <iframe frameborder="0" height="100%" width="100%"
                            src="https://www.youtube.com/embed/{{ $video->url }}">
                        </iframe>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $videos->links() }}
    </div>
</section>
@endsection
