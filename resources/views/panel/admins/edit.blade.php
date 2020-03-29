@extends('panel.layouts.base')

{{--@section('script')--}}
{{--<script>--}}
{{--$(document).ready(function () {--}}
{{--$('#user_id').selectpicker();--}}
{{--// $('#role_id').selectpicker();--}}
{{--})--}}
{{--</script>--}}
{{--@endsection--}}


@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>ویرایش مقام</h2>
        </div>
        <form class="form-horizontal" action="{{ route('admin.update',$user->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @include('layouts.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="user_id" class="control-label">کاربران</label>
                    <select class="form-control" name="user_id" id="user_id" data-live-search="true">
                        {{--@foreach(\App\User::all() as $user)--}}
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        {{--@endforeach--}}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="role_id" class="control-label">مقام ها</label>
                    <select class="form-control" name="role_id" id="role_id">
                        @foreach(\App\Models\Role::all() as $role)
                            <option value="{{ $role->id }}">{{ $role->name }} - {{ $role->label }}</option>
                        @endforeach
                    </select>
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
