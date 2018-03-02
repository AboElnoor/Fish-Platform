@extends('layouts.app')
@section('title') لوحة العضو @stop

@section('content')
<section class="Purchase-crop userprofile">
    <div class="container">
        <div class="row">
            <div class="tab">
                <div class="tab-wrapper">
                    <ul class="tabs">
                        <li>
                            <a href="#" data-toggle="tooltip" data-placement="left" title="بياناتي">
                                <i class="fa fa-info" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" data-placement="left" title="عروضي">
                                <i class="fa fa-table" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" data-placement="left" title="الرسائل">
                                <i class="fa fa-envelope-open" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- / tabs -->
                </div>
                <div class="tab_content">
                    <div class="tabs_item">
                        <div class="title centre">
                            <h2>بياناتي</h2>
                            <div class="row">
                                <img class="img-circle img-thumbnail block-center" src="images/user.png">
                            </div>
                        </div>
                        <table class="table-fill">
                            <tbody>
                                <tr>
                                    <td class="text-center">الاسم بالكامل</td>
                                    <td class="text-right">{{ $user->FullName }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">اسم المستخدم</td>
                                    <td class="text-right">{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">رقم الموبايل</td>
                                    <td class="text-right">{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">البريد الإلكتروني</td>
                                    <td class="text-right">{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center">مكان العمل</th>
                                </tr>
                                <tr>
                                    <td class="text-center">المحافظة</td>
                                    <td class="text-right">{{ $user->governorate->Governorate_Name_A ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">المركز</td>
                                    <td class="text-right">{{ $user->locality->Locality_Name_A ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center">أنواع الأسماك التي تهمك معرفة أسعارها وأفضل الممارسات</th>
                                </tr>
                                @foreach($user->hSCodes as $hSCode)
                                    <tr>
                                        <td class="text-center">النوع
                                            {{ ($loop->first ? 'الأول' : ($loop->last ? 'الثالث' : 'الثاني')) }}</td>
                                        <td class="text-right">{{ $hSCode->HS_Aname }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="padding20">
                            <a href="{{ route('users.edit', $user) }}" class="col-md-4 col-md-offset-4 btn btn-sm btn-primary">
                                <strong>تعديل</strong>
                            </a>
                        </div>
                    </div>
                    <!-- / tabs_item -->
                    <div class="tabs_item">
                        <div class="title centre">
                            <h2>عروضي</h2>
                        </div>
                        <div class="form-group overflow-h margin20">
                            <div class=" centre">
                                <label class="col-md-3 control-label reg-label">
                                العرض بواسطة:
                                </label>
                                <div class="checkbox user-checkbox ">
                                  <label><input type="checkbox" value="">الكل</label>
                                  <label><input type="checkbox" value="">سارية</label>
                                  <label><input type="checkbox" value="">منتهية</label>
                                </div>
                            </div>
                        </div>
                        <table class="table-fill">
                            <div class="table-title">
                                <h3>قائمة العروض </h3>
                            </div>
                            <thead>
                                <tr>
                                    <th class="text-center">العرض</th>
                                    <th class="text-center">نوع العرض</th>
                                    <th class="text-center">الصنف</th>
                                    <th class="text-center">الكميه</th>
                                    <th class="text-center">تاريخ العرض</th>
                                    <th class="text-center">تاريخ انتهاء العرض</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->markets as $market)
                                    <tr>
                                        <td class="text-center">{{ $market->buy_request ? 'شراء' : 'بيع' }}</td>
                                        <td class="text-center">{{ $market->hSCode ? 'اسماك' : 'مستلزمات انتاج' }}</td>
                                        <td class="text-center">
                                            {{ $market->hSCode->HS_Aname ?? $market->pType->name ?? '-' }}</td>
                                        <td class="text-center">{{ $market->amount }}</td>
                                        <td class="text-center ltr">{{ $market->user->startDate ?? '-' }}</td>
                                        <td class="text-center ltr">{{ $market->user->endDate ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route(
                                                ($market->hSCode ? 'markets' : 'ptools') . '.edit', $market) }}"
                                                class="btn btn-sm btn-primary">تعديل</a>
                                        </td>
                                        <td>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                    'route' => [
                                                        ($market->hSCode ? 'markets' : 'ptools') . '.destroy',
                                                        $market
                                                    ]
                                                ]) !!}
                                                {!! Form::submit('حذف', ['class' => 'btn btn-sm btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tabs_item">
                        <div class="title centre">
                            <h2>الرسائل</h2>
                        </div>
                        <table class="table-fill">

                            <tbody>
                                @foreach($user->requestedMarkets as $requestedMarket)
                                    <tr data-toggle="collapse" data-target="#accordion{{ $loop->index }}" class="clickable">
                                        <td colspan="3" class="title">
                                            {{ $requestedMarket->name ?? $requestedMarket->hSCode->HS_Aname }}</td>

                                    </tr>
                                    <tr  id="accordion{{ $loop->index }}" class="collapse">
                                        @foreach($requestedMarket->requesters as $requester)
                                            <td >
                                                <div>صاحب العرض : {{ $requester->FullName ?? '-' }}</div>
                                            </td>
                                            <td >
                                                <div>رقم التليفون : {{ $requester->phone ?? '-' }}</div>
                                            </td>
                                            <td>
                                                {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['markets.cancel', $market, $requester]
                                                    ]) !!}
                                                    {!! Form::submit('حذف', ['class' => 'btn btn-sm btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- / tabs_item -->
                </div>
                <!-- / tab_content -->
            </div>
            <!-- / tab -->
        </div>
    </div>
</section>
@endsection
