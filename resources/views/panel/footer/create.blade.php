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
            <h2>ثبت فوتر جدید</h2>
        </div>
        <form class="form-horizontal" action="{{route('footer.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            @include('layouts.errors')
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="description" class="control-label">متن پیام</label>
                        <textarea placeholder="متن پیام را وارد کنید" type="text" class="form-control" name="description" id="description">{{$footer->description}}</textarea>
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


