@extends('layouts.app')
@section('title') {{ $ptool->buy_request ? 'طلب شراء' : 'عرض بيع' }} @stop

@section('content')
<section class="farms details">
   <div class="container">
      <div class="row">
         <div class="title "><h2>{{ $ptool->buy_request ? 'طلب شراء' : 'عرض بيع' }}</h2></div>
         <img class="product-img" src="{{ asset('storage/' . $ptool->photo) }}">
         <table class="table table-striped">
            <tbody>
               <tr>
                  <td>
                     <h4>كود العرض: </h4>
                  </td>
                  <td>
                     <h4><i>{{ $ptool->id }}</i></h4>
                  </td>
               </tr>
               <tr>
                  <td><h4>تاريخ بداية العرض: </h4></td>
                  <td><h4><i>{{ $ptool->startDate }}</i></h4></td>
               </tr>
               <tr>
                  <td>
                     <h4>تاريخ نهاية العرض: </h4>
                  </td>
                  <td>
                     <h4><i>{{ $ptool->endDate }}</i></h4>
                  </td>
               </tr>
            </tbody>
         </table>
         <div class="title "><h2>بيانات المنتج</h2></div>

         <table class="table table-striped">
            <tbody>
               <tr>
                  <td><h4>نوع المنتج:</h4></td>
                  <td>
                     <h4><i>{{ $ptool->category->name }}</i></h4>
                  </td>
               </tr>
               <tr>
                  <td><h4>اسم المنتج:</h4></td>
                  <td>
                     <h4><i>{{ $ptool->name }}</i></h4>
                  </td>
               </tr>
               <tr>
                  <td>
                     <h4>الكمية المتوفرة:</h4>
                  </td>
                  <td>
                     <h4><i>{{ $ptool->amount }}</i></h4>
                  </td>
               </tr>
               <tr>
                  <td>
                     <h4>الوصف:</h4>
                  </td>
                  <td>
                     <h4><i>{{ $ptool->description }}</i></h4>
                  </td>
               </tr>
            </tbody>
         </table>
         <a href="#" class="col-md-4 btn btn-primary">اتصل بصاحب العرض</a>
      </div>
   </div>
</section>
@stop
