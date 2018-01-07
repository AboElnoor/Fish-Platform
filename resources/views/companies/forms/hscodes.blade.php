<div class="row">
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('SourceS1', '(*)اصناف الاسماك') !!}
            @foreach($hscodes as $id => $hscode)
                {!! Form::checkbox('Village_ID', $id) . $hscode !!}
            @endforeach
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('SourceS1', '(*) انواع مستلزمات الانتاج التى يقدمها') !!}
            @foreach($hscodes as $id => $hscode)
                {!! Form::checkbox('Village_ID', $id) . $hscode !!}
            @endforeach
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('SourceS1', '(*) أهم انواع العملاء') !!}
            @foreach($hscodes as $id => $hscode)
                {!! Form::checkbox('Village_ID', $id) . $hscode !!}
            @endforeach
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Memer', 'اهم مناطق العمل') !!}
            {!! Form::textarea('Memer', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Memer', 'توكيلات تجارية') !!}
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
