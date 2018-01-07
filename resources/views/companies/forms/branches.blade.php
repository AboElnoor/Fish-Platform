<div class="row farms">
    {!! Form::open(['route' => 'farms.store']) !!}

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Governorate_ID', ' (*)عنوان الفرع - المحافظة ') !!}
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
            {!! Form::label('Village_ID', 'المنطقة') !!}
            {!! Form::select('Village_ID', $villages, null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Address', 'موبايل') !!}
            {!! Form::textarea('Address', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('EstDate', '(*)تليفون') !!}
            {!! Form::text('EstDate', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('OwnerType', 'فاكـــس') !!}
            {!! Form::text('OwnerType', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('OwnerID', 'بريد الالكترونى') !!}
            {!! Form::text('OwnerID', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('FarmSize', 'موقع الاكترونى/مواقع تواصل اجتماعى') !!}
            {!! Form::text('FarmSize', null, ['class' => 'form-control']) !!}
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
