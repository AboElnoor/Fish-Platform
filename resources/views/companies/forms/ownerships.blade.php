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

    <div class="col-md-12">
        {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}

</div>
