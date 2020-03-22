@extends('layouts.base')

@section('body')
    <!-- results -->
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 text-center form-container dir-rtl">

                <form class="form-signin" method="POST" action="{{ route('login') }}">
                    @csrf
                    @if(count($errors) > 0)
                        <div style="width: 130%;" class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <img class="mb-4" src="img/logo-black-white.png" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">لطفا وارد شوید</h1>
                    <label for="mobile" class="sr-only">شماره موبایل</label>
                    <input name="mobile"  id="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="شماره موبایل" required
                           autofocus>
                    {{--<label for="inputPassword" class="sr-only">کلمه عبور</label>--}}
                    {{--<input name="password" type="password" id="inputPassword" class="form-control" placeholder="کلمه عبور" required>--}}
                    {{--<div class="checkbox mb-3 text-right">--}}
                        {{--<label>--}}
                            {{--<input type="checkbox" class="ml-1" value="remember-me">مرا به خاطر بسپار--}}
                        {{--</label>--}}
                    {{--</div>--}}
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">ورود</button>
                </form>
            </div>
        </div>
    </div>
@endsection
