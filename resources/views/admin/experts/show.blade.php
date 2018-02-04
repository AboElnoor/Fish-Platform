@extends('admin.layouts.app')

@section('content')
<section class="form">
    <div class="container">
        <h2 class="title">السؤال:</h2>
        {!! Form::open(['method' => 'PUT', 'files' => true, 'route' => ['admin.experts.update', $expert]]) !!}
            <div class="col-md-12">
                <div class="form-group">
                    <p class="ques">{{ $expert->question }}</p>
                    <h2 class="title">الإجابة:</h2>
                    @if(!$expert->answer || \Route::current()->getName() == 'admin.experts.edit')
                        {!! Form::textarea('answer', $expert->answer ?? null, [
                            'placeholder' => 'ضع إجابة السؤال هنا', 'id' => 'ques', 'class' => 'form-control']) !!}
                    @else
                        <p class="ques">{{ $expert->answer }}</p>
                    @endif
                </div>

                {{-- @if(!$expert->answer || \Route::current()->getName() == 'admin.experts.edit')
                    <div class="form-group">
                        <div class="col-md-4">
                            <div class="fileUpload btn btn-sm btn-primary">
                                {!! Form::label('photo', 'إضافة صورة') !!}
                                {!! Form::file('photo', [
                                    'id' => 'photo', 'class' => 'upload', 'onchange' => 'readURL(this)']) !!}
                           </div>
                        </div>
                        <div class="col-md-8">
                           <img id="blah" src="images/1.png" alt="الصورة" />
                        </div>
                    </div>
                @endif --}}
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-md-12">
                @if(!$expert->answer || \Route::current()->getName() == 'admin.experts.edit')
                    {!! Form::submit('حفظ', ['class' => 'btn btn-sm btn-primary']) !!}
                @endif
            </div>
        {!! Form::close() !!}

        @if($expert->answer && \Route::current()->getName() == 'admin.experts.show')
            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <a href="{{ route('admin.experts.edit', $expert) }}" class="btn btn-sm btn-primary">تعديل</a>
                </div>
                <div class="col-md-6">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.experts.destroy', $expert]]) !!}
                        {!! Form::submit('حذف', ['class' => 'btn btn-sm btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        @endif
    </div>
</section>
@stop
