<div class="row">
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('FishCompanyType_ID', 'كــود') !!}
            {!! Form::text('FishCompanyType_ID', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('FishCompanyName', 'الاســـم') !!}
            {!! Form::text('FishCompanyName', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Village_ID', 'طبيعه العمل') !!}
            @foreach($types as $id => $type)
                {!! Form::checkbox('Village_ID', $id) . $type !!}
            @endforeach
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('TradeMark', 'العلامة التجارية') !!}
            {!! Form::textarea('TradeMark', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('EYear', 'تاريخ الانشاء') !!}
            {!! Form::text('EYear', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('EmpCount', 'عدد العاملين') !!}
            {!! Form::text('EmpCount', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('RegNo', 'رقم السجل التجاري') !!}
            {!! Form::text('RegNo', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Activity', 'تفاصيل النشاط') !!}
            {!! Form::text('Activity', null, ['class' => 'form-control']) !!}
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
