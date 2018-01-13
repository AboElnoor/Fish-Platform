<div class="row">
    {!!
        Form::open([
            'method' => isset($company) ? 'PUT' : 'POST',
            'route' => isset($company) ? [requestUri() . '.update', $company] : requestUri() . '.store',
        ])
    !!}
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('FishCompanyName', 'الاســـم') !!}
                {!! Form::text('FishCompanyName', $company->FishCompanyName ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('TradeMark', 'العلامة التجارية') !!}
                {!! Form::text('TradeMark', $company->TradeMark ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('ActivityType_ID[]', 'طبيعه العمل') !!}
                @foreach($types as $id => $type)
                    {!! Form::checkbox(
                            'ActivityType_ID[]', $id, $company->activitytypes->contains($id) ?? false
                        ) . $type !!}
                @endforeach
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('EYear', 'تاريخ الانشاء') !!}
                {!! Form::text('EYear', $company->EYear ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('EmpCount', 'عدد العاملين') !!}
                {!! Form::text('EmpCount', $company->EmpCount ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('RegNo', 'رقم السجل التجاري') !!}
                {!! Form::text('RegNo', $company->RegNo ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Activity', 'تفاصيل النشاط') !!}
                {!! Form::textarea('Activity', $company->Activity ?? null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
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
