<div class="row">
    {!! Form::open(['route' => [
            requestUri() . '.addMembership', $company ?? session('company')
        ]]) !!}
        @foreach($memberships as $id => $membership)
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::checkbox(
                            'Member_ID[]', $id, isset($company) ? $company->memberships->contains($id) : false
                        ) . $membership !!}
                </div>
            </div>
        @endforeach

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    {!! Form::submit('حفظ', ['class' => 'btn btn-primary save']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::submit('حفظ واستمرار', ['class' => 'btn btn-default next']) !!}
                </div>
                <div class="col-md-4">
                    {!! Form::submit('حفظ وانهاء', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
