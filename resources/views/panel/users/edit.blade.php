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
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div style="margin-bottom: 20px" class="page-header text-center head-section">
            <h2>ویرایش کاربر</h2>
        </div>
        <form class="form-horizontal" action="{{route('user.update', $user->id)}}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('layouts.errors')
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="userName" class="control-label">نام و نام خانودگی</label>
                        <input type="text" class="form-control" name="userName" id="userName"
                               placeholder="نام کاربر را وارد کنید" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email" class="control-label">ایمیل کاربر</label>
                        <input type="email" class="form-control" name="email" id="email"
                               placeholder="ایمیل را وارد کنید"
                               value="{{ $user->email }}">
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


            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="password" class="control-label">پسورد</label>
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="پسورد کاربر را وارد کنید" value="{{ $user->password }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="role" class="control-label">نقش کاربر</label>
                        <select name="role" class="form-control select2" style="width: 100%;">
                            <option value="user" selected="selected">کاربر عادی</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="codeMeli" class="control-label">کد ملی</label>
                        <input type="text" class="form-control" name="codeMeli" id="codeMeli"
                               placeholder="کد ملی کاربر را وارد کنید" value="{{ $user->codeMeli }}">
                    </div>
                </div>

            </div>


            <div class="form-group">
                <div class="col-sm-12">
                    <label for="address" class="control-label">آدرس</label>
                    <textarea id="address" rows="2" class="form-control" name="address" id="address"
                              placeholder="آدرس را وارد کنید">{{ $user->address }}</textarea>
                </div>
            </div>


            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="birthday" class="control-label">تاریخ تولد</label>
                        <input type="text" class="form-control birthday" name="birthday"
                               placeholder="تاریخ تولد را وارد کنید"
                               value="{{ old('birthday') }}">
                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="mobile" class="control-label">شماره موبایل</label>
                        <input type="number" class="form-control" name="mobile" id="mobile"
                               placeholder="شماره موبایل را وارد کنید"
                               value="{{ $user->mobile }}">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cardNumber" class="control-label">شماره کارت</label>
                        <input type="number" class="form-control" name="cardNumber" id="cardNumber"
                               placeholder="شماره کارت را وارد کنید"
                               value="{{ $user->member->cardNumber }}">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="enabled" class="control-label">وضعیت</label>
                        <select class="form-control" name="enabled" id="enabled">
                            <option value="1">فعال سازی</option>
                            <option value="0">غیر فعال سازی</option>
                        </select>
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


