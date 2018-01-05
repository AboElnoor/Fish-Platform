<div>
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="form-group">
        {!! Form::label('HSCode_ID', 'انواع الاسماك (*)') !!}
        {!! Form::select('HSCode_ID', [], [''=>''], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cropMonth', 'أشهر الحصاد (*)') !!}
        {!! Form::text('cropMonth', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Area', 'المساحة المستزرعه') !!}
        {!! Form::text('Area', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('PoolCount', 'عدد الاحواض') !!}
        {!! Form::text('PoolCount', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('PoolAvrg', 'متوسط حجم الانتاج ') !!}
        {!! Form::text('PoolAvrg', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Notes', 'ملاحظات') !!}
        {!! Form::text('Notes', null, ['class' => 'form-control']) !!}
    </div>


    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

    {!! Form::close() !!}

</div>
