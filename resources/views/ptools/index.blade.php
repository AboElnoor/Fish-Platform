@extends('layouts.app')
@section('title') سوق مستلزمات الإنتاج @stop

@section('content')
<section class="Purchase-crop">
    <div class="container">
        <div class="title centre">
            <h2>   - سوق مستلزمات الإنتاج -   </h2>
            <p class="ask-p">
               في هذه الخدمة المتميزة من شبكة الأسماك وﻷول مرة يمكن إضافة طلبات شراء وعروض بيع مستلزمات إنتاج الأسماك و التواصل مع أصحاب العروض والطلبات مباشرة ومجاناً.
           </p>
       </div>
       <div class="row">
        <div class="tab">
            <div class="tab-wrapper">
                <ul class="tabs">
                    <li><a href="#">شراء مستلزمات الانتاج</a></li>
                    <li><a href="#">بيع مستلزمات الانتاج</a></li>
                </ul> <!-- / tabs -->
            </div>
            <div class="tab_headings">
                <div class="tab_head">
                    <div class="col-md-12 text-center">
                        <a href="#" class=" col-md-4 col-md-offset-4 btn btn-primary">اضافة طلب شراء</a>
                    </div>
                    <p>
                        يمكنك البحث فى كل  طلبات شراء مستلزمات الإنتاج فى شبكة الأسماك واختيار ما يناسبك منها وبعد اختيار الطلب المناسب إضغط على زر اتصل بصاحب الطلب الموجود في كل عرض لتتواصل مع صاحب الطلب.
                    </p>
                </div>
                <div class="tab_head">
                    <div class="col-md-12 text-center">
                        <a href="#" class=" col-md-4 col-md-offset-4 btn btn-primary">اضافة عرض بيع</a>
                    </div>
                    <p>
                        يمكنك البحث فى كل  عروض بيع مستلزمات الإنتاج فى شبكة الأسماك واختيار ما يناسبك منها وبعد اختيار العرض المناسب إضغط على زر اتصل بصاحب العرض الموجود في كل عرض لتتواصل مع صاحب العرض
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group overflow-h margin20">
                <div class=" centre">
                    {!! Form::label(
                    'type', 'البحث بنوع المنتج:', ['class' => 'col-md-3 control-label reg-label']) !!}
                    {!! Form::select(
                    'type',
                    [
                    0 => 'من فضلك اختار',
                    1 => 'النوع الاول',
                    2 => 'النوع التاني',
                    ],
                    null,
                    ['class' => 'col-md-4 select-market']
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
                                <th class="text-center">نوع الأسماك</th>
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
                            <tr onclick="window.location='{{ route('ptools.show', $buy) }}'">
                                <td class="td-img"><img class="pro-image"
                                    src="{{ asset('storage/' . $buy->photo) }}"></td>
                                    <td class="text-center">{{ $buy->category->name ?? '-' }}</td>
                                    <td class="text-center">{{ $buy->startDate }}</td>
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
                                    <th class="text-center">نوع الأسماك</th>
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
                                <tr onclick="window.location='{{ route('ptools.show', $sell) }}'">
                                    <td class="td-img"><img class="pro-image"
                                        src="{{ asset('storage/' . $sell->photo) }}"></td>
                                        <td class="text-center">{{ $sell->category->name ?? '-' }}</td>
                                        <td class="text-center">{{ $sell->startDate }}</td>
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
