<div class="row">
    {!! Form::open(['route' => 'farms.store']) !!}

    @foreach($memberships as $membership)
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::checkbox('Village_ID', $membership->Member_ID) . $membership->MemberNameAr !!}
            </div>
        </div>
    @endforeach

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
