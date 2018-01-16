@extends('layouts.app')

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
            {{-- <div class="row">
                <div class="col-md-6">
                    
                </div>
            </div> --}}
            <div id="menu1" class="tab-pane fade in active">
                <h3 class="tab-title">أفضل الممارسات</h3>
                <div class="form-group">
                    <label for="title">العنوان</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="message">الرسالة</label>
                    <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="pic">الصورة</label>
                    <input type="file" name="pic" class="form-control">
                </div>
                <button class="btn btn-success btn-block">اضافة</button>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>العنوان</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td>اسم مجهول</td>
                           <td>
                               <a href="#" class="btn btn-sm btn-primary edit">تعديل</a>
                           </td>
                           <td>
                               <a href="#" class="btn btn-sm btn-danger">حذف</a>
                           </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div id="menu2" class="tab-pane fade">
                <h3 class="tab-title">الفيديوهات</h3>
                <div class="form-group">
                    <label for="title">العنوان</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="url">الرابط</label>
                    <input type="text" name="url" class="form-control">
                </div>
                <button class="btn btn-success btn-block">اضافة</button>

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
                        <tr>
                           <td>اسم مجهول</td>
                           <td>
                               <iframe width="200" height="100" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                           </td>
                           <td>
                               <a href="#" class="btn btn-sm btn-primary edit">تعديل</a>
                           </td>
                           <td>
                               <a href="#" class="btn btn-sm btn-danger">حذف</a>
                           </td>
                        </tr>
                        <tr>
                           <td>اسم مجهول</td>
                           <td>
                               <iframe width="200" height="100" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                           </td>
                           <td>
                               <a href="#" class="btn btn-sm btn-primary edit">تعديل</a>
                           </td>
                           <td>
                               <a href="#" class="btn btn-sm btn-danger">حذف</a>
                           </td>
                        </tr>
                        <tr>
                           <td>اسم مجهول</td>
                           <td>
                               <iframe width="200" height="100" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
                           </td>
                           <td>
                               <a href="#" class="btn btn-sm btn-primary edit">تعديل</a>
                           </td>
                           <td>
                               <a href="#" class="btn btn-sm btn-danger">حذف</a>
                           </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ url('/js/fish.js') }}"></script>
@stop
