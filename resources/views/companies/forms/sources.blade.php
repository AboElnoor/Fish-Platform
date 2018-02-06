<div class="row">
    {!! Form::open(['route' => [
            requestUri() . '.addSource', $company ?? session('company')
        ]]) !!}
        <div class="col-md-12">
            <h4>
                <b>
                    @if(requestUri() == 'companies')
                        أمهات للتفريخ
                    @else
                        أسماك
                    @endif
                </b>
            </h4>
            <div class="form-group col-md-8">
                {!! Form::label('SourceS1', 'المصدر / المورديين') !!}
                {!! Form::text('SourceS1', $company->source->SourceS1 ?? null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('Counts1', 'الكميات/ موسم') !!}
                {!! Form::text('Counts1', $company->source->Counts1 ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <h4>
                <b>
                    @if(requestUri() == 'companies')
                        أعلاف
                    @else
                        مستلزمات تصنيع
                    @endif
                </b>
            </h4>
            <div class="form-group col-md-8">
                {!! Form::label('SourceS2', 'المصدر / المورديين') !!}
                {!! Form::text('SourceS2', $company->source->SourceS2 ?? null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('Counts2', 'الكميات/ موسم') !!}
                {!! Form::text('Counts2', $company->source->Counts2 ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <h4>
                <b>
                    @if(requestUri() == 'companies')
                        خامات أعلاف
                    @else
                        اخرى
                    @endif
                </b>
            </h4>
            <div class="form-group col-md-8">
                {!! Form::label('SourceS3', 'المصدر / المورديين') !!}
                {!! Form::text('SourceS3', $company->source->SourceS3 ?? null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('Counts3', 'الكميات/ موسم') !!}
                {!! Form::text('Counts3', $company->source->Counts3 ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        @if(requestUri() == 'companies')
            <div class="col-md-12">
                <h4><b>مستلزمات تربيه وتفريخ</b></h4>
                <div class="form-group col-md-8">
                    {!! Form::label('SourceS4', 'المصدر / المورديين') !!}
                    {!! Form::text('SourceS4', $company->source->SourceS4 ?? null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('Counts4', 'الكميات/ موسم') !!}
                    {!! Form::text('Counts4', $company->source->Counts4 ?? null, ['class' => 'form-control']) !!}
                </div>
            </div>
        @endif

        <div class="col-md-12">
            {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
</div>
