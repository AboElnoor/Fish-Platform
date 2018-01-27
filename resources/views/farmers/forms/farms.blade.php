<div class="row farms">
    {!! Form::open([
            'route' => ['farmers.addFarm', $farmer ?? session('farmer')], 'class' => 'farms']) !!}
        <div class="form-group">
            {!! Form::label('Governorate_ID', '(*)عنوان المزرعة - المحافظة') !!}
            {!! Form::select(
                    'Governorate_ID',
                    $governorates->prepend('من فضلك اختار', 0),
                    null,
                    ['class' => 'form-control Governorate_ID', 'data-url' => url('/localities')]
                ) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Locality_ID', '(*)مركز') !!}
            {!! Form::select('Locality_ID', ['من فضلك اختار'], null, [
                'class' => 'form-control Locality_ID', 'data-url' => url('/villages')]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Village_ID', 'قرية') !!}
            {!! Form::select('Village_ID', ['من فضلك اختار'], null, ['class' => 'form-control Village_ID']) !!}
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Address', 'تفاصيل العنوان') !!}
                {!! Form::textarea('Address', null, ['class' => 'form-control Address']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('EstDate', 'تاريخ بداء النشاط') !!}
                {!! Form::text('EstDate', null, ['class' => 'form-control EstDate']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('OwnerType', 'نوع الملكية') !!}
                {!! Form::text('OwnerType', null, ['class' => 'form-control OwnerType']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('OwnerID', 'رقم الملكية') !!}
                {!! Form::text('OwnerID', null, ['class' => 'form-control OwnerID']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('FarmSize', 'مساحة المزرعة') !!}
                {!! Form::text('FarmSize', null, ['class' => 'form-control FarmSize']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('EmpA', 'عدد العاملين:عمالة دائمة') !!}
                {!! Form::text('EmpA', null, ['class' => 'form-control EmpA']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('EmpB', 'عدد العاملين:عمالة مؤقته') !!}
                {!! Form::text('EmpB', null, ['class' => 'form-control EmpB']) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    {!! Form::submit('حفظ', ['class' => 'btn btn-primary save']) !!}
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
                @forelse($farmer->farms ?? session('farmer')->farms ?? [] as $farm)
                    <tr>
                        <td>{{ $farm->FishFarm_ID }}</td>
                        <td>{{ $farm->governorate ? $farm->governorate->Governorate_Name_A : '-' }}</td>
                        <td>{{ $farm->locality ? $farm->locality->Locality_Name_A : '-' }}</td>
                        <td>{{ $farm->village ? $farm->village->Village_Name_A : '-' }}</td>
                        <td>
                            <a href="{{ route('farms.edit', $farm) }}" class="btn btn-sm btn-primary edit"
                                data-action="{{ route('farms.update', $farm) }}"  data-form="farms">تعديل</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['farms.destroy', $farm]]) !!}
                                {!! Form::submit('حذف', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">لا توجد نتائج لعرضها</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
