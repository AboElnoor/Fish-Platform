<div class="row">
    {!!
        Form::open([
            'method' => isset($farmer) ? 'PUT' : 'POST',
            'route' => isset($farmer) ? ['admin.farmers.update', $farmer] : 'admin.farmers.store',
        ])
    !!}
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('FishFarmerName', 'اسم صاحب المزرعة') !!}
                {!! Form::text('FishFarmerName', $farmer->FishFarmerName ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Email', 'البريد الالكتروني') !!}
                {!! Form::email('Email', $farmer->Email ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('NationalNo', 'الرقم القومي') !!}
                {!! Form::text('NationalNo', $farmer->NationalNo ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Mob', ' الموبايل') !!}
                {!! Form::text('Mob', $farmer->Mob ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Phone', 'التليفون') !!}
                {!! Form::text('Phone', $farmer->Phone ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Memer', 'عضو في - جمعيات أهليه') !!}
                {!! Form::textarea('Memer', $farmer->Memer ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::submit('حفظ واستمرار', ['class' => 'btn btn-default next']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::submit('حفظ وانهاء', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
