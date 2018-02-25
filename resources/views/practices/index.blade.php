@extends('layouts.app')
@section('title') أفضل الممارسات @stop

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
							<img class="best-img" src="{{ imageUrl($practice->photo) }}">
						</div>
                        <h3 class="box-title">{{ $practice->title }}</h3>
                        <p>{{ $practice->message }}</p>
                        <a href="{{ route('practices.show', $practice) }}">مشاهدة المزيد</a>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $practices->links() }}
    </div>
</section>
@endsection
