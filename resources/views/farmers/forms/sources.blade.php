<div class="row">
    {!! Form::open(['route' => ['farmers.addSource', $farmer ?? session('farmer')]]) !!}
        <div class="col-md-12">
            <h4><b>الزريـــعه</b></h4>
            <div class="form-group col-md-8">
                {!! Form::label('SourceS1', 'المصدر / المورديين') !!}
                {!! Form::text('SourceS1', $farmer->source->SourceS1 ?? null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('Counts1', 'الكميات/ موسم') !!}
                {!! Form::text('Counts1', $farmer->source->Counts1 ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <h4><b>اعـــلاف</b></h4>
            <div class="form-group col-md-8">
                {!! Form::label('SourceS2', 'المصدر / المورديين') !!}
                {!! Form::text('SourceS2', $farmer->source->SourceS2 ?? null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('Counts2', 'الكميات/ موسم') !!}
                {!! Form::text('Counts2', $farmer->source->Counts2 ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <h4><b>أخـــرى مستلزمات انتاج</b></h4>
            <div class="form-group col-md-8">
                {!! Form::label('SourceS3', 'المصدر / المورديين') !!}
                {!! Form::text('SourceS3', $farmer->source->SourceS3 ?? null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('Counts3', 'الكميات/ موسم') !!}
                {!! Form::text('Counts3', $farmer->source->Counts3 ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    {!! Form::submit('حفظ', ['class' => 'btn btn-primary save']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::submit('حفظ واستمرار', ['class' => 'btn btn-default']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::submit('حفظ وانهاء', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
