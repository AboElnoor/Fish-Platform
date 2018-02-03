@extends('layouts.app')

@section('content')
<section class="Purchase-crop">
    <div class="container">
        <div class="title centre">
            <h2>  - اسعار الأسماك -  </h2>
        </div>
        <div class="row">
            <div class="tab">
                <p>نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث نشر عروض البيع و الشراء للمحاصيل البستانية و مستلزمات الإنتاج مع امكانية البحث</p>
                <div class="tab_content">
                    <div class="tabs_item">
                        <table class="table-fill">
                            <div class="table-title">
                                <h3>الأسعار</h3>
                            </div>
                            <thead>
                                <tr>
                                    <th class="text-center">نوع الأسماك</th>
                                    <th class="text-center">السعر المتداول</th>
                                    <th class="text-center">أقل سعر</th>
                                    <th class="text-center">أعلى سعر</th>
                                </tr>
                            </thead>
                            <tbody class="table-hover">
                                @foreach($prices as $price)
                                    <tr>
                                        <td class="text-center">{{ $price->hSCode->HS_Aname }}</td>
                                        <td class="text-center">{{ $price->PriceAverage }}</td>
                                        <td class="text-center">{{ $price->PriceMin }}</td>
                                        <td class="text-center">{{ $price->PriceMax }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $prices->links() }}
                    </div> <!-- / tabs_item -->
                </div> <!-- / tab_content -->
            </div> <!-- / tab -->
        </div>
    </div>
</section>
@endsection
