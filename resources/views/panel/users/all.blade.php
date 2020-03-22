@extends('panel.layouts.base')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div style="margin-bottom: 20px" class="page-header text-center head-section">
            <h2>لیست کاربران </h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>نام کاربر</th>
                    <th>وضعیت</th>
                    <th>ایمیل کاربر</th>
                    <th>شماره موبایل</th>
                    <th>اطلاعات بیشتر</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        {{--<td><a href="{{ $user->path() }}">{{ $user->title }}</a></td>--}}
                        <td>{{ $user->name }}</td>
                        <td>
                            @if($user->enabled)
                                <span class="badge badge-success">فعال</span>
                            @else
                                <span class="badge badge-danger">غیر فعال</span>
                            @endif

                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                    امکانات
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    {{--<li class="dropdown-item">--}}
                                        {{--<button type="button" class="btn btn-info btn-sm" data-toggle="modal"--}}
                                                {{--data-target="#myModal">مشاهده اطلاعات کامل--}}
                                        {{--</button>--}}
                                    {{--</li>--}}
                                    <li class="dropdown-item">
                                        @if($user->enabled == 0)
                                            {{ Form::open([ 'method'  => 'post', 'route' => [ 'user.accept', $user->id ] ]) }}
                                            {{ csrf_field() }}
                                            <div class="btn-group btn-group-xs">
                                                <button type="submit" class="btn btn-success">فعال سازی</button>
                                            </div>
                                            {{ Form::close() }}
                                        @elseif($user->enabled == 1)
                                            {{ Form::open([ 'method'  => 'post', 'route' => [ 'user.unAccept', $user->id ] ]) }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">غیر فعال سازی</button>
                                            {{ Form::close() }}
                                        @endif
                                    </li>



                                    <li class="dropdown-item">
                                        {{ Form::open([ 'method'  => 'delete', 'route' => [ 'user.destroy', $user->id ] ]) }}
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs">
                                            <a href="{{ route('user.edit', $user->id) }}"
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


    </div>


@endsection
