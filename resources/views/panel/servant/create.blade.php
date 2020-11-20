@extends('panel.layouts.base')

@section('css')
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?= Url('plugins/timepicker/bootstrap-timepicker.min.css') ?>">
    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="<?= Url('dist/css/persian-datepicker.min.css') ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= Url('plugins/select2/select2.min.css') ?>">
@endsection

@section('script')
    <!-- ckeditor -->
    {{--<script src="<?= Url('plugins/ckeditor/ckeditor.js') ?>"></script>--}}
    {{--<script>--}}
    {{--CKEDITOR.replace('address', {--}}
    {{--filebrowserUploadUrl: '/admin/panel/upload-image',--}}
    {{--filebrowserImageUploadUrl: '/admin/panel/upload-image'--}}
    {{--});--}}
    {{--</script>--}}

    <!-- Select2 -->
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

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div style="margin-bottom: 20px" class="page-header text-center head-section">
            <h2>ثبت پذیرنده جدید</h2>
        </div>
        <form class="form-horizontal" action="{{route('servant.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('layouts.errors')
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="userName" class="control-label">نام و نام خانودگی</label>
                        <input type="text" class="form-control" name="userName" id="userName"
                               placeholder="نام پذیرنده را وارد کنید" value="{{ old('userName') }}">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email" class="control-label">ایمیل پذیرنده</label>
                        <input type="email" class="form-control" name="email" id="email"
                               placeholder="ایمیل را وارد کنید"
                               value="{{ old('email') }}">
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

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="phone" class="control-label">شماره تلفن ثابت</label>
                        <input type="number" class="form-control" name="phone" id="phone"
                               placeholder="شماره تلفن ثابت را وارد کنید"
                               value="{{ old('phone') }}">
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

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cardNumber" class="control-label">شماره کارت</label>
                        <input type="number" class="form-control" name="cardNumber" id="cardNumber"
                               placeholder="شماره کارت را وارد کنید"
                               value="{{ old('cardNumber') }}">
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="shaba" class="control-label">شماره شبا</label>
                        <input type="number" class="form-control" name="shaba" id="shaba"
                               placeholder="شماره شبا را وارد کنید"
                               value="{{ old('shaba') }}">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="codeMelli" class="control-label">کد ملی</label>
                        <input type="number" class="form-control" name="codeMelli" id="codeMelli"
                               placeholder="کد ملی را وارد کنید"
                               value="{{ old('codeMelli') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="required">استان</label>
                        <select id="province_id" name="province_id" class="form-control select2"
                                style="width: 100%;">
                            @php $provinces = \Illuminate\Support\Facades\DB::table('province')->get() @endphp
                            @foreach($provinces as $province )
                                <option value="{{$province->id}}">{{$province->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-2">
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
            </div>

            <div class="row">
                {{--malekiat--}}
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

                {{--meter--}}
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="meter" class="control-label">متراژ</label>
                        <input type="number" class="form-control" name="meter" id="meter"
                               placeholder="متراژ را وارد کنید"
                               value="{{ old('meter') }}">
                    </div>
                </div>

                {{--owner service--}}
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="required">امکانات پذیرنده</label>
                        <select name="shopServant[]" multiple="multiple" class="select form-control select2"
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

                {{--shop service--}}
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


            <div class="row">

                {{--hesabdari--}}
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="hesabdari" class="required control-label">نوع سیستم حسابداری</label>
                        <input class="form-control" name="hesabdari" id="hesabdari"
                               placeholder="نوع سیستم حسابداری را وارد کنید"
                               value="{{ old('hesabdari') }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">ارسال</button>
                </div>
            </div>
        </form>
    </div>
@endsection


