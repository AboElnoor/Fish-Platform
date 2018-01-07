<div class="row">
    {!! Form::open(['route' => 'farmers.store']) !!}

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Memer', 'مساهمين محليين') !!}
            {!! Form::textarea('Memer', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Memer', 'مساهمين اجانب') !!}
            {!! Form::textarea('Memer', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Memer', 'مجموعة الشركات التابع لها') !!}
            {!! Form::textarea('Memer', null, ['class' => 'form-control']) !!}
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
