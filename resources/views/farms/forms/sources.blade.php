<div>
    {!! Form::open(['route' => 'farms.store']) !!}

الزريـــعه
    <div class="form-group">
        {!! Form::label('SourceS1', 'المصدر / المورديين') !!}
        {!! Form::text('SourceS1', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Counts1', 'الكميات/ موسم') !!}
        {!! Form::text('Counts1', null, ['class' => 'form-control']) !!}
    </div>

اعـــلاف
    <div class="form-group">
        {!! Form::label('SourceS2', 'المصدر / المورديين') !!}
        {!! Form::text('SourceS2', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Counts2', 'الكميات/ موسم') !!}
        {!! Form::text('Counts2', null, ['class' => 'form-control']) !!}
    </div>

أخـــرى مستلزمات انتاج
    <div class="form-group">
        {!! Form::label('SourceS3', 'المصدر / المورديين') !!}
        {!! Form::text('SourceS3', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Counts3', 'الكميات/ موسم') !!}
        {!! Form::text('Counts3', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}

</div>
