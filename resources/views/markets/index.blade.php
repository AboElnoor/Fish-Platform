@extends('layouts.app')

@section('content')
<section class="Purchase-crop">
    <div class="container">
        <div class="title centre">
            <h2>  - سوق الاسماك -  </h2>
            <p class="ask-p">
					في هذه الخدمة المتميزة من شبكة الأسماك وﻷول مرة يمكن إضافة طلبات الشراء وعروض البيع و التواصل مع أصحاب العروض والطلبات مباشرة ومجاناً.
			</p>
        </div>
        <div class="row">
            <div class="tab">
                <div class="tab-wrapper">
                    <ul class="tabs">
                        <li><a href="#">شراء الأسماك</a></li>
                        <li><a href="#">بيع الاسماك</a></li>
                    </ul> <!-- / tabs -->
                </div>
                <div class="col-md-12 text-center">
    				<a href="add-offer.html" class=" col-md-4 col-md-offset-4 btn btn-primary">اضافة طلب شراء</a>
    			</div>
                <p>يمكنك البحث فى كل عروض بيع الأسماك فى شبكة الأسماك واختيار ما يناسبك منها وبعد اختيار العرض المناسب  إضغط على زر اريد التواصل مع صاحب العرض الموجود أسفل كل عرض وبذلك سيتم ارسال بياناتك الى صاحب العرض للتواصل معك.
                </p>
                <div class="clearfix"></div>
    			<div class="form-group overflow-h margin20">
                    <div class=" centre">
                        <label class="col-md-3 control-label reg-label" for="name">
                        البحث بنوع الأسماك:
                    </label>
                        <select class="col-md-4 select-market" id="type1">
                          <option value="type1">النوع الأول </option>
                          <option value="type2">النوع الثاني</option>
                          <option value="type3">النوع الثالث</option>
                          <option value="type4">النوع الرابع</option>
                        </select>
                    </div>
                </div>

                <div class="tab_content">
                    <div class="tabs_item">
                        <table class="table-fill">
                            <div class="table-title">
                                <h3>احدث عروض الشراء </h3>
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
                            {{-- {{ dd($buys) }} --}}
                            <tbody class="table-hover">
                                @forelse($buys as $buy)
                                    <tr onclick="window.location='{{ route('markets.show', $buy) }}'">
                                        <td class="td-img"><img class="pro-image" src="images/product.jpg"></td>
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
                                    <tr onclick="window.location='{{ route('markets.show', $sell) }}'">
                                        <td class="td-img"><img class="pro-image" src="images/product.jpg"></td>
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
