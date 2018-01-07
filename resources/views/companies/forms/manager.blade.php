<div class="row farms">
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('SourceS1', '(*)الاســـم') !!}
            {!! Form::text('SourceS1', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Counts1', '(*)المنصب') !!}
            {!! Form::text('Counts1', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('SourceS2', '(*)موبايل') !!}
            {!! Form::text('SourceS2', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Counts2', 'بريد الالكترونى') !!}
            {!! Form::text('Counts2', null, ['class' => 'form-control']) !!}
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

    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>كود</th>
                    <th>نوع الســمك</th>
                    <th>اشهر الحصاد</th>
                    <th>المساحة</th>
                    <th>عدد الاحواض</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>7612</td>
                    <td>دومى تيكست</td>
                    <td>دومى تيكست</td>
                    <td>دومى تيكست</td>
                    <td>دومى تيكست</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">تعديل</a>
                    </td>
                    <td>
                        {!! Form::submit('حذف', ['class' => 'btn btn-sm btn-danger']) !!}
                    </td>
                </tr>
                {{-- <tr>
                    <td colspan="7">لا توجد نتائج لعرضها</td>
                </tr> --}}
            </tbody>
        </table>
    </div>

    {!! Form::close() !!}

</div>
