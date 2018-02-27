@extends('layouts.app')
@section('title') تعديل بيانات العضوية @stop

@section('content')
<section class="form-registration">
    <div class="container">
        <div class="row">
            <div>
                <div class="form-wrapper">
                    @include('layouts.alert')
                    {!! Form::open([
                        'route' => ['users.update', $user],
                        'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                        <fieldset class="col-md-8 col-md-offset-2">
                            <!-- Name input-->
                            <div class="form-group">
                                {!! Form::label(
                                    'FullName', 'الاسم بالكامل *', ['class' => 'col-md-4 control-label reg-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text(
                                        'FullName',
                                        $user->FullName ?? old('FullName'),
                                        ['id' => 'name', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label(
                                    'username', 'اسم المستخدم *', ['class' => 'col-md-4 control-label reg-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text(
                                        'username',
                                        $user->username ?? old('username'),
                                        ['id' => 'name', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <!-- Email input-->
                            <div class="form-group">
                                {!! Form::label(
                                    'phone', 'رقم الموبايل *', ['class' => 'col-md-4 control-label reg-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text(
                                        'phone',
                                        $user->phone ?? old('phone'), ['id' => 'number', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label(
                                    'password', 'كلمة المرور *', ['class' => 'col-md-4 control-label reg-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::password('password', ['id' => 'password', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label(
                                    'username', 'البريد الالكتروني'
                                   , ['class' => 'col-md-4 control-label reg-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text(
                                        'email',
                                        $user->email ?? old('email'), ['id' => 'e-mail', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </fieldset>
                        <div class="clearfix"></div>

                        <div class="reg-title">مكان العمل:</div>
                        <fieldset class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <div class="col-md-4 ol-md-offset-2 centre">
                                    {!! Form::label(
                                        'Governorate_ID', 'المحافظة *', ['class' => 'control-label reg-label']) !!}
                                    {!! Form::select(
                                            'Governorate_ID',
                                            $governorates->prepend('من فضلك اختار', 0),
                                            $user->Governorate_ID ?? old('Governorate_ID'),
                                            [
                                                'id' => 'gov',
                                                'class' => 'Governorate_ID',
                                                'data-url' => url('/localities')
                                            ]
                                        ) !!}
                                </div>
                                <div class="col-md-4 col-md-offset-2 centre">
                                    {!! Form::label(
                                        'Locality_ID', 'المركز *', ['class' => 'control-label reg-label']) !!}
                                    {!! Form::select(
                                            'Locality_ID',
                                            $locals ? $locals->prepend('من فضلك اختار', 0) : ['من فضلك اختار'],
                                            $user->Locality_ID ?? old('Locality_ID'),
                                            ['class' => 'Locality_ID']) !!}
                                </div>
                            </div>
                        </fieldset>
                        <div class="clearfix"></div>
                        <div class="reg-title">أنواع الأسماك التي تهمك معرفة أسعارها وأفضل الممارسات</div>
                        <fieldset class="col-md-9 col-md-offset-1">
                            <div class="form-group">
                                <div class="col-md-4  centre">
                                    {!! Form::label(
                                        'HSCode_ID', 'النوع الأول *', ['class' => 'control-label reg-label']) !!}
                                    {!! Form::select(
                                        'HSCode_ID[]',
                                        $hSCodes->prepend('من فضلك اختار', 0),
                                        old('HSCode_ID.0'),
                                        ['id' => 'type1']
                                    ) !!}
                                </div>
                                <div class="col-md-4 centre">
                                    {!! Form::label(
                                        'HSCode_ID', 'النوع الثاني *', ['class' => 'control-label reg-label']) !!}
                                    {!! Form::select(
                                        'HSCode_ID[]',
                                        $hSCodes->prepend('من فضلك اختار', 0),
                                        old('HSCode_ID.1'),
                                        ['id' => 'type2']
                                    ) !!}
                                </div>
                                <div class="col-md-4 centre">
                                    {!! Form::label(
                                        'HSCode_ID', 'النوع الثالث *', ['class' => 'control-label reg-label']) !!}
                                    {!! Form::select(
                                        'HSCode_ID[]',
                                        $hSCodes->prepend('من فضلك اختار', 0),
                                        old('HSCode_ID.2'),
                                        ['id' => 'type3']
                                    ) !!}
                                </div>
                            </div>
                        </fieldset>
                        <div class="clearfix"></div>
                        <div class="button-custmoeize">
                            <div class="row">
                                <div class="col-md-4 block-center">
                                    {!! Form::submit('تعديل', ['class' => 'btn btn-primary btn-lg reg-btn']) !!}
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
