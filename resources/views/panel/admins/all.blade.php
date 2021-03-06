@extends('panel.layouts.base')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>مدیران سایت</h2>
            <div class="btn-group">
                <a href="{{ route('admin.create') }}" class="btn btn-sm btn-info">ثبت مقام برای مدیر</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>نام کاربر</th>
                    <th>ایمیل</th>
                    <th>مقام</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    @if(count($role->users))
                        @foreach($role->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $role->name }} - {{ $role->label }}</td>
                                <td>
                                    <form action="{{ route('admin.destroy' ,  $user->id) }}" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs">
                                            @can('admin-edit')
                                                <a href="{{ route('admin.edit' , $user->id) }}" class="btn btn-primary">ویرایش</a>
                                            @endcan
                                            @can('admin-delete')
                                                <button type="submit" class="btn btn-danger">حذف</button>
                                            @endcan
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $roles->render() !!}
        </div>
    </div>

@endsection
