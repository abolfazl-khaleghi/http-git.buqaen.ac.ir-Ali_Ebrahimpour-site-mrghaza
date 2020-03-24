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
    <script src="<?= Url('plugins/ckeditor/ckeditor.js') ?>"></script>
    {{--<script>--}}
    {{--CKEDITOR.replace('address', {--}}
    {{--filebrowserUploadUrl: '/admin/panel/upload-image',--}}
    {{--filebrowserImageUploadUrl: '/admin/panel/upload-image'--}}
    {{--});--}}
    {{--</script>--}}
    <script>
      CKEDITOR.replace('description', {
        filebrowserUploadUrl: '/admin/panel/upload-image',
        filebrowserImageUploadUrl: '/admin/panel/upload-image'
      });
    </script>
    <script>
      CKEDITOR.replace('designerComment', {
        filebrowserUploadUrl: '/admin/panel/upload-image',
        filebrowserImageUploadUrl: '/admin/panel/upload-image'
      });
    </script>



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
            <h2>ثبت رستوران جدید</h2>
        </div>
        <form class="form-horizontal" action="{{route('restaurant.store')}}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('layouts.errors')
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="restaurantName" class="control-label">نام رستوران</label>
                        <input type="text" class="form-control" name="restaurantName" id="restaurantName"
                               placeholder="نام رستوران را وارد کنید" value="{{ old('restaurantName') }}">
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label for="title" class="control-label">عنوان</label>
                        <input type="text" class="form-control" name="title" id="title"
                               placeholder="عنوان رستوران را وارد کنید" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="location" class="control-label">مکان</label>
                        <input type="text" class="form-control" name="location" id="location"
                               placeholder="مکان رستوران را وارد کنید" value="{{ old('location') }}">
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
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">توضیحات</label>
                    <textarea id="address" rows="2" class="form-control" name="description" id="description"
                              placeholder="توضیحات را وارد کنید">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="designerComment" class="control-label">ثبت نظر کارشناسان</label>
                    <textarea id="address" rows="2" class="form-control" name="designerComment" id="designerComment"
                              placeholder="نظر کارشناسان را وارد کنید">{{ old('designerComment') }}</textarea>
                </div>
            </div>


            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="menu" class="control-label">ثبت منو</label>
                        <input type="file" class="form-control-file" name="menu" id="menu">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="picture" class="control-label">تصویر منتخب</label>
                        <input type="file" class="form-control-file" name="picture" id="picture">
                    </div>
                </div>


                <div class="col-sm-2">
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

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="servant_id" class="control-label">خدمت دهنده</label>
                        <select name="servant_id" class="form-control select2" style="width: 100%;">
                            @php $servants = \App\User::whereRole('servant')->get() @endphp
                            @foreach($servants as $servant)
                                <option value="{{$servant->id}}" selected="selected">{{$servant->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="city_id" class="control-label">شهر</label>
                        <select name="city_id" class="form-control select2" style="width: 100%;">
                            @php $cities = \App\Models\City::all() @endphp
                            @foreach($cities as $city )
                                <option value="{{$city->id}}" selected="selected">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="phone" class="control-label">شماره تماس</label>
                        <input type="number" class="form-control" name="phone" id="phone"
                               placeholder="شماره تماس را وارد کنید"
                               value="{{ old('phone') }}">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="hour" class="control-label">ساعت سرویس دهی</label>
                        <input type="text" class="form-control" name="hour" id="hour"
                               placeholder="ساعت سرویس دهی را وارد کنید"
                               value="{{ old('hour') }}">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="day" class="control-label">روزهای سرویس دهی</label>
                        <input type="text" class="form-control" name="day" id="day"
                               placeholder="روزهای سرویس دهی را وارد کنید"
                               value="{{ old('day') }}">
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


