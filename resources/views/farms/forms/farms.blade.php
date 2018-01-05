<div>
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="form-group">
        {!! Form::label('Governorate_ID', '(*)عنوان المزرعة - المحافظة') !!}
        {!! Form::select('Governorate_ID', [], [''=>''], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Locality_ID', '(*)مركز') !!}
        {!! Form::select('Locality_ID', [], [''=>''], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Village_ID', 'قرية') !!}
        {!! Form::select('Village_ID', [], [''=>''], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Address', 'تفاصيل العنوان') !!}
        {!! Form::text('Address', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('EstDate', 'تاريخ بداء النشاط') !!}
        {!! Form::text('EstDate', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('OwnerID', 'نوع الملكية') !!}
        {!! Form::text('OwnerID', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('OwnerID', 'نوع الملكية') !!}
        {!! Form::text('OwnerID', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('OwnerType', 'رقم الملكية') !!}
        {!! Form::text('OwnerType', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('FarmSize', 'مساحة المزرعة') !!}
        {!! Form::text('FarmSize', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('EmpA', 'عدد العاملين:عمالة دائمة') !!}
        {!! Form::text('EmpA', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('EmpB', 'عدد العاملين:عمالة مؤقته') !!}
        {!! Form::text('EmpB', null, ['class' => 'form-control']) !!}
    </div>


    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}

</div>
