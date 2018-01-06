<div class="row">
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="col-md-12">
        <h4><b>الزريـــعه</b></h4>
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
        <h4><b>اعـــلاف</b></h4>
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
        <h4><b>أخـــرى مستلزمات انتاج</b></h4>
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