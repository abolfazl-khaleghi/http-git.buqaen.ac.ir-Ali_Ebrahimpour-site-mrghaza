@extends('layouts.base')

@section('body')
    <!-- results -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center form-container dir-rtl">
                <form class="form-signin" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1 class="h3 mb-3 font-weight-normal">لطفا ثبت نام کنید</h1>
                    <label for="mobile" class="sr-only">شماره موبایل</label>
                    <input value="{{ old('mobile') }}"  name="mobile" id="mobile" class="form-control" placeholder="شماره موبایل" required
                           autofocus>
                    <label for="inputPassword" class="sr-only">کلمه عبور</label>
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="کلمه عبور" required>
                    <div class="checkbox mb-3 text-right">
                        <label>
                            <input type="checkbox" class="ml-1" value="remember-me">مرا به خاطر بسپار
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">ثبت نام</button>
                </form>
            </div>
        </div>
    </div>
@endsection


