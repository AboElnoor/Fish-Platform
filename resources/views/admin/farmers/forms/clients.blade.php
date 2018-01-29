<div>
    {!! Form::open(['route' => ['admin.farmers.addClient', $farmer ?? session('farmer')]]) !!}
        <div class="form-group">
            <div>
                {!! Form::label('ClientTypes', 'من يقوم بشراء الانتاج منك ؟ (*)') !!}
            </div>
            {!! Form::checkbox('Factory', 1, $farmer->client->Factory ?? false) . 'مصانع' !!}
            {!! Form::checkbox('Supplier', 1, $farmer->client->Supplier ?? false) . 'مصدرين' !!}
            {!! Form::checkbox('Trader', 1, $farmer->client->Trader ?? false) . 'تجار تجزئة' !!}
            {!! Form::checkbox('Hotel', 1, $farmer->client->Hotel ?? false) . 'فنادق ومطاعم' !!}
            {!! Form::checkbox('WTrader', 1, $farmer->client->WTrader ?? false) . 'تجارة الجملة' !!}
            {!! Form::checkbox('School', 1, $farmer->client->School ?? false) . 'مدارس/مستشفيات' !!}
            {!! Form::checkbox('Strader', 1, $farmer->client->Strader ?? false) . 'سلاسل تجزئة' !!}
            {!! Form::checkbox('agent', 1, $farmer->client->agent ?? false) . 'وسطاء' !!}
            {!! Form::checkbox('other', 1, $farmer->client->other ?? false) . 'اخــرى' !!}
        </div>

        <div class="form-group">
            {!! Form::label('Clients', 'اذكر اهم أنواع العملاء') !!}
            {!! Form::textarea('Clients', $farmer->client->Clients ?? null, ['class' => 'form-control']) !!}
        </div>


        <div class="row">
            <div class="col-md-12">
                {!! Form::submit('حفظ وانهاء', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    {!! Form::close() !!}
</div>
