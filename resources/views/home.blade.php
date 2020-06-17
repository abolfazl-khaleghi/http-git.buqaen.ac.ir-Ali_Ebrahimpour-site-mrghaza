@extends('layouts.base')

@section('body')
    <!-- slider -->
    <div id="index-slider" class="position-relative">
        <div class="slide rounded-sm position-relative">
            <img class="position-absolute" src="<?= Url('images/index-slide/4.jpg') ?>">
        </div>

        <form action="{{ route('sendSms') }}" method="POST" class="position-absolute float-right download dir-rtl">
            @csrf
            <div class="row p-2">
                <div class="col-sm-7 mt-1">
                    <input type="text" name="mobile" id="phone-number" class="form-control dir-ltr text-center"
                           placeholder="شماره تلفن همراه خود را وارد کنید">
                </div>
                <div class="col-sm-5 mt-1">
                    <button class="btn btn-outline-light btn-block">دریافت لینک دانلود</button>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-sm-4 mt-1">
                    <a target="_blank" href="https://sibche.com/applications/%D8%A2%D9%82%D8%A7%DB%8C-%D8%BA%D8%B0%D8%A7">
                        <text class="btn btn-outline-light btn-block">دانلود از سیبچه</text>
                    </a>
                </div>
                <div class="col-sm-4 mt-1">
                    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.kipopay.mrghaza">
                        <button class="btn btn-outline-light btn-block">گوگل پلی</button>
                    </a>

                </div>
                <div class="col-sm-4 mt-1">
                    <a target="_blank" href="http://cafebazaar.ir/app/?id=com.kipopay.mrghaza&ref=share">
                        <text class="btn btn-outline-light btn-block">کافه بازار</text>
                    </a>
                </div>
            </div>
            <div class="row p-2">
                <div class="col-sm-12">
                    <a target="_blank" href="https://webapp.mrghazaa.ir">
                        <text class="btn btn-outline-light btn-block">نسخه تحت وب بدون نیاز به نصب</text>
                    </a>
                </div>
            </div>
        </form>
        <button id="go-down" class="position-absolute border-0 rounded-circle shadow">
            <img src="<?= Url('images/svg/down.svg') ?>">
        </button>
    </div>


    {{--<!-- suggestion -->--}}
    {{--<div class="container-fluid">--}}
    {{--<div id="suggestions" class="row dir-rtl">--}}
    {{--<div class="col-md-12 dir-ltr text-center">--}}
    {{--<h3 class="suggestions-title dima-fred mt-4">پیشنهادات ویژه</h3>--}}
    {{--<div id="suggestion-slider" class="splide">--}}
    {{--<div class="splide__track">--}}
    {{--<ul class="splide__list">--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<!-- banner -->--}}
    {{--<div class="container-fluid">--}}
    {{--<div id="banners" class="row dir-rtl">--}}
    {{--<div class="col-md-12 dir-ltr text-center">--}}
    {{--<div id="banner-slider" class="splide">--}}
    {{--<div class="splide__track">--}}
    {{--<ul class="splide__list">--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <!-- today-restaurant -->
    <div class="container-fluid">
        <div id="today-restaurants" class="row dir-rtl">
            <div class="col-md-12 dir-ltr text-center">
                <h3 class="today-restaurants-title dima-fred mt-4">رستوران های روز</h3>
                <div id="today-restaurant-slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- all-restaurant -->
    <div class="container-fluid">
        <div id="all-restaurants" class="row dir-rtl">
            <div class="col-md-12 dir-ltr text-center">
                <h3 class="all-restaurants-title dima-fred mt-4">همه رستوران ها</h3>
                <div id="all-restaurant-slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="<?= Url('js/index.js') ?>"></script>




    <script type="text/javascript">

      $(document).ready(function () {
        var list1 = [
                @foreach ($restaurants as $restaurant)
          {
            title: "{{ $restaurant->title }}",
            content: "{{ $restaurant->name }}",
            img: "{{ $restaurant->picture }}",
            link: "/restaurant/{{ $restaurant->name }}",
          },
            @endforeach
        ];

        // initilizeIndexSlider();
        // suggestionSlider = initilizeSuggestionSlider();
        // bannerSlider = initilizeBannerSlider();
        todayRestaurantSlider = initilizeTodayRestaurantSlider(list1);
        allRestaurantSlider = initilizeAllRestaurantSlider(list1);
      });
        {{--var users = {!! json_encode($users->toArray()) !!};--}}
        {{--console.log(users);--}}
    </script>
@endsection
