<div>
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="form-group">
        <div>
            {!! Form::label('Clients', 'من يقوم بشراء الانتاج منك ؟ (*)') !!}
        </div>
        {!! Form::checkbox('Factory', 1). 'مصانع' !!}
        {!! Form::checkbox('Supplier', 1). 'مصدرين' !!}
        {!! Form::checkbox('Trader', 1). 'تجار تجزئة' !!}
        {!! Form::checkbox('Hotel', 1). 'فنادق ومطاعم' !!}
        {!! Form::checkbox('WTrader', 1). 'تجارة الجملة' !!}
        {!! Form::checkbox('School', 1). 'مدارس/مستشفيات' !!}
        {!! Form::checkbox('Strader', 1). 'سلاسل تجزئة' !!}
        {!! Form::checkbox('agent', 1). 'وسطاء' !!}
        {!! Form::checkbox('other', 1). 'اخــرى' !!}
    </div>

    <div class="form-group">
        {!! Form::label('Clients', 'اذكر اهم أنواع العملاء') !!}
        {!! Form::textarea('Clients', null, ['class' => 'form-control']) !!}
    </div>


    <div class="row">
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

    {!! Form::close() !!}

</div>