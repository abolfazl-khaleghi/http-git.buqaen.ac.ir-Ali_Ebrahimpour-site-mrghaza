@extends('panel.layouts.base')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form style="width: 100%" method="POST" action="{{ route('menu.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">لطفا انتخاب کنید</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="city" class="control-label">عنوان</label>
                        <select name="page_id" class="form-control select2" style="width: 100%;">
                            @php $pages = \App\Models\Page::all() @endphp
                            @foreach($pages as $page )
                                <option value="{{$page->id}}" selected="selected">{{$page->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-primary">افزدون</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <section class="col-12 content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>تنظیمات منو</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModalCenter">
                            افزدون
                        </button>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>نام صفحه</th>
                <th>آدرس</th>
                <th>تنظیمات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($menus as $menu)
                @php $selectedMenu =  $pages->where('id',$menu->page_id)->first() @endphp
                <tr>
                    <td>{{ $selectedMenu->title }}</td>
                    <td><a href="{{ url('/').'/'.$selectedMenu->link }}">{{  $selectedMenu->name }}</a>
                    </td>
                    <td>
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                امکانات
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item">
                                    {{ Form::open([ 'method'  => 'delete', 'route' => [ 'menu.destroy', $menu->id ] ]) }}
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">حذف</button>
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
        {{$menus->render()}}
    </div>
    </div>

@endsection
