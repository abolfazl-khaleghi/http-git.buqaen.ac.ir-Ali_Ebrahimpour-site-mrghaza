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
                    <th>مکان</th>
                    <th>آدرس</th>
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
                        <td>{{ $restaurant->phone }}</td>
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
                                    {{--<li class="dropdown-item">--}}
                                    {{--<button type="button" class="btn btn-warning btn-sm" data-toggle="modal"--}}
                                    {{--data-target="#myModal">غیر فعال سازی/فعال سازی--}}
                                    {{--</button>--}}
                                    {{--</li>--}}
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
