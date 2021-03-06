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
        <script>
          CKEDITOR.replace('address', {
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
                <h2>ثبت صفحه جدید</h2>
            </div>
            <form class="form-horizontal" action="{{route('static-page.store')}}" method="post"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('layouts.errors')
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="name" class="control-label">نام صفحه</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   placeholder="نام صفحه را وارد کنید" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="title" class="control-label">عنوان</label>
                            <input type="text" class="form-control" name="title" id="title"
                                   placeholder="عنوان رستوران را وارد کنید" value="{{ old('title') }}">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label for="description" class="control-label">توضیحات</label>
                        <textarea id="address" rows="2" class="form-control" name="description" id="description"
                                  placeholder="توضیحات را وارد کنید">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tags" class="control-label">تگ ها</label>
                            <input type="text" class="form-control" name="tags" id="tags"
                                   placeholder="تگ ها با , وارد کنید" value="{{ old('tags') }}">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <label for="link" class="control-label"> لینک صفحه </label>
                        <input style="text-align: left;" type="text" class="form-control" name="link" id="link"
                               placeholder="لینک صفحه را وارد کنید" value="{{ old('link') }}">
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


