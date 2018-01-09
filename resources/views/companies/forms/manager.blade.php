<div class="row farms">
    {!! Form::open(['route' => ['companies.addManager', $company ?? session('company')]]) !!}

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('EmpName', '(*)الاســـم') !!}
            {!! Form::text('EmpName', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Job', '(*)المنصب') !!}
            {!! Form::text('Job', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Mob', '(*)موبايل') !!}
            {!! Form::text('Mob', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Email', 'بريد الالكترونى') !!}
            {!! Form::text('Email', null, ['class' => 'form-control']) !!}
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
                    <th>الاســــم</th>
                    <th>الوظيفة</th>
                    <th>الموبايل</th>
                    <th>بريد الالكترونى</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @forelse($company->managers ?? session('company')->managers ?? [] as $manager)
                    <tr>
                        <td>{{ $manager->FishCompany_Mangr_ID }}</td>
                        <td>{{ $manager->EmpName }}</td>
                        <td>{{ $manager->Job }}</td>
                        <td>{{ $manager->Mob }}</td>
                        <td>{{ $manager->Email }}</td>
                        <td>
                            <a href="{{ route('managers.edit', $manager) }}" class="btn btn-sm btn-primary">تعديل</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['managers.destroy', $manager]]) !!}
                                {!! Form::submit('حذف', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">لا توجد نتائج لعرضها</td>
                    </tr>
                @endforelse
        </table>
    </div>

    {!! Form::close() !!}

</div>
