<div class="row farms">
    {!! Form::open([
            'route' => ['admin.' . requestUri() . '.addBranch', $company ?? session('company')],
            'class' => 'branches'
        ]) !!}
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Governorate_ID', ' (*)عنوان الفرع - المحافظة ') !!}
                {!! Form::select(
                        'Governorate_ID',
                        $governorates->prepend('من فضلك اختار', 0),
                        null,
                        ['class' => 'form-control Governorate_ID', 'data-url' => url('/localities')]
                    ) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Locality_ID', '(*)مركز') !!}
                {!! Form::select('Locality_ID', ['من فضلك اختار'], null, [
                    'class' => 'form-control Locality_ID', 'data-url' => url('/villages')]) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Village_ID', 'المنطقة') !!}
                {!! Form::select('Village_ID', ['من فضلك اختار'], null, ['class' => 'form-control Village_ID']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Address', 'تفاصيل العنوان') !!}
                {!! Form::textarea('Address', null, ['class' => 'form-control Address']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Mob', 'موبايل') !!}
                {!! Form::text('Mob', null, ['class' => 'form-control Mob']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Tel', '(*)تليفون') !!}
                {!! Form::text('Tel', null, ['class' => 'form-control Tel']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Fax', 'فاكـــس') !!}
                {!! Form::text('Fax', null, ['class' => 'form-control Fax']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Email', 'بريد الالكترونى') !!}
                {!! Form::text('Email', null, ['class' => 'form-control Email']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Web', 'موقع الاكترونى/مواقع تواصل اجتماعى') !!}
                {!! Form::text('Web', null, ['class' => 'form-control Web']) !!}
            </div>
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

    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>كود</th>
                    <th>المحافظة</th>
                    <th>المركز</th>
                    <th>القرية</th>
                    <th>تليفون</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @forelse($company->branches ?? session('company')->branches ?? [] as $branch)
                    <tr>
                        <td>{{ $branch->FishCompany_Branch_ID }}</td>
                        <td>{{ $branch->governorate ? $branch->governorate->Governorate_Name_A : '-' }}</td>
                        <td>{{ $branch->locality ? $branch->locality->Locality_Name_A : '-' }}</td>
                        <td>{{ $branch->village ? $branch->village->Village_Name_A : '-' }}</td>
                        <td>{{ $branch->Tel }}</td>
                        <td>
                            <a href="{{ route('admin.branches.edit', $branch) }}"
                                data-action="{{ route('admin.branches.update', $branch) }}"
                                data-form="branches" class="btn btn-sm btn-primary edit">تعديل</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.branches.destroy', $branch]]) !!}
                                {!! Form::submit('حذف', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">لا توجد نتائج لعرضها</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
