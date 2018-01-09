<div class="row">
    {!! Form::open(['route' => ['companies.addSource', $company ?? session('company')]]) !!}

    <div class="col-md-12">
        <h4><b>أمهات للتفريخ</b></h4>
        <div class="form-group">
            {!! Form::label('SourceS1', 'المصدر / المورديين') !!}
            {!! Form::text('SourceS1', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Counts1', 'الكميات/ موسم') !!}
            {!! Form::text('Counts1', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <h4><b>أعلاف</b></h4>
        <div class="form-group">
            {!! Form::label('SourceS2', 'المصدر / المورديين') !!}
            {!! Form::text('SourceS2', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Counts2', 'الكميات/ موسم') !!}
            {!! Form::text('Counts2', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <h4><b>خامات أعلاف</b></h4>
        <div class="form-group">
            {!! Form::label('SourceS3', 'المصدر / المورديين') !!}
            {!! Form::text('SourceS3', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Counts3', 'الكميات/ موسم') !!}
            {!! Form::text('Counts3', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <h4><b>مستلزمات تربيه وتفريخ</b></h4>
        <div class="form-group">
            {!! Form::label('SourceS4', 'المصدر / المورديين') !!}
            {!! Form::text('SourceS4', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Counts4', 'الكميات/ موسم') !!}
            {!! Form::text('Counts4', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
