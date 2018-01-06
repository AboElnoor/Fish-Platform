<div class="row">
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="form-group">
        {!! Form::label('Governorate_ID', '(*)عنوان المزرعة - المحافظة') !!}
        {!! Form::select('Governorate_ID', $governorates, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Locality_ID', '(*)مركز') !!}
        {!! Form::select('Locality_ID', $locals, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Village_ID', 'قرية') !!}
        {!! Form::select('Village_ID', $villages, null, ['class' => 'form-control']) !!}
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Address', 'تفاصيل العنوان') !!}
            {!! Form::textarea('Address', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('EstDate', 'تاريخ بداء النشاط') !!}
            {!! Form::text('EstDate', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('OwnerType', 'نوع الملكية') !!}
            {!! Form::text('OwnerType', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('OwnerID', 'رقم الملكية') !!}
            {!! Form::text('OwnerID', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('FarmSize', 'مساحة المزرعة') !!}
            {!! Form::text('FarmSize', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('EmpA', 'عدد العاملين:عمالة دائمة') !!}
            {!! Form::text('EmpA', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('EmpB', 'عدد العاملين:عمالة مؤقته') !!}
            {!! Form::text('EmpB', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
