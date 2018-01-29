<div class="row">
    {!! Form::open(['route' => [
            'admin.' . requestUri() . '.addHSCode', $company ?? session('company')
        ]]) !!}
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('HSCode_ID[]', '(*)اصناف الاسماك') !!}
                @foreach($hscodes as $id => $hscode)
                    {!! Form::checkbox(
                            'HSCode_ID[]', $id, isset($company) ? $company->hSCodes->contains($id) : false
                        ) . $hscode !!}
                @endforeach
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('ClntSplr_ID[]', '(*) انواع مستلزمات الانتاج التى يقدمها') !!}
                @foreach($clntsplrs as $id => $clntsplr)
                    {!! Form::checkbox(
                            'ClntSplr_ID[]', $id, isset($company) ? $company->clntSplrs->contains($id) : false
                        ) . $clntsplr !!}
                @endforeach
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('ClntSplr_ID[]', '(*) أهم انواع العملاء') !!}
                @foreach($impClnts as $id => $impClnt)
                    {!! Form::checkbox(
                            'ClntSplr_ID[]', $id, isset($company) ? $company->clntSplrs->contains($id) : false
                        ) . $impClnt !!}
                @endforeach
            </div>
        </div>

        @if(requestUri() == 'companies')
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('WrkArea', 'اهم مناطق العمل') !!}
                    {!! Form::textarea('WrkArea', $company->WrkArea ?? null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('tradMarks', 'توكيلات تجارية') !!}
                    {!! Form::textarea('tradMarks', $company->tradMarks ?? null, ['class' => 'form-control']) !!}
                </div>
            </div>
        @endif

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
