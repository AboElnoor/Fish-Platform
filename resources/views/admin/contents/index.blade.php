@extends('admin.layouts.app')

@section('content')

<section class="farms">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="section-title">المحتوى</h2>
            </div>
            <div class="col-md-6">
                <a href="{{ route('admin.contents.create') }}" class="btn btn-success pull-left" style="margin-top: 30px;">اضافة جديد</a>
            </div>
        </div>
        @include('layouts.alert')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>كود</th>
                    <th>القسم</th>
                    <th>العنوان</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->category->name ?? null }}</td>
                        <td>{{ $article->title }}</td>
                        <td>
                            <a href="{{ route('admin.contents.edit', $article) }}" class="btn btn-sm btn-primary">تعديل</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.contents.destroy', $article]]) !!}
                                {!! Form::submit('حذف', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">لا توجد نتائج لعرضها</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="text-center">
            {{ $articles->links() }}
        </div>
    </div>
</section>

@stop
