@extends('layouts.app')
@section('title') سوق {{ $type }}@stop

@section('content')
<section class="Purchase-crop">
    <div class="container">
        <div class="title centre">
            <h2>  - سوق {{ $type }} -  </h2>
            <p class="ask-p">
               في هذه الخدمة المتميزة من شبكة {{ $type }} وﻷول مرة يمكن إضافة طلبات شراء وعروض بيع {{ $type }} و التواصل مع أصحاب العروض والطلبات مباشرة ومجاناً.
           </p>
       </div>
       <div class="row">
        <div class="tab">
            <div class="tab-wrapper">
                <ul class="tabs">
                    <li><a href="#">شراء {{ $type }}</a></li>
                    <li><a href="#">بيع {{ $type }}</a></li>
                </ul> <!-- / tabs -->
            </div>
            <div class="tab_headings">
                <div class="tab_head">
                    <div class="col-md-12 text-center">
                        <a href="{{ route(requestUri() . '.create') }}?buy_request=1"
                            class=" col-md-4 col-md-offset-4 btn btn-primary">اضافة طلب شراء</a>
                    </div>
                    <p>
                        يمكنك البحث فى كل طلبات شراء {{ $type }} فى شبكة {{ $type }} واختيار ما يناسبك منها وبعد اختيار الطلب المناسب إضغط على زر اريد التواصل مع صاحب الطلب الموجود أسفل كل عرض وبذلك يمكنك التواصل مع صاحب الطلب.
                    </p>
                </div>
                <div class="tab_head">
                    <div class="col-md-12 text-center">
                        <a href="{{ route(requestUri() . '.create') }}"
                            class=" col-md-4 col-md-offset-4 btn btn-primary">اضافة عرض بيع</a>
                    </div>
                    <p>
                        يمكنك البحث فى كل عروض بيع {{ $type }} فى شبكة {{ $type }} واختيار ما يناسبك منها وبعد اختيار العرض المناسب إضغط على زر اريد التواصل مع صاحب العرض الموجود أسفل كل عرض وبذلك يمكنك التواصل مع صاحب العرض.
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group overflow-h margin20">
                <div class=" centre">
                    {!! Form::label(
                    'HSCode_ID', 'البحث :', ['class' => 'col-md-3 control-label reg-label']) !!}
                    {!! Form::select(
                    'HSCode_ID',
                    [
                        0 => 'من فضلك اختار',
                        1 => 'النوع الاول',
                        2 => 'النوع التاني',
                    ],
                    null,
                    ['class' => 'col-md-4 select-market filter']
                    ) !!}
                </div>
            </div>

            <div class="tab_content">
                <div class="tabs_item">
                    <table class="table-fill">
                        <div class="table-title">
                            <h3>احدث طلبات الشراء </h3>
                        </div>
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">نوع {{ $type }}</th>
                                <th class="text-center">الاسم</th>
                                <th class="text-center">تاريخ العرض</th>
                                <th class="text-center">الكميه</th>
                            </tr>
                        </thead>
                        @php
                        $buys = clone $markets;
                        $buys = $buys->where('buy_request', true)->paginate(10);
                        @endphp
                        <tbody class="table-hover">
                            @forelse($buys as $buy)
                            <tr onclick="window.location='{{ route(requestUri() . '.show', $buy) }}'">
                                <td class="td-img"><img class="pro-image"
                                    src="{{ asset('storage/' . $buy->photo) }}"></td>
                                    <td class="text-center">
                                        {{ @(requestUri() == 'markets' ? $buy->hSCode->HS_Aname : $buy->pType->name) ?? '-' }}
                                    </td>
                                    <td class="text-center">{{ $buy->pname }}</td>
                                    <td class="text-center">{{ $buy->user->startDate ?? '-' }}</td>
                                    <td class="text-center">{{ $buy->amount }}</td>
                                </tr>
                                @empty
                                    <tr colspan=3>ﻻ توجد بيانات لعرضها</tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $buys->links() }}
                    </div> <!-- / tabs_item -->

                    <div class="tabs_item">
                        <table class="table-fill">
                            <div class="table-title">
                                <h3>احدث عروض البيع </h3>
                            </div>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-center">نوع {{ $type }}</th>
                                    <th class="text-center">الاسم</th>
                                    <th class="text-center">تاريخ العرض</th>
                                    <th class="text-center">الكميه</th>
                                </tr>
                            </thead>
                            @php
                            $selles = $markets->whereNull('buy_request')
                            ->orWhere('buy_request', '<>', true)->paginate(10);
                            @endphp
                            <tbody class="table-hover">
                                @forelse($selles as $sell)
                                <tr onclick="window.location='{{ route(requestUri() . '.show', $sell) }}'">
                                    <td class="td-img"><img class="pro-image"
                                        src="{{ asset('storage/' . $sell->photo) }}"></td>
                                    <td class="text-center">
                                        {{ $sell->hSCode->HS_Aname ?? $sell->pType->name ?? '-' }}</td>
                                    <td class="text-center">{{ $sell->pname }}</td>
                                    <td class="text-center">{{ $sell->user->startDate ?? '-' }}</td>
                                    <td class="text-center">{{ $sell->amount }}</td>
                                </tr>
                                @empty
                                <tr colspan=3>ﻻ توجد بيانات لعرضها</tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $selles->links() }}
                    </div> <!-- / tabs_item -->
                </div> <!-- / tab_content -->
            </div> <!-- / tab -->
        </div>
    </div>
</section>
@endsection
