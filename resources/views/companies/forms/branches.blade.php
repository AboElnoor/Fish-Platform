<div class="row">
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="form-group">
        {!! Form::label('Governorate_ID', ' (*)عنوان الفرع - المحافظة ') !!}
        {!! Form::select('Governorate_ID', $governorates, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Locality_ID', '(*)مركز') !!}
        {!! Form::select('Locality_ID', $locals, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Village_ID', 'المنطقة') !!}
        {!! Form::select('Village_ID', $villages, null, ['class' => 'form-control']) !!}
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Address', 'موبايل') !!}
            {!! Form::textarea('Address', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('EstDate', '(*)تليفون') !!}
            {!! Form::text('EstDate', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('OwnerType', 'فاكـــس') !!}
            {!! Form::text('OwnerType', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('OwnerID', 'بريد الالكترونى') !!}
            {!! Form::text('OwnerID', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('FarmSize', 'موقع الاكترونى/مواقع تواصل اجتماعى') !!}
            {!! Form::text('FarmSize', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
