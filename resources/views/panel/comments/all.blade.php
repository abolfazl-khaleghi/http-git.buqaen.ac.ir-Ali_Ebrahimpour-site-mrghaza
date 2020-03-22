@extends('panel.layouts.base')

@section('script')
    <script>
      $(document).on("click", ".open-AddBookDialog", function () {
        var myBookId = $(this).data('id');
        $(".modal-body #bookId").val(myBookId);
        // As pointed out in comments,
        // it is unnecessary to have to manually call the modal.
        // $('#addBookDialog').modal('show');
      });
    </script>
@endsection

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">متن پیام</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--                    <label>{{$comment->name}}</label>--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>



    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div style="margin-bottom: 20px" class="page-header text-center head-section">
            <h2>دیدگاه ها</h2>
        </div>


        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>نام کاربر</th>
                    {{--<th>عنوان دیدگاه</th>--}}
                    {{--<th>ایمیل کاربر</th>--}}
                    {{--<th>تاریخ ثبت</th>--}}
                    <th>متن پیام</th>
                    <th>وضعیت</th>
                    <th>پست مربوطه</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        {{--                        <td>{{ \Illuminate\Support\Facades\Auth::user()->name }}</td>--}}
                        <td>{{ $comment->name }}</td>
                        <td><a data-toggle="modal"
                               data-target="#exampleModalCenter"
                               href="comment/{{ $comment->id }}">
                                {{  \Illuminate\Support\Str::limit($comment->body, 10, $end='...') }}
                            </a>
                        </td>
                        <td>
                            @if($comment->status == 0)
                                <span class="badge badge-warning">منتظر تایید</span>
                            @elseif($comment->status == 1)
                                <span class="badge badge-success">تایید شده</span>
                            @else
                                <span class="badge badge-danger">رد شده</span>
                            @endif

                        </td>
                        @php $post =$comment->commentable->commentable_type  @endphp
                        {{--                        {{var_dump($comment->commentable->title)}}--}}
                        <td>{{  $comment->commentable->title }}</td>


                        <td>
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                    امکانات
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    @if($comment->status == 0)
                                        {{ Form::open([ 'method'  => 'post', 'route' => [ 'comment.accept', $comment->id ] ]) }}
                                        {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs">
                                            <button type="submit" class="btn btn-success"> تایید</button>
                                        </div>
                                        {{ Form::close() }}
                                    @elseif($comment->status == 1)
                                        {{ Form::open([ 'method'  => 'post', 'route' => [ 'comment.unAccept', $comment->id ] ]) }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-success">منتظر تایید</button>
                                        {{ Form::close() }}
                                    @endif



                                    <li class="dropdown-item">
                                        {{ Form::open([ 'method'  => 'delete', 'route' => [ 'comment.destroy', $comment->id ] ]) }}
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs">
                                            <a href="{{ route('comment.edit', $comment->id) }}"
                                               class="btn btn-primary">ویرایش</a>
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </div>
                                        {{ Form::close() }}
                                    </li>

                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{--<div style="text-align: center">--}}
        {{--{!! $episodes->render() !!}--}}
        {{--</div>--}}
    </div>

@endsection
