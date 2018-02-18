@extends('layouts.app')
@section('title') {{ $market->buy_request ? 'طلب شراء' : 'عرض بيع' }} @stop

@section('content')
<section class="farms details">
   <div class="container">
      <div class="row">
         <div class="title "><h2>{{ $market->buy_request ? 'طلب شراء' : 'عرض بيع' }}</h2></div>
         <img class="product-img" src="{{ asset('storage/' . $market->photo) }}">
         <table class="table table-striped">
            <tbody>
               <tr>
                  <td>
                     <h4>كود العرض: </h4>
                  </td>
                  <td>
                     <h4><i>{{ $market->id }}</i></h4>
                  </td>
               </tr>
               <tr>
                  <td><h4>تاريخ بداية العرض: </h4></td>
                  <td><h4><i>{{ $market->user->startDate ?? '-' }}</i></h4></td>
               </tr>
               <tr>
                  <td>
                     <h4>تاريخ نهاية العرض: </h4>
                  </td>
                  <td>
                     <h4><i>{{ $market->user->endDate ?? '-' }}</i></h4>
                  </td>
               </tr>
            </tbody>
         </table>
         <div class="title "><h2>بيانات المزرعة</h2></div>

         <table class="table table-striped">
            <tbody>
               <tr>
                  <td><h4>نوع المزرعة:</h4></td>
                  <td>
                     <h4><i>{{ $market->type }}</i></h4>
                  </td>
               </tr>
               <tr>
                  <td>
                     <h4>الكمية المتوفرة:</h4>
                  </td>
                  <td>
                     <h4><i>{{ $market->amount }}</i></h4>
                  </td>
               </tr>
               <tr>
                  <td>
                     <h4>مكان انتاج المزرعة:</h4>
                  </td>
                  <td><h4><i>{{ $market->transport->governorate->Governorate_Name_A ?? '-' }}</i></h4></td>
               </tr>
               <tr>
                  <td>
                     <h4>تفاصيل أخرى: </h4>
                  </td>
                  <td>
                     <h4><i>-</i></h4>
                  </td>
               </tr>
               <tr>
                  <td>
                     <h4>النوع / الصنف: </h4>
                  </td>
                  <td>
                     <h4><i>{{ $market->hSCode->HS_Aname ?? $market->pType->name ?? '-' }}</i></h4>
                  </td>
               </tr>
               <tr>
                  <td>
                     <h4>المواصفات: </h4>
                  </td>
                  <td>
                     <h4><i>{{ $market->specs ?? '-' }}</i></h4>
                  </td>
               </tr>
            </tbody>
         </table>
         <a href="#" class="col-md-4 btn btn-primary">اتصل بصاحب العرض</a>
      </div>
   </div>
</section>
@stop
