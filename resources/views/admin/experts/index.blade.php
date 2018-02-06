@extends('admin.layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="title ">
            <h2>اسأل خبير</h2>
        </div>
        <div class="row">
            <div class="tab">
                <div class="tab-wrapper">
                    <ul class="tabs">
                        <li><a href="#">الأسئلة الغير مجابة</a></li>
                        <li><a href="#">الأسئلة المجابة</a></li>
                    </ul>
                    <!-- / tabs -->
                </div>
                <div class="tab_content">
                    <div class="tabs_item">
                        <table class="table table-striped">
                            <tbody>
                                @php
                                    $unanswereds = $experts->whereNull('answer')->paginate(10);
                                @endphp
                                @forelse($unanswereds as $unanswered)
                                    <tr>
                                        <td><a href="{{ route(
                                                        'admin.experts.show',
                                                        $unanswered
                                                    ) }}">{{ $unanswered->question }}</a></td>
                                    </tr>
                                @empty
                                    <tr>ﻻ توجد بيانات</tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $unanswereds->links() }}
                        </div>
                    </div>
                    <!-- / tabs_item -->
                    <div class="tabs_item">
                        <table class="table table-striped">
                        <tbody>
                            @php
                                $answereds = $experts->whereNotNull('answer')
                                    ->orWhere('answer', '<>', 'false')->paginate(10);
                            @endphp
                            @forelse($answereds as $answered)
                                <tr>
                                    <td><a href="{{ route(
                                                    'admin.experts.show',
                                                    $answered
                                                ) }}">{{ $answered->question }}</a></td>
                                </tr>
                            @empty
                                <tr>ﻻ توجد بيانات</tr>
                            @endforelse
                        </tbody>
                        </table>
                        <div class="text-center">
                            {{ $answereds->links() }}
                        </div>
                    </div>
                    <!-- / tabs_item -->
                </div>
                <!-- / tab_content -->
            </div>
            <!-- / tab -->
        </div>
    </div>
</section>
@stop

@section('scripts')
<script src="/js/admin-script.js"></script>
@stop
