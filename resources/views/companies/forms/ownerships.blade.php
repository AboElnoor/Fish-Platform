<div class="row">
    {!! Form::open([
        'method' => 'PUT',
        'route' => [requestUri() . '.update', $company ?? session('company')]
        ]) !!}
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('ShareHoldr', 'مساهمين محليين') !!}
                {!! Form::textarea('ShareHoldr', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('ShareHoldrFrgn', 'مساهمين اجانب') !!}
                {!! Form::textarea('ShareHoldrFrgn', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('ComGroup', 'مجموعة الشركات التابع لها') !!}
                {!! Form::textarea('ComGroup', null, ['class' => 'form-control']) !!}
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
