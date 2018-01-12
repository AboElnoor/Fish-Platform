<div class="row">
    {!! Form::open(['route' => [
            requestUri() . '.addHSCode', $company ?? session('company')
        ]]) !!}
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('HSCode_ID[]', '(*)اصناف الاسماك') !!}
                @foreach($hscodes as $id => $hscode)
                    {!! Form::checkbox('HSCode_ID[]', $id) . $hscode !!}
                @endforeach
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('ClntSplr_ID[]', '(*) انواع مستلزمات الانتاج التى يقدمها') !!}
                @foreach($clntsplrs as $id => $clntsplr)
                    {!! Form::checkbox('ClntSplr_ID[]', $id) . $clntsplr !!}
                @endforeach
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('ClntSplr_ID[]', '(*) أهم انواع العملاء') !!}
                @foreach($impClnts as $id => $impClnt)
                    {!! Form::checkbox('ClntSplr_ID[]', $id) . $impClnt !!}
                @endforeach
            </div>
        </div>

        @if(requestUri() == 'companies')
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('WrkArea', 'اهم مناطق العمل') !!}
                    {!! Form::textarea('WrkArea', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('tradMarks', 'توكيلات تجارية') !!}
                    {!! Form::textarea('tradMarks', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        @endif

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
