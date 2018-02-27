@extends('admin.layouts.app')
@section('title') الاعضاء @stop

@section('content')
<section class="farms">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="section-title">الاعضاء</h2>
            </div>
            <div class="col-md-6">
                <a href="{{ route('admin.users.create') }}" class="btn btn-success pull-left" style="margin-top: 30px;">اضافة جديد</a>
            </div>
        </div>
        @include('layouts.alert')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>كود</th>
                    <th>الاسم بالكامل</th>
                    <th>اسم المستخدم</th>
                    <th>المحافظة</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->User_ID }}</td>
                        <td>{{ $user->FullName }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->governorate->Governorate_Name_A ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-primary">تعديل</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy', $user]]) !!}
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
            {{ $users->links() }}
        </div>
    </div>
</section>

@stop
