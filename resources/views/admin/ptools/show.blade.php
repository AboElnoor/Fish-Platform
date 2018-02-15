@extends('admin.layouts.app')
@section('content')
<section class="farms details">
    <div class="container">
        <div class="row">
            <div class="title ">
                <h2>{{ $ptool->buy_request ? 'طلب شراء مستلزمات' : 'اسم العرض' }}</h2>
            </div>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>{{ $ptool->buy_request ? 'طلب شراء' : 'عرض بيع' }}</td>
                        <td>
                            <h4><i><img src="{{ asset('storage/' . $ptool->photo) }}" alt=""></i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>كود العرض: </h4>
                        </td>
                        <td>
                            <h4><i>{{ $ptool->id }}</i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>نوع المنتج:</h4>
                        </td>
                        <td>
                            <h4><i>{{ $ptool->category->name }}</i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>اسم المنتج: </h4>
                        </td>
                        <td>
                            <h4> <i>{{ $ptool->name }}</i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>الكمية المطلوبة:</h4>
                        </td>
                        <td>
                            <h4><i>{{ $ptool->amount }}</i></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>وصف المنتج: </h4>
                        </td>
                        <td>
                            <h4><i>{{ $ptool->description }}</i></h4>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <a href="{{ route('admin.ptools.edit', $ptool) }}" class="btn btn-primary btn-block">تعديل</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
