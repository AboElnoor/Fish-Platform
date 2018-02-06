@extends('layouts.app')
@section('content')
<section class="ask-expert">
    <div class="container">
        <div class="title centre">
            <h2>  - اسأل خبير -  </h2>
            <p class="ask-p">شبكة الأسماك بالتعاون مع المركز الدولي للأسماك تمكنك من التواصل مع افضل الخبراء في مجال الثروة السمكية، لعرض مشكلاتك عليهم واستقبال افضل الحلول لها
            </p>
        </div>
        <section class="form-registration">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-wrapper">
                            <form class="form-horizontal" action="" method="post">
                                <fieldset>
                                    <!-- Name input-->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">الموضوع:</label>
                                        <div class="col-md-8">
                                            <input id="name" name="name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <!-- Email input-->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="name">السؤال:</label>
                                        <div class="col-md-8">
                                            <textarea  rows="5" id="name" name="name" type="text"  class="form-control"></textarea> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <div class="col-md-12 fileUpload btn btn-sm btn-primary">
                                                <label for="photo">إضافة صورة</label> 
                                                <input name="photo" type="file" id="photo" class="upload" onchange="readURL(this);">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <img id="blah" src="images/1.png" alt="الصورة" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="submit" class="col-md-12 btn btn-primary btn-lg">إرسال</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="search">
                    <input class="searchTerm" placeholder="بحث في الأسئلة"><input class="searchButton" type="submit">
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th> اسئلة وإجابات الخبراء</th>
                </tr>
            </thead>
            <tbody>
                @php
                $experts = $experts->paginate(10);
                @endphp
                @foreach($experts as $expert)
                <tr data-toggle="collapse" data-target="#accordion{{ $loop->index+1 }}" class="clickable">
                    <td class="title">{{ $expert->question }}</td>
                    <!-- <td>{{  $expert->entryUser ? $expert->entryUser->FullName : '-' }}</td> -->
                </tr>
                <tr>
                    <td>
                        <div id="accordion{{ $loop->index+1 }}" class="collapse">{{ $expert->answer }}</div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $experts->links() }}
    </div>
</section>
@endsection