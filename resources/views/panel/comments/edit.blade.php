@extends('panel.layouts.base')


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div style="margin-bottom: 20px" class="page-header text-center head-section">
            <h2>ویرایش دیدگاه</h2>
        </div>
        <form class="form-horizontal" action="{{ route('comment.update', $comment->id) }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('put')
            @include('layouts.errors')
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="name" class="control-label">نام کاربر</label>
                        <input type="text" value="{{$comment->name}}" class="form-control" name="name" id="name"
                               placeholder="نام کاربر را وارد کنید">
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label for="email" class="control-label">ایمیل کاربر</label>
                        <input type="email" value="{{$comment->email}}" class="form-control" name="name" id="name"
                               placeholder="ایمیل کاربر را وارد کنید">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="body" class="control-label">متن پیام</label>
                    <textarea rows="2" class="form-control" name="body" id="body"
                              placeholder="متن پیام را وارد کنید">{{ old('body').$comment->body }}</textarea>
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


