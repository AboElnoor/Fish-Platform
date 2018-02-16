@extends('layouts.app')
@section('title') اسعار الأسماك @stop

@section('content')
<section class="Purchase-crop">
    <div class="container">
        <div class="title centre">
            <h2>  - اسعار الأسماك -  </h2>
            <p class="ask-p">
                الأسعار: شبكة الأسماك بالتعاون مع سوق العبور وبورصة أسماك كفر الشيخ تقدم أسعار أسواق الجملة يوميا
            </p>
        </div>
        <div class="row">
            <div class="tab">
                <div class="tab-wrapper col-md-12">
                    <h3 class="prices-fish">أسعار الأسماك يوم 03/02/2018</h3>
                </div>
                <form action="" class="col-md-12">
                    <div class="form-group overflow-h padding20">
                        <div class=" centre">
                            <label class="col-md-2 control-label reg-label padding10" for="market">
                            السوق:
                            </label>
                            <select class="col-md-4 select-market" id="market">
                                <option value="market1">سوق العبور</option>
                                <option value="market2">سوق كفر الشيخ</option>
                            </select>
                        </div>
                    </div>
                </form>
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
