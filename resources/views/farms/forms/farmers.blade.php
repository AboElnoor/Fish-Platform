<div>
    {!! Form::open(['route' => 'farmers.store']) !!}

    <div class="form-group">
        {!! Form::label('FishFarmer_ID', 'كود صاحب المزرعة') !!}
        {!! Form::text('FishFarmer_ID', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('FishFarmerName', 'اسم صاحب المزرعة') !!}
        {!! Form::text('FishFarmerName', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Email', 'البريد الالكتروني') !!}
        {!! Form::email('Email', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('NationalNo', 'الرقم القومي') !!}
        {!! Form::text('NationalNo', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Mob', ' الموبايل') !!}
        {!! Form::text('Mob', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Phone', 'التليفون') !!}
        {!! Form::text('Phone', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Memer', 'عضو في - جمعيات أهليه') !!}
        {!! Form::textarea('Memer', null, ['class' => 'form-control']) !!}
    </div>


    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}

</div>
