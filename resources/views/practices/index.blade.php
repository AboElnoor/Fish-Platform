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
                        <h3 class="box-title">{{ $practice->title }}</h3>
                        <p>{{ $practice->message }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $practices->links() }}
    </div>
</section>
@endsection
