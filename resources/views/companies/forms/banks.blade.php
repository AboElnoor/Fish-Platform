<div class="row">
    {!! Form::open(['route' => [requestUri() . '.addBanks', $company ?? session('company')]]) !!}
        <div class="col-md-12">
            @foreach($banks as $id => $bank)
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::checkbox(
                                'Bank_ID[]', $id, isset($company) ? $company->banks->contains($id) : false) . $bank !!}
                    </div>
                </div>
            @endforeach
        </div>

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
