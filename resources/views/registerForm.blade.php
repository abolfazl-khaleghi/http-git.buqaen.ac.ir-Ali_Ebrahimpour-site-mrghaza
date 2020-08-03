@extends('layouts.base')

@section('css')
    <style>
        .required:after {
            content:" *";
            color: red;
        }
    </style>
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?= Url('plugins/timepicker/bootstrap-timepicker.min.css') ?>">
    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="<?= Url('dist/css/persian-datepicker.min.css') ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= Url('plugins/select2/select2.min.css') ?>">
@endsection

@section('js')
    <script src="<?= Url('plugins/select2/select2.full.min.js') ?>"></script>
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

    <script>
      function up() {
        var e = document.getElementById("province_id");
        var strUser = e.options[e.selectedIndex].value;
      }
    </script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      });
      // $('select').select2({
      //   placeholder: {
      //     id: '-1', // the value of the option
      //     text: 'Select an option'
      //   }
      // });
    </script>


@endsection

@section('body')

    <form class="form-horizontal" action="{{route('formRestaurant.store')}}" method="post"
          enctype="multipart/form-data">
        @csrf
        <div class="container" style="direction:rtl; text-align: right!important;">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">فرم پیش ثبت نام</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('layouts.errors')

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="required" >استان</label>
                                <select  id="province_id" name="province_id" class="form-control select2"
                                        style="width: 100%;">
                                    @php $provinces = \Illuminate\Support\Facades\DB::table('province')->get() @endphp
                                    @foreach($provinces as $province )
                                        <option value="{{$province->id}}">{{$province->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="city" class="required control-label">شهر</label>
                                <select name="city_id" class="form-control select2" style="width: 100%;">
                                    @php $cities = \Illuminate\Support\Facades\DB::table('city')->get() @endphp
                                    @foreach($cities as $city )
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="guild_id" class="required control-label">نوع صنف</label>
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
                            {{--<input type="text" class="form-control birthday" name="dateRigster"--}}
                            {{--placeholder="تاریخ ثبت نام را وارد کنید"--}}
                            {{--value="{{ old('dateRigster') }}">--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label class="required" for="restaurantName">نام فروشگاه</label>
                                <input type="text" class="form-control" name="restaurantName"
                                       placeholder="نام فروشگاه را وارد کنید"
                                       value="{{ old('restaurantName') }}">
                            </div>

                        </div>


                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="required" for="userName" class="control-label">نام و نام خانودگی پذیرنده</label>
                                <input type="text" class="form-control" name="userName" id="userName"
                                       placeholder="نام پذیرنده را وارد کنید" value="{{ old('userName') }}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="codeMelli" class="required control-label">کد ملی</label>
                                <input type="number" class="form-control" name="codeMelli" id="codeMelli"
                                       placeholder="کد ملی را وارد کنید"
                                       value="{{ old('codeMelli') }}">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="mobile" class="control-label required">شماره موبایل</label>
                                <input type="number" class="form-control" name="mobile" id="mobile"
                                       placeholder="شماره موبایل را وارد کنید"
                                       value="{{ old('mobile') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="phone" class="control-label required">شماره تلفن ثابت</label>
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
                                <label for="sex" class="control-label required">جنسیت</label>
                                <select name="sex" class="form-control select2" style="width: 100%;">
                                    <option value="1" selected="selected">مرد</option>
                                    <option value="0">زن</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="address" class="control-label required">آدرس</label>
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
                                <select name="typeOwner" class="required form-control select2" style="width: 100%;">
                                    <option value="1" selected="selected"> مالکیت فردی</option>
                                    <option value="2">استیجاری</option>
                                    <option value="3">شراکتی</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="meter" class="control-label">متراژ</label>
                                <input type="number" class="form-control" name="meter" id="meter"
                                       placeholder="متراژ را وارد کنید"
                                       value="{{ old('meter') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="percent" class="control-label">میزان تخفیف</label>
                                <input type="number" class="form-control" name="percent" id="percent"
                                       placeholder="میزان تخفیف را وارد کنید"
                                       value="{{ old('percent') }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="hesabdari" class="required control-label">نوع سیستم حسابداری</label>
                                <input class="form-control" name="hesabdari" id="hesabdari"
                                       placeholder="نوع سیستم حسابداری را وارد کنید"
                                       value="{{ old('hesabdari') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="required">امکانات پذیرنده</label>
                                <select  name="shopServant[]" multiple="multiple" class="select form-control select2"
                                        style="width: 100%;">
                                    <option value="1">اینترنت</option>
                                    <option value="2">کامیپوتر</option>
                                    <option value="3">گوشی هوشمند</option>
                                    <option value="4">سیستم تحویل</option>
                                    <option value="5">سیستم سیار</option>
                                    <option value="6">سیستم فیش</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="required">امکانات فروشگاه</label>
                                <select name="shopService[]" multiple="multiple" class="form-control select2"
                                        style="width: 100%;">
                                    <option value="1"> WIFI اینترنت</option>
                                    <option value="2">پارکینگ</option>
                                    <option value="3">موسیقی زنده</option>
                                    <option value="4">سالن</option>
                                    <option value="6">فضای باز</option>
                                    <option value="7">فضا مراسم خاص</option>
                                    <option value="8">بیرون بر</option>
                                    <option value="9">حق سرویس</option>
                                    <option value="10">مالیات</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">ارسال</button>
                </div>
            </div>
        </div>

    </form>
@endsection
