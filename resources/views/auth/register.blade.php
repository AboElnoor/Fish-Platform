@extends('layouts.app')

@section('content')
<section class="form-registration">
    <div class="container">
        <div class="title centre">
                <button type="submit" class="btn btn-primary btn-lg btn-facebook">التسجيل من خلال الفيس بوك
                    <i class="fa fa-facebook"></i>
                </button>
            <h2> - أو - </h2>
            @include('layouts.alert')
        </div>
        <div class="row">
            <div >
                <div class="form-wrapper">
                    {!! Form::open(['route' => 'register', 'class' => 'form-horizontal']) !!}
                        <fieldset class="col-md-8 col-md-offset-2">
                            <!-- Name input-->
                            <div class="form-group">
                                {!! Form::label(
                                    'FullName', 'الاسم بالكامل *', ['class' => 'col-md-4 control-label reg-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text(
                                        'FullName', old('FullName'), ['id' => 'name', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <!-- Email input-->
                            <div class="form-group">
                                {!! Form::label(
                                    'username', 'رقم الموبايل *', ['class' => 'col-md-4 control-label reg-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text(
                                        'username', old('username'), ['id' => 'number', 'class' => 'form-control']) !!}
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
                                        'email', old('email'), ['id' => 'e-mail', 'class' => 'form-control']) !!}
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
                                            old('Governorate_ID') ?? null,
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
                                            old('Locality_ID') ?? null,
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
                                        old('HSCode_ID.0') ?? null,
                                        ['id' => 'type1']
                                    ) !!}
                                </div>
                                <div class="col-md-4 centre">
                                    {!! Form::label(
                                        'HSCode_ID', 'النوع الثاني *', ['class' => 'control-label reg-label']) !!}
                                    {!! Form::select(
                                        'HSCode_ID[]',
                                        $hSCodes->prepend('من فضلك اختار', 0),
                                        old('HSCode_ID.1') ?? null,
                                        ['id' => 'type2']
                                    ) !!}
                                </div>
                                <div class="col-md-4 centre">
                                    {!! Form::label(
                                        'HSCode_ID', 'النوع الثالث *', ['class' => 'control-label reg-label']) !!}
                                    {!! Form::select(
                                        'HSCode_ID[]',
                                        $hSCodes->prepend('من فضلك اختار', 0),
                                        old('HSCode_ID.2') ?? null,
                                        ['id' => 'type3']
                                    ) !!}
                                </div>
                            </div>
                        </fieldset>
                        <div class="clearfix"></div>
                        <div class="button-custmoeize">
                            <div class="row">
                                <div class="col-md-4 block-center">
                                    <div class="checkbox" style="margin-bottom: 10px">
                                        <label style="font-size: 20px">
                                            {!! Form::checkbox('sms', 1, old('sms')) !!}
                                            الاشتراك في خدمة الرسائل القصيرة *<br>
                                            <span style="font-size: 12px">سعر الاشتراك في خدمة الرسائل القصيرة خمسون قرشاً يومياً</span>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg reg-btn">التسجيل</button>
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
