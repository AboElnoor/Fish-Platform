<div class="row">
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('SourceS1', '(*)الاســـم') !!}
            {!! Form::text('SourceS1', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Counts1', '(*)المنصب') !!}
            {!! Form::text('Counts1', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('SourceS2', '(*)موبايل') !!}
            {!! Form::text('SourceS2', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Counts2', 'بريد الالكترونى') !!}
            {!! Form::text('Counts2', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
