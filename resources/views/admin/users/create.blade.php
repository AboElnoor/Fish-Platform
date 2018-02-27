@extends('admin.layouts.app')
@section('title') بيانات العضو @stop

@section('content')
<section class="form farms">
    <div class="container">
        <div class="title text-center">
            <h2>بيانات العضو</h2>
        </div>
        @include('layouts.alert')
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                {!! Form::open([
                        'method' => isset($user) ? 'PUT' : 'POST', 'files' => true,
                        'route' => isset($user) ? ['admin.users.update', $user] : 'admin.users.store',
                    ]) !!}
                    <fieldset class="col-md-12">
                        <!-- Name input-->
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label(
                                    'FullName', 'الاسم بالكامل *', ['class' => 'control-label reg-label']) !!}
                                {!! Form::text(
                                        'FullName',
                                        $user->FullName ?? old('FullName'),
                                        ['id' => 'name', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label(
                                    'username', 'اسم المستخدم *', ['class' => 'control-label reg-label']) !!}
                                {!! Form::text(
                                        'username',
                                        $user->username ?? old('username'),
                                        ['id' => 'name', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <!-- Email input-->
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label(
                                    'phone', 'رقم الموبايل *', ['class' => 'control-label reg-label']) !!}
                                {!! Form::text(
                                    'phone',
                                    $user->phone ?? old('phone'),
                                    ['id' => 'name', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label(
                                    'phone', 'كلمة المرور *', ['class' => 'control-label reg-label']) !!}
                                {!! Form::password('password', ['id' => 'password', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label(
                                    'email', 'البريد الالكترونى', ['class' => 'control-label reg-label']) !!}
                                {!! Form::text(
                                        'email',
                                        $user->email ?? old('email'),
                                        ['id' => 'e-mail', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </fieldset>
                    <div class="clearfix"></div>
                    <h4><b class="margin20">مكان العمل:<b></h4>
                    <fieldset class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-6 centre">
                                {!! Form::label(
                                        'Governorate_ID', 'المحافظة *', ['class' => 'control-label reg-label']) !!}
                                    {!! Form::select(
                                            'Governorate_ID',
                                            $governorates->prepend('من فضلك اختار', 0),
                                            $user->Governorate_ID ?? old('Governorate_ID'),
                                            [
                                                'id' => 'gov',
                                                'class' => 'form-control Governorate_ID',
                                                'data-url' => url('/localities')
                                            ]
                                        ) !!}
                            </div>
                            <div class="col-md-6 centre">
                                {!! Form::label(
                                        'Locality_ID', 'المركز *', ['class' => 'control-label reg-label']) !!}
                                    {!! Form::select(
                                            'Locality_ID',
                                            $locals ? $locals->prepend('من فضلك اختار', 0) : ['من فضلك اختار'],
                                            $user->Locality_ID ?? old('Locality_ID'),
                                            ['id' => 'city', 'class' => 'form-control Locality_ID']) !!}
                            </div>
                        </div>
                    </fieldset>
                    <div class="clearfix"></div>
                    <h4><b class="margin20">أنواع الأسماك التي تهمك معرفة أسعارها وأفضل الممارسات:</b></h4>
                    <fieldset class="col-md-9 col-md-offset-1 margin20">
                        <div class="form-group">
                            <div class="col-md-4 centre">
                                {!! Form::label(
                                        'HSCode_ID', 'النوع الأول *', ['class' => 'control-label reg-label']) !!}
                                    {!! Form::select(
                                        'HSCode_ID[]',
                                        $hSCodes->prepend('من فضلك اختار', 0),
                                        old('HSCode_ID.0'),
                                        ['id' => 'type1', 'class' => 'form-control']
                                    ) !!}
                            </div>
                            <div class="col-md-4 centre">
                                {!! Form::label(
                                        'HSCode_ID', 'النوع الأول *', ['class' => 'control-label reg-label']) !!}
                                    {!! Form::select(
                                        'HSCode_ID[]',
                                        $hSCodes->prepend('من فضلك اختار', 0),
                                        old('HSCode_ID.1'),
                                        ['id' => 'type2', 'class' => 'form-control']
                                    ) !!}
                            </div>
                            <div class="col-md-4 centre">
                                {!! Form::label(
                                        'HSCode_ID', 'النوع الأول *', ['class' => 'control-label reg-label']) !!}
                                    {!! Form::select(
                                        'HSCode_ID[]',
                                        $hSCodes->prepend('من فضلك اختار', 0),
                                        old('HSCode_ID.2'),
                                        ['id' => 'type3', 'class' => 'form-control']
                                    ) !!}
                            </div>
                        </div>
                    </fieldset>
                    <div class="clearfix "></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

@stop
