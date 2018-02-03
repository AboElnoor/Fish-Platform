@extends('layouts.app')

@section('content')
<section class="Purchase-crop">
    <div class="container">
        <div class="title centre">
            <h2>  - سوق الاسماك -  </h2>
        </div>
        <div class="row">
            <div class="tab">
                <div class="tab-wrapper">
                    <ul class="tabs">
                        <li><a href="#">شراء المحاصيل</a></li>
                        <li><a href="#">بيع المحاصيل</a></li>
                    </ul> <!-- / tabs -->
                </div>
                <p>نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث</p>
                <div class="tab_content">
                    <div class="tabs_item">
                        <div class="text-center">
                            <a href="add-offer.html" class="btn btn-primary">اضافة طلب شراء</a>
                        </div>
                        <table class="table-fill">
                            <div class="table-title">
                                <h3>احدث عروض الشراء </h3>
                            </div>
                            <thead>
                                <tr>
                                    <th class="text-center">المحصول</th>
                                    <th class="text-center">تاريخ العرض</th>
                                    <th class="text-center">الكميه</th>
                                </tr>
                            </thead>
                            @php
                                $buys = clone $markets;
                                $buys = $buys->where('buy_request', true)->paginate(10);
                            @endphp
                            {{-- {{ dd($buys) }} --}}
                            <tbody class="table-hover">
                                @forelse($buys as $buy)
                                    <tr>
                                        <td class="text-center">{{ $buy->hSCode->HS_Aname ?? '-' }}</td>
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
                        <div class="text-center">
                            <a href="add-offer.html" class="btn btn-primary">اضافة عرض بيع</a>
                        </div>
                        <table class="table-fill">
                            <div class="table-title">
                                <h3>احدث عروض البيع </h3>
                            </div>
                            <thead>
                                <tr>
                                    <th class="text-center">المحصول</th>
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
                                    <tr>
                                        <td class="text-center">{{ $sell->hSCode->HS_Aname ?? '-' }}</td>
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
