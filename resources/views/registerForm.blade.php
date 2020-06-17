@extends('layouts.base')

@section('css')
@endsection
@section('js')
    <script src="<?= Url('plugins/daterangepicker/daterangepicker.js') ?>"></script>
    <script src="<?= Url('dist/js/persian-date.min.js') ?>"></script>
    <script src="<?= Url('dist/js/persian-datepicker.min.js') ?>"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $(".birthday").pDatepicker({
          format: 'YYYY/MM/DD',
        });
      });
    </script>

@endsection

@section('body')
    <div class="container" style="direction:rtl; text-align: right!important;">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">فرم پیش ثبت نام</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>استان</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">مازندران</option>
                                <option>شیراز</option>
                                <option>گلستان</option>
                                <option>اردبیل</option>
                                <option>خوزستان</option>
                                <option>سیستان و بلوچستان</option>
                                <option>مشهد</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="city" class="control-label">شهر</label>
                            <select name="city_id" class="form-control select2" style="width: 100%;">
                                @php $cities = \App\Models\City::all() @endphp
                                @foreach($cities as $city )
                                    <option value="{{$city->id}}" selected="selected">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="guild_id" class="control-label">نوع صنف</label>
                            <select name="guild_id" class="form-control select2" style="width: 100%;">
                                @php $guilds = \App\Models\Guild::all() @endphp
                                @foreach($guilds as $guild)
                                    <option value="{{$guild->id}}" selected="selected">{{$guild->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        {{--<div class="form-group">--}}
                        {{--<label>تاریخ ثبت نام:</label>--}}
                        {{--<input type="text" class="form-control birthday" name="birthday"--}}
                        {{--placeholder="تاریخ ثبت نام را وارد کنید"--}}
                        {{--value="{{ old('birthday') }}">--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label>نام فروشگاه:</label>
                            <input type="text" class="form-control" name="birthday"
                                   placeholder="نام فروشگاه را وارد کنید"
                                   value="{{ old('birthday') }}">
                        </div>

                    </div>


                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="userName" class="control-label">نام و نام خانودگی</label>
                            <input type="text" class="form-control" name="userName" id="userName"
                                   placeholder="نام پذیرنده را وارد کنید" value="{{ old('userName') }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="codeMelli" class="control-label">کد ملی</label>
                            <input type="number" class="form-control" name="codeMelli" id="codeMelli"
                                   placeholder="کد ملی را وارد کنید"
                                   value="{{ old('codeMelli') }}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="mobile" class="control-label">شماره موبایل</label>
                            <input type="number" class="form-control" name="mobile" id="mobile"
                                   placeholder="شماره موبایل را وارد کنید"
                                   value="{{ old('mobile') }}">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="phone" class="control-label">شماره تلفن ثابت</label>
                            <input type="number" class="form-control" name="phone" id="phone"
                                   placeholder="شماره تلفن ثابت را وارد کنید"
                                   value="{{ old('phone') }}">
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="email" class="control-label">ایمیل پذیرنده</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="ایمیل را وارد کنید"
                                   value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cardNumber" class="control-label">شماره کارت</label>
                            <input type="number" class="form-control" name="cardNumber" id="cardNumber"
                                   placeholder="شماره کارت را وارد کنید"
                                   value="{{ old('cardNumber') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="sex" class="control-label">جنسیت</label>
                            <select name="sex" class="form-control select2" style="width: 100%;">
                                <option value="1" selected="selected">مرد</option>
                                <option value="0">زن</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="address" class="control-label">آدرس</label>
                        <textarea id="address" rows="2" class="form-control" name="address" id="address"
                                  placeholder="آدرس را وارد کنید">{{ old('address') }}</textarea>
                    </div>
                </div>

                <div class="row">


                </div>

                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="shaba" class="control-label">شماره شبا</label>
                            <input type="number" class="form-control" name="shaba" id="shaba"
                                   placeholder="شماره شبا را وارد کنید"
                                   value="{{ old('shaba') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>نوع مالکیت ملکی</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected"> مالکیت فردی</option>
                                <option>استیجاری</option>
                                <option>شراکتی</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="shaba" class="control-label">متراژ</label>
                            <input type="number" class="form-control" name="shaba" id="shaba"
                                   placeholder="متراژ را وارد کنید"
                                   value="{{ old('shaba') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="shaba" class="control-label">میزان تخفیف</label>
                            <input type="number" class="form-control" name="shaba" id="shaba"
                                   placeholder="میزان تخفیف را وارد کنید"
                                   value="{{ old('shaba') }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="shaba" class="control-label">نوع سیستم حسابداری</label>
                            <input type="number" class="form-control" name="shaba" id="shaba"
                                   placeholder="نوع سیستم حسابداری را وارد کنید"
                                   value="{{ old('shaba') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>امکانات فروشگاهی</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">اینترنت</option>
                                <option>کامیپوتر</option>
                                <option>گوشی هوشمند</option>
                                <option>سیستم تحویل</option>
                                <option>سیستم سیار</option>
                                <option>سیستم فیش</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>امکانات فروشگاه</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected"> WIFI اینترنت</option>
                                <option>پارکینگ</option>
                                <option>موسیقی زنده</option>
                                <option>سالن</option>
                                <option>فضای باز</option>
                                <option>فضا مراسم خاص</option>
                                <option>بیرون بر</option>
                                <option>حق سرویس</option>
                                <option>مالیات</option>
                            </select>
                        </div>
                    </div>


                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
