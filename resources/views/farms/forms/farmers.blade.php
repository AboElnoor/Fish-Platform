<div class="row">
    {!! Form::open(['route' => 'farmers.store']) !!}
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('FishFarmer_ID', 'كود صاحب المزرعة') !!}
            {!! Form::text('FishFarmer_ID', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('FishFarmerName', 'اسم صاحب المزرعة') !!}
            {!! Form::text('FishFarmerName', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Email', 'البريد الالكتروني') !!}
            {!! Form::email('Email', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('NationalNo', 'الرقم القومي') !!}
            {!! Form::text('NationalNo', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Mob', ' الموبايل') !!}
            {!! Form::text('Mob', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Phone', 'التليفون') !!}
            {!! Form::text('Phone', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Memer', 'عضو في - جمعيات أهليه') !!}
            {!! Form::textarea('Memer', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::submit('حفظ والتالى', ['class' => 'btn btn-default']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::submit('حفظ وانهاء', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>

    {!! Form::close() !!}

</div>
