<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>مستر غذا</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
        body {
            /* background: no-repeat url(design/pizza-one.jpg); */
            background: whitesmoke;
            /* height: 5470px; */
        }
    </style>
    @yield('css')

</head>

<body>
<!-- header -->
<nav class="navbar navbar-expand-lg navbar-light bg-white dir-rtl text-right">
    <a class="navbar-brand" href="#">
        <img src="<?= Url('images/logo.png') ?>" width="64" height="64" alt="logo">
        <span></span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse bg-white" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">خانه <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/register-form">فرم پیش ثبت نام<span class="sr-only">(current)</span></a>
            </li>

            @php $menus = \App\Models\Menu::all() @endphp
            @php $pages = \App\Models\Page::all() @endphp
            @foreach($menus as $menu)
                @php $selectedMenu =  $pages->where('id',$menu->page_id)->first() @endphp
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/').'/'.$selectedMenu->link }}">{{  $selectedMenu->name }} <span
                                class="sr-only">(current)</span></a>
                </li>
            @endforeach
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="#">شرایط و قوانین</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="#">راهنما استفاده</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="#">پرسش و پاسخ</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="#">درخواست ثبت کسب و کار</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="#">تماس با ما</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="#">درباره ما</a>--}}
            {{--</li>--}}
        </ul>
        <a type="button" class="btn nav-download-app mx-auto shadow-md"
           target="_blank" href="http://cafebazaar.ir/app/?id=com.kipopay.mrghaza&ref=share">
             دانلود مستقیم اندروید
        </a>
        <form class="form-inline mr-2 my-lg-0 dir-ltr search" onsubmit="return false;">
            <button class="btn my-sm-0" type="button">
                <img src="<?= Url('images/svg/search.svg') ?>" height="24" width="24">
            </button>
            <a class="btn my-sm-0" type="button" target="_blank" href="https://webapp.mrghazaa.ir">
                <img src="<?= Url('images/svg/person.svg') ?>" height="24" width="24">
            </a>
        </form>
    </div>
</nav>

@yield('body')

<!-- footer -->
<footer class="container-fluid bg-dark footer pt-5 dir-rtl text-center">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <h2>فهرست</h2>
                    <ul>
                        <li class="nav-item active">
                            <a style="color: #fff;"  class="nav-link" href="/">خانه <span class="sr-only">(current)</span></a>
                        </li>
                        @php $menus = \App\Models\Menu::all() @endphp
                        @php $pages = \App\Models\Page::all() @endphp
                        @foreach($menus as $menu)
                            @php $selectedMenu =  $pages->where('id',$menu->page_id)->first() @endphp
                            <li class="nav-item active">
                                <a style="color: #fff;" class="nav-link" href="{{ url('/').'/'.$selectedMenu->link }}">{{  $selectedMenu->name }} <span
                                            class="sr-only">(current)</span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-4">
                {{--<h2>تیتر</h2>--}}
                {{--<ul>--}}
                {{--<li><a>links</a></li>--}}
                {{--<li><a>links</a></li>--}}
                {{--<li><a>links</a></li>--}}
                {{--</ul>--}}
                </div>
                <div class="col-md-4">
                {{--<h2>تیتر</h2>--}}
                {{--<ul>--}}
                {{--<li><a>links</a></li>--}}
                {{--<li><a>links</a></li>--}}
                {{--<li><a>links</a></li>--}}
                {{--</ul>--}}
            </div>
        </div>
    </div>

    <div class="col-md-4 logo">
        <div class="row">
            <div class="col-md-4 pr-0">
                <a target="_blank" href="https://trustseal.enamad.ir/?id=140853&amp;Code=FQCsuixGDROtRGiDceDr"><img
                            src="https://Trustseal.eNamad.ir/logo.aspx?id=140853&amp;Code=FQCsuixGDROtRGiDceDr"
                            alt="" style="cursor:pointer" id="FQCsuixGDROtRGiDceDr"></a>

            </div>
            <div class="col-md-4 pr-0">
                <img id='jxlzfukzrgvjfukznbqejxlz' style='cursor:pointer'
                     onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=163621&p=rfthgvkaxlaogvkauiwkrfth", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                     alt='logo-samandehi'
                     src='https://logo.samandehi.ir/logo.aspx?id=163621&p=nbpdwlbqqftiwlbqodrfnbpd'/>

            </div>
            <div class="col-md-4 pr-0">
                <img style="width: 150px!important;height: 150px!important;" class="w-100" src="<?= Url('images/footer/logo-turquoise.png') ?>">
            </div>
        </div>

    </div>
    </div>

    <div class="row pb-3">
        <div class="col-md-6">
            <a target="_blank" href="http://cafebazaar.ir/app/?id=com.kipopay.mrghaza&ref=share">
                <img style="max-width: 128px;" src="<?= Url('images/footer/get-it-on-bazar.png') ?>">
            </a>

            <a target="_blank" href="https://play.google.com/store/apps/details?id=com.kipopay.mrghaza">
                <img style="max-width: 128px;" src="<?= Url('images/footer/get-it-on-google-play.png') ?>">
            </a>
            <a target="_blank" href="https://sibche.com/applications/%D8%A2%D9%82%D8%A7%DB%8C-%D8%BA%D8%B0%D8%A7">
            <img style="max-width: 128px;" src="<?= Url('images/footer/Sibche.png') ?>">
            </a>


        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row copyright">
        <div class="col-12 text-center">
            <p class="m-0">کلیه حقوق مادی و معنوی این وب‌سایت برای مستر غذا محفوظ است</p>
        </div>
    </div>
</footer>


<script src="{{ asset('js/app.js') }}" defer></script>
<script src="<?= Url('js/jquery.min.js') ?>"></script>
<script src="<?= Url('js/jquery.inputmask.bundle.js') ?>"></script>
@yield('js')

</body>

</html>
