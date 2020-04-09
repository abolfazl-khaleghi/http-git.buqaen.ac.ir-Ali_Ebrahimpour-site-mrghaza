@extends('panel.layouts.base')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div style="margin-bottom: 20px" class="page-header text-center head-section">
            <h2>لیست رستوران ها </h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>نام رستوران</th>
                    <th>محله</th>
                    <th>آدرس</th>
                    <th>وضعیت</th>
                    <th>شماره تماس</th>
                    <th>اطلاعات بیشتر</th>
                </tr>
                </thead>
                <tbody>
                @foreach($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant->name }}</td>
                        <td>{{ $restaurant->location }}</td>
                        <td>{!!  $restaurant->address !!}</td>
                        <td>
                            @if($restaurant->enabled)
                                <span class="badge badge-success">فعال</span>
                            @else
                                <span class="badge badge-danger">غیر فعال</span>
                            @endif

                        </td>
                        <td>{{ $restaurant->phone }}</td>
                        <td>
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                    امکانات
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    @can('restaurant-accept')
                                        <li class="dropdown-item">
                                            @if($restaurant->enabled == 0)
                                                {{ Form::open([ 'method'  => 'post', 'route' => [ 'restaurant.accept', $restaurant->id ] ]) }}
                                                {{ csrf_field() }}
                                                <div class="btn-group btn-group-xs">
                                                    <button type="submit" class="btn btn-success">فعال سازی</button>
                                                </div>
                                                {{ Form::close() }}
                                            @elseif($restaurant->enabled == 1)
                                                {{ Form::open([ 'method'  => 'post', 'route' => [ 'restaurant.unAccept', $restaurant->id ] ]) }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">غیر فعال سازی</button>
                                                {{ Form::close() }}
                                            @endif
                                        </li>
                                    @endcan
                                    <li class="dropdown-item">
                                        {{ Form::open([ 'method'  => 'delete', 'route' => [ 'restaurant.destroy', $restaurant->id ] ]) }}
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs">
                                            @can('restaurant-edit')
                                                <a href="{{ route('restaurant.edit', $restaurant->id) }}"
                                                   class="btn btn-primary">ویرایش</a>
                                            @endcan
                                            @can('restaurant-delete')
                                                <button type="submit" class="btn btn-danger">حذف</button>
                                            @endcan
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

        <div style="text-align: center">
            {!! $restaurants->render() !!}
        </div>
    </div>


@endsection
