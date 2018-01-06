<div class="row">
    {!! Form::open(['route' => 'farms.store']) !!}

    @foreach($banks as $bank)
        <div class="form-group">
            {!! Form::checkbox('Village_ID', $bank->Bank_ID) . $bank->Bank_Name_A !!}
        </div>
    @endforeach

    <div class="col-md-12">
        {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
