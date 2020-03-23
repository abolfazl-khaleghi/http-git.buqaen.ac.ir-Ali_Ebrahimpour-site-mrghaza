@extends('layouts.base')

@section('body')
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div style="width: auto!important;" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">مشاهده منو</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img style="height: 900px;width:900px;"  src="<?= Url( $restaurant->menu )?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>



    <!-- results -->
    <br>
    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="bg-white border rounded-xlg p-3 dir-rtl text-right shadow-sm" style="font-size: 0.85rem;">
          <span>{{$restaurant->name}}
            <a href="#">(مشاهده صفحه فروشنده)</a>
          </span>

                    <div class="border-bottom pr-0 py-4 row">
                        <div class="col-md-6">
                            <img src="<?= Url('images/svg/time.svg')?>" class="ml-2"
                                 style="height: 24px; opacity: 25%;">ساعت سرویس‌دهی:
                            <br>با هماهنگی
                        </div>
                        <div class="col-md-6">
                            <img src="<?= Url('images/svg/calendar.svg')?>" class="ml-2"
                                 style="height: 24px; opacity: 25%;">روزهای سرویس‌دهی:
                            <br>با هماهنگی
                        </div>
                    </div>

                    <div class="border-bottom pr-0 py-4 row">
                        <div class="col-12">
                            <img src="<?= Url('images/svg/call.svg')?>" class="ml-2"
                                 style="height: 24px; opacity: 25%;">شماره تلفن {{$restaurant->name}}:
                            {{$restaurant->phone}}
                        </div>
                    </div>

                    <div class="border-bottom pr-0 py-4 row">
                        <div class="col-12">
                            <img src="<?= Url('images/svg/pin.svg')?>" class="ml-2"
                                 style="height: 24px; opacity: 25%;">{{$restaurant->address}}
                        </div>
                    </div>

                    <div class="pr-0 py-4 row">
                        <div class="col-12">
                            <img src="<?= Url('images/svg/warning.svg')?>" class="ml-2"
                                 style="height: 24px; opacity: 25%;">درصورتیکه تخلفی از
                            فروشندگان مشاهده
                            کردید لطفا با ما در میان بگذارید:
                            <button class="btn btn-sm btn-outline-secondary float-left"><img
                                        src="<?= Url('images/svg/warning.svg')?>"
                                        style="height: 24px; opacity: 25%;">گزارش تخلف
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 p-0">
                            <div id="mapid"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="bg-white border rounded-xlg p-3 dir-rtl text-right shadow-sm">
                    <a>{{$restaurant->name}}
                        <div class="align-top border d-inline-block mr-1 rounded pl-2 pt-1 rate-sm-container">
                            <div class="d-inline-block float-right rate rate-sm"><span class="checked"></span></div>
                            <span style="font-size: 0.85rem;">4.7</span>
                        </div>
                    </a>
                    <span class="mr-1" style="color: lightgray; font-size: 0.85rem;">402 نظر</span>

                    <h5 class="mt-3">{{$restaurant->title}}</h5>
                    <div class="my-3" style="color:lightgray;"><img src="<?= Url('images/svg/pin.svg')?>"
                                                                    style="height: 24px; margin: -10px 0 0 0; opacity: 25%;"> {{$restaurant->location}}
                    </div>

                    <!-- restaurant -->
                    <div class="container-fluid">
                        <div id="restaurant" class="row dir-rtl">
                            <div class="col-md-12 dir-ltr text-center">
                                <div id="restaurant-slider" class="splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="restaurant-slider"></div>

                    {!! $restaurant->description !!}

                    <button data-toggle="modal"
                            data-target="#exampleModalCenter" class="btn btn-primary">مشاهده منو
                    </button>

                </div>

                <div class="bg-white border rounded-xlg p-3 dir-rtl text-right shadow-sm mt-3">

                    {!! $restaurant->designerComment !!}

                </div>


                <div class="bg-white border rounded-xlg p-3 dir-rtl text-right shadow-sm mt-3">
                    <h5> نظر کاربران به {{$restaurant->name}}</h5>
                    <br>
                    {{--<div class="row mt-5">--}}
                    {{--<div class="col-md-4">--}}
                    {{--<div class="row">--}}
                    {{--<div class="col text-center">--}}
                    {{--<h3>2.6</h3>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                    {{--<div class="col">--}}
                    {{--<div class="rate mx-auto" style="width: 180px;">--}}
                    {{--<span></span>--}}
                    {{--<span></span>--}}
                    {{--<span></span>--}}
                    {{--<span class="checked"></span>--}}
                    {{--<span class="checked"></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                    {{--<div class="col text-center"><span style="color: lightgray;">402 نظر</span></div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <div class="col-md-8">
                        {{--@if(!auth()->check())--}}
                            {{--<a href="{{route('login')}}">--}}
                                {{--<p>برای ثبت نظر، ابتدا وارد حساب کاربری خود شوید.</p>--}}
                            {{--</a>--}}
                        {{--@else--}}
                        <form class="form-horizontal" action="{{route('comment.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @include('layouts.errors')

                            <label for="name" class="control-label">نام</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   placeholder="نام خود را وارد کنید" value="{{ old('name')}}">
                            <label for="email" class="control-label">ایمیل</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="ایمیل را وارد کنید"
                                   value="{{ old('email')}}">
                            <label for="body" class="control-label">نظر</label>
                            <textarea rows="2" class="form-control" name="body" id="body"
                                      placeholder="نظر خود را وارد کنید">{{ old('body') }}</textarea>
                            <div class="form-group">
                                <br>
                                    <button type="submit" class="btn btn-success">ارسال</button>
                            </div>
                        {{--@endif--}}
                        </form>
                    </div>

                    {{--</div>--}}

                    {{--<ul class="nav border-bottom mt-4 p-3">--}}
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#new-comment">امتیاز و نظر (0)</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#comments">پرسش و پاسخ (5)</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}

                    <div class="row d-none mt-3" id="new-comment">
                        <form class="col">
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </form>
                    </div>

                    @foreach($comments as $comment)
                        @if($comment->parent_id == 0)
                            <div class="row mt-3" id="comments">
                                <div class="col-sm-2 text-center">
                                    <img src="<?= Url('images/svg/ios-person.svg')?>" style="opacity: 25%; width: 64px;"
                                         class="bg-dark p-1 rounded-circle">
                                </div>
                                <div class="col-sm-10">
                                    <span class="ml-3 float-right">{{$comment->name}}</span>
                                    <span style="color: lightgray;">{{jdate($comment->created_at)->ago()}}</span>
                                    <p class="mt-3">{{$comment->body}}</p>

                                    @php $answers = $comments->where('parent_id',$comment->id) @endphp
                                    @foreach($answers  as $answer)
                                        <div class="row bg-light border rounded m-1 p-3">
                                            <div class="col-sm-2 text-center">
                                                <img src="<?= Url('images/svg/ios-person.svg')?>"
                                                     style="opacity: 25%; width: 64px;"
                                                     class="bg-dark p-1 rounded-circle">
                                            </div>
                                            <div class="col-sm-10">
                                                <span class="ml-3 float-right">{{$answer->name}}</span>
                                                <span style="color: lightgray;">{{jdate($answer->created_at)->ago()}}</span>
                                                <p class="mt-3">{{$answer->body}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach


                </div>

            </div>
        </div>
    </div>

@endsection
@section('js')
    {{--<script src="../../node_modules/jquery/dist/jquery.min.js"></script>--}}
    {{--<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>--}}
    {{--<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>--}}
    {{--<script src="node_modules/@splidejs/splide/dist/js/splide.min.js"></script>--}}
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>
    <script src="<?= Url('js/restaurant.js?v=1.1.17')?>"></script>
@endsection
