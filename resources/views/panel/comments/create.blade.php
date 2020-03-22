{{--@extends('panel.layouts.base')--}}

{{--@section('script')--}}
    {{--<script src="/ckeditor/ckeditor.js"></script>--}}
    {{--<script>--}}
      {{--CKEDITOR.replace('body' ,{--}}
        {{--filebrowserUploadUrl : '/admin/panel/upload-image',--}}
        {{--filebrowserImageUploadUrl :  '/admin/panel/upload-image'--}}
      {{--});--}}
    {{--</script>--}}
{{--@endsection--}}

{{--@section('content')--}}
    {{--<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">--}}
        {{--<div class="page-header head-section">--}}
            {{--<h2>ثبت دیدگاه</h2>--}}
        {{--</div>--}}
        {{--<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">--}}
            {{--{{ csrf_field() }}--}}
            {{--@include('layouts.errors')--}}
            {{--<div class="form-group">--}}
                {{--<div class="col-sm-12">--}}
                    {{--<label for="userName" class="control-label">نام کاربر</label>--}}
                    {{--<input type="text" class="form-control" name="userName" id="userName" placeholder="نام کاربر را وارد کنید" value="{{ old('title') }}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<div class="col-sm-12">--}}
                    {{--<label for="title" class="control-label">عنوان دیدگاه</label>--}}
                    {{--<input type="text" class="form-control" name="title" id="title" placeholder="عنوان را وارد کنید" value="{{ old('title') }}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<div class="col-sm-12">--}}
                    {{--<label for="email" class="control-label">ایمیل کاربر</label>--}}
                    {{--<input type="email" class="form-control" name="email" id="email" placeholder="ایمیل را وارد کنید" value="{{ old('title') }}">--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<div class="col-sm-12">--}}
                    {{--<label for="body" class="control-label">متن</label>--}}
                    {{--<textarea rows="5" class="form-control" name="body" id="body" placeholder="متن دیدگاه را وارد کنید">{{ old('body') }}</textarea>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<div class="col-sm-12">--}}
                    {{--<label for="post" class="control-label">انتخاب پست</label>--}}
                    {{--<select name="post" id="post" class="form-control">--}}
                        {{--<option value="vip">اعضای ویژه</option>--}}
                        {{--<option value="cash">نقدی</option>--}}
                        {{--<option value="free" selected>رایگان</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<div class="col-sm-6">--}}
                    {{--<label for="tags" class="control-label">تگ ها</label>--}}
                    {{--<input type="text" class="form-control" name="tags" id="tags" placeholder="تگ ها را وارد کنید" value="{{ old('tags') }}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<div class="col-sm-12">--}}
                    {{--<button type="submit" class="btn btn-danger">ارسال</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</form>--}}
    {{--</div>--}}
{{--@endsection--}}
