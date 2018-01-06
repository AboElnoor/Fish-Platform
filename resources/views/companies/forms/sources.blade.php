<div class="row">
    {!! Form::open(['route' => 'farms.store']) !!}

    <h2>أمهات للتفريخ</h2>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('SourceS1', 'المصدر / المورديين') !!}
            {!! Form::text('SourceS1', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Counts1', 'الكميات/ موسم') !!}
            {!! Form::text('Counts1', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <h2>أعلاف</h2>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('SourceS2', 'المصدر / المورديين') !!}
            {!! Form::text('SourceS2', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Counts2', 'الكميات/ موسم') !!}
            {!! Form::text('Counts2', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <h2>خامات أعلاف</h2>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('SourceS3', 'المصدر / المورديين') !!}
            {!! Form::text('SourceS3', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Counts3', 'الكميات/ موسم') !!}
            {!! Form::text('Counts3', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <h2>مستلزمات تربيه وتفريخ</h2>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('SourceS3', 'المصدر / المورديين') !!}
            {!! Form::text('SourceS3', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Counts3', 'الكميات/ موسم') !!}
            {!! Form::text('Counts3', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
