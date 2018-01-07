<div class="row farms">
    {!! Form::open(['route' => ['farmers.addHSCode', session('farmer')]]) !!}

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('HSCode_ID', 'انواع الاسماك (*)') !!}
            {!!
                Form::select(
                    'HSCode_ID',
                    array_merge(['من فضلك اختار'], $hscodes ?? []),
                    null,
                    ['class' => 'form-control']
                )
            !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('cropMonth', 'أشهر الحصاد (*)') !!}
            {!! Form::text('cropMonth', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Area', 'المساحة المستزرعه') !!}
            {!! Form::text('Area', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('PoolCount', 'عدد الاحواض') !!}
            {!! Form::text('PoolCount', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('PoolAvrg', 'متوسط حجم الانتاج ') !!}
            {!! Form::text('PoolAvrg', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Notes', 'ملاحظات') !!}
            {!! Form::text('Notes', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                {!! Form::submit('حفظ', ['class' => 'btn btn-primary']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::submit('حفظ والتالى', ['class' => 'btn btn-default']) !!}
            </div>
            <div class="col-md-4">
                {!! Form::submit('حفظ وانهاء', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>كود</th>
                    <th>المحافظة</th>
                    <th>المركز</th>
                    <th>القرية</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>7162</td>
                    <td>القاهرة</td>
                    <td>عابدين</td>
                    <td>محمد فريد</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">تعديل</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger">حذف</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {!! Form::close() !!}

</div>
