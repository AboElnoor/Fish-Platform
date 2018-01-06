<div class="row">
    {!! Form::open(['route' => 'farms.store']) !!}

    @foreach($memberships as $membership)
        <div class="form-group">
            {!! Form::checkbox('Village_ID', $membership->Member_ID) . $membership->MemberNameAr !!}
        </div>
    @endforeach

    <div class="col-md-12">
        {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
