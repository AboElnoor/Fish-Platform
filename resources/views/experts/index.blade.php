@extends('layouts.app')

@section('content')
<section class="ask-expert">
    <div class="container">
        <div class="title centre">
            <h2>  - اسأل خبير -  </h2>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>اسأل خبير</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $experts = $experts->paginate(10);
                @endphp
                @foreach($experts as $expert)
                    <tr data-toggle="collapse" data-target="#accordion{{ $loop->index+1 }}" class="clickable">
                        <td class="title">{{ $expert->question }}</td>
                        <td>{{  $expert->entryUser ? $expert->entryUser->FullName : '-' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="accordion{{ $loop->index+1 }}" class="collapse">{{ $expert->answer }}</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $experts->links() }}
    </div>
</section>
@endsection
