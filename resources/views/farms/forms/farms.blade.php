<div class="row farms">
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Governorate_ID', '(*)عنوان المزرعة - المحافظة') !!}
            {!! Form::select('Governorate_ID', $governorates, null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Locality_ID', '(*)مركز') !!}
            {!! Form::select('Locality_ID', $locals, null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Village_ID', 'قرية') !!}
            {!! Form::select('Village_ID', $villages, null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Address', 'تفاصيل العنوان') !!}
            {!! Form::textarea('Address', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('EstDate', 'تاريخ بداء النشاط') !!}
            {!! Form::text('EstDate', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('OwnerType', 'نوع الملكية') !!}
            {!! Form::text('OwnerType', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('OwnerID', 'رقم الملكية') !!}
            {!! Form::text('OwnerID', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('FarmSize', 'مساحة المزرعة') !!}
            {!! Form::text('FarmSize', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('EmpA', 'عدد العاملين:عمالة دائمة') !!}
            {!! Form::text('EmpA', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('EmpB', 'عدد العاملين:عمالة مؤقته') !!}
            {!! Form::text('EmpB', null, ['class' => 'form-control']) !!}
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
