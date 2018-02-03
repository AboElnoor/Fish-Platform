@extends('admin.layouts.app')
@section('content')
<section class="form farms">
    <div class="container">
        <h2 class="section-title">أفضل الممارسات والافيديوهات</h2>
        @include('layouts.alert')
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#menu1">أفضل الممارسات</a></li>
            <li><a data-toggle="tab" href="#menu2">الفيديوهات</a></li>
        </ul>
        <div class="tab-content">
            <div id="menu1" class="tab-pane fade in active">
                {!! Form::open([
                        'method' => isset($practice) ? 'PUT' : 'POST', 'files' => true,
                        'route' => isset($practice) ? ['admin.practices.update', $practice] : 'admin.practices.store'
                        ]) !!}
                    <h3 class="tab-title">أفضل الممارسات</h3>
                    <div class="form-group">
                        {!! Form::label('title', 'العنوان') !!}
                        {!! Form::text('title', $practice->title ?? null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('message', 'الرسالة') !!}
                        {!! Form::textarea('message', $practice->message ?? null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('photo', 'الصورة') !!}
                        {!! Form::file('photo', ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('اضافة', ['class' => 'btn btn-success btn-block']) !!}
                {!! Form::close() !!}
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>العنوان</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($practices as $practice)
                            <tr>
                                {{-- <td><img src="{{ asset('storage/'. $practice->photo ) }}"></td> --}}
                                <td>{{ $practice->title }}</td>
                                <td>
                                    <a href="{{ route('admin.practices.edit', $practice) }}"
                                       class="btn btn-sm btn-primary">تعديل</a>
                                </td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE', 'route' => ['admin.practices.destroy', $practice]]) !!}
                                        {!! Form::submit('حذف', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">لا توجد نتائج لعرضها</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div id="menu2" class="tab-pane fade">
                {!! Form::open(['route' => 'admin.videos.store', 'class' => 'videos']) !!}
                    <h3 class="tab-title">الفيديوهات</h3>
                    <div class="form-group">
                        {!! Form::label('title', 'العنوان') !!}
                        {!! Form::text('title', null, ['class' => 'form-control title']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('url', 'الرابط') !!}
                        {!! Form::text('url', null, ['class' => 'form-control url']) !!}
                    </div>
                    {!! Form::submit('اضافة', ['class' => 'btn btn-success btn-block save']) !!}
                {!! Form::close() !!}
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>العنوان</th>
                            <th>الفيديو</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($videos as $video)
                            <tr>
                                <td>{{ $video->title }}</td>
                                <td>
                                    <iframe width="200" height="100"
                                        src="https://www.youtube.com/embed/{{ $video->url }}"></iframe>
                                </td>
                                <td>
                                    <a href="{{ route('admin.videos.edit', $video) }}" data-form="videos"
                                        data-action="{{ route('admin.videos.update', $video) }}"
                                        class="btn btn-sm btn-primary edit">تعديل</a>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.videos.destroy', $video]]) !!}
                                        {!! Form::submit('حذف', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">لا توجد نتائج لعرضها</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ url('/js/fish.js') }}"></script>
@stop
