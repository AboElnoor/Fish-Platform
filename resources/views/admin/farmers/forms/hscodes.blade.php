<div class="row farms">
    {!! Form::open(['route' => ['admin.farmers.addHSCode', $farmer ?? session('farmer')], 'class' => 'hSCodes']) !!}
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('HSCode_ID', 'انواع الاسماك (*)') !!}
                {!! Form::select(
                        'HSCode_ID',
                        $hscodes->prepend('من فضلك اختار', 0), null, ['class' => 'form-control HSCode_ID']
                    )
                !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('cropMonth', 'أشهر الحصاد (*)') !!}
                {!! Form::text('cropMonth', null, ['class' => 'form-control cropMonth']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Area', 'المساحة المستزرعه') !!}
                {!! Form::text('Area', null, ['class' => 'form-control Area']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('PoolCount', 'عدد الاحواض') !!}
                {!! Form::text('PoolCount', null, ['class' => 'form-control PoolCount']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('PoolAvrg', 'متوسط حجم الانتاج ') !!}
                {!! Form::text('PoolAvrg', null, ['class' => 'form-control PoolAvrg']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('Notes', 'ملاحظات') !!}
                {!! Form::text('Notes', null, ['class' => 'form-control Notes']) !!}
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
                    <th>نوع الســمك</th>
                    <th>اشهر الحصاد</th>
                    <th>المساحة</th>
                    <th>عدد الاحواض</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @forelse($farmer->hSCodes ?? session('farmer')->hSCodes ?? [] as $hSCode)
                    <tr>
                        <td>{{ $hSCode->pivot->FishFarmer_HSCode_ID }}</td>
                        <td>{{ $hSCode->HS_Aname }}</td>
                        <td>{{ $hSCode->pivot->cropMonth }}</td>
                        <td>{{ $hSCode->pivot->Area }}</td>
                        <td>{{ $hSCode->pivot->PoolCount }}</td>
                        <td>
                            <a href="{{ route('admin.hSCodes.edit', $hSCode->pivot->FishFarmer_HSCode_ID) }}"
                                data-action="{{ route('admin.hSCodes.update', $hSCode->pivot->FishFarmer_HSCode_ID) }}"
                                data-form="hSCodes" class="btn btn-sm btn-primary edit">تعديل</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.hSCodes.destroy', $hSCode]]) !!}
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
