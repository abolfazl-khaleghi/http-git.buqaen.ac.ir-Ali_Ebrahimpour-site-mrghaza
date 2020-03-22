<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a style="text-align: center!important;" href="" class="brand-link">
        <span class="brand-text font-weight-light"> پنل مدیریت سایت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="/" class="d-block"> کاربر {{Auth::user()->name }} خوش آمدید !</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    {{--dashborad panel--}}
                    <li class="nav-item">
                        <a href="{{route('panel')}}" class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>صفحه اصلی پنل</p>
                        </a>
                    </li>
                    @can('comment')
                        {{--comments--}}
                        <li class="nav-item has-treeview @if (strpos(request()->getRequestURI(),'/panel/comment') !== false ) menu-open @endif">
                            <a href="#"
                               class="nav-link @if (strpos(request()->getRequestURI(),'/panel/comment') !== false ) active @endif">
                                <i class="nav-icon fa fa-comment"></i>

                                <p>دیدگاه ها<i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                {{--<li class="nav-item">--}}
                                {{--<a href="{{route('comment.create')}}"--}}
                                {{--class="nav-link @if (request()->getRequestURI() == '/panel/comment/create') active @endif">--}}
                                {{--<i class="nav-icon fa fa-commenting-o"></i>--}}
                                {{--<p>ثبت دیدگاه جدید</p>--}}
                                {{--</a>--}}
                                {{--</li>--}}
                                <li class="nav-item">
                                    <a href="{{route('comment.index')}}"
                                       class="nav-link @if (request()->getRequestURI() == '/panel/comment') active @endif">
                                        <i class="fa fa-comments nav-icon"></i>
                                        <p>لیست دیدگاه ها</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    {{--users--}}
                    <li class="nav-item has-treeview @if (strpos(request()->getRequestURI(),'/panel/user') !== false ) menu-open @endif">
                        <a href="#"
                           class="nav-link @if (strpos(request()->getRequestURI(),'/panel/user') !== false ) active @endif">
                            <i class="nav-icon fa fa-user"></i>

                            <p>
                                کاربران
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('user-create')
                                <li class="nav-item">
                                    <a href="{{route('user.create')}}"
                                       class="nav-link @if (request()->getRequestURI() == '/panel/user/create') active @endif">
                                        <i class="nav-icon fa fa-user-plus"></i>
                                        <p>ایجاد کاربر جدید</p>
                                    </a>
                                </li>
                            @endcan
                            @can('user-list')

                                <li class="nav-item">
                                    <a href="{{route('user.index')}}"
                                       class="nav-link @if (request()->getRequestURI() == '/panel/user') active @endif">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>لیست کاربران</p>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>

                    {{--admins--}}
                    <li class="nav-item has-treeview @if (strpos(request()->getRequestURI(),'/panel/admin') !== false ) menu-open @endif">
                        <a href="#"
                           class="nav-link  @if (strpos(request()->getRequestURI(),'/panel/admin') !== false ) active @endif ">
                            <i class="nav-icon fa fa-user-circle"></i>
                            <p>
                                ادمین ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('admin-role')

                                <li class="nav-item">
                                    <a href="{{route('role.index')}}"
                                       class="nav-link @if (request()->getRequestURI() == '/panel/admin/role') active @endif">
                                        <i class="nav-icon fa fa-universal-access"></i>
                                        <p> مقام ها</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Admin-list')

                                <li class="nav-item">
                                    <a href="{{route('admin.index')}}"
                                       class="nav-link @if (request()->getRequestURI() == '/panel/admin') active @endif">
                                        <i class="fa fa-list-alt nav-icon"></i>
                                        <p>لیست ادمین ها</p>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>

                    {{--servant--}}
                    <li class="nav-item has-treeview  @if (strpos(request()->getRequestURI(),'/panel/servant') !== false ) menu-open @endif">
                        <a href="#"
                           class="nav-link @if (strpos(request()->getRequestURI(),'/panel/servant') !== false ) active @endif ">
                            <i class="nav-icon fa fa-university"></i>

                            <p>
                                خدمت دهنده ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('servant-create')

                                <li class="nav-item">
                                    <a href="{{route('servant.create')}}"
                                       class="nav-link @if (request()->getRequestURI() == '/panel/servant/create') active @endif">
                                        <i class="nav-icon fa fa-plus-square-o"></i>
                                        <p>ایجاد خدمت دهنده جدید</p>
                                    </a>
                                </li>
                            @endcan
                            @can('list-servant')

                                <li class="nav-item">
                                    <a href="{{route('servant.index')}}"
                                       class="nav-link @if (request()->getRequestURI() == '/panel/servant') active @endif">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>لیست خدمت دهنده ها</p>
                                    </a>
                                </li>
                            @endcan
                            @can('banner-list')
                                <li class="nav-item">
                                    <a href="{{route('banner.index')}}"
                                       class="nav-link @if (request()->getRequestURI() == '/panel/banner') active @endif">
                                        <i class="fa fa-instagram nav-icon"></i>
                                        <p>لیست بنر ها</p>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>


                    {{--restaurant--}}
                    <li class="nav-item has-treeview @if (strpos(request()->getRequestURI(),'/panel/restaurant') !== false ) menu-open @endif">
                        <a href="#"
                           class="nav-link @if (strpos(request()->getRequestURI(),'/panel/restaurant') !== false ) active @endif">
                            <i class="nav-icon fa fa-cutlery"></i>

                            <p>رستوران ها<i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('create-restaurant')

                            <li class="nav-item">
                                <a href="{{route('restaurant.create')}}"
                                   class="nav-link @if (request()->getRequestURI() == '/panel/restaurant/create') active @endif">
                                    <i class="nav-icon fa fa-plus-circle"></i>
                                    <p>ثبت رستوران جدید</p>
                                </a>
                            </li>
                            @endcan
                                @can('list-restaurant')

                            <li class="nav-item">
                                <a href="{{route('restaurant.index')}}"
                                   class="nav-link @if (request()->getRequestURI() == '/panel/restaurant') active @endif">
                                    <i class="fa fa-coffee nav-icon"></i>
                                    <p>لیست رستوران ها</p>
                                </a>
                            </li>
                                @endcan

                                <li class="nav-item">
                                <a href="{{route('offer.index')}}"
                                   class="nav-link @if (request()->getRequestURI() == '/panel/restaurant/offer') active @endif">
                                    <i class="fa fa-imdb nav-icon"></i>
                                    <p>پیشنهاد ویژه</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    @can('static-pages')

                    {{--static pages--}}
                    <li class="nav-item has-treeview  @if (strpos(request()->getRequestURI(),'/panel/static-page') !== false ) menu-open @endif">
                        <a href="#"
                           class="nav-link @if (strpos(request()->getRequestURI(),'/panel/static-page') !== false ) active @endif">
                            <i class="nav-icon fa fa-file"></i>

                            <p>
                                صفحات ثابت
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('static-page.create')}}"
                                   class="nav-link @if (request()->getRequestURI() == '/panel/static-page/create') active @endif">
                                    <i class="nav-icon fa fa-plus-square-o"></i>
                                    <p>ایجاد صفحه جدید</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('static-page.index')}}"
                                   class="nav-link @if (request()->getRequestURI() == '/panel/static-page') active @endif">
                                    <i class="fa fa-clipboard nav-icon"></i>
                                    <p>لیست صفحات ثابت</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    @endcan

                    @can('setting')
                    {{--settings--}}
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-cogs"></i>

                            <p>
                                تنظیمات سایت
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('menu.index')}}"
                                   class="nav-link @if (request()->getRequestURI() == '/panel/block/create') active @endif">
                                    <i class="fa fa-th-list nav-icon"></i>
                                    <p> منو</p>
                                </a>
                            </li>
                            {{--<li class="nav-item">--}}
                            {{--<a href="{{route('namad.index')}}"--}}
                            {{--class="nav-link @if (request()->getRequestURI() == '/panel/block') active @endif">--}}
                            {{--<i class="nav-icon fa fa-adn"></i>--}}
                            {{--<p> نماد ها</p>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            <li class="nav-item">
                                <a href="{{route('slider.index')}}"
                                   class="nav-link @if (request()->getRequestURI() == '/panel/block/create') active @endif">
                                    <i class="fa fa-camera nav-icon"></i>
                                    <p> اسلایدر</p>
                                </a>
                            </li>
                            {{--<li class="nav-item">--}}
                            {{--<a href="{{route('logo.index')}}"--}}
                            {{--class="nav-link @if (request()->getRequestURI() == '/panel/block/create') active @endif">--}}
                            {{--<i class="fa fa-eye nav-icon"></i>--}}
                            {{--<p> لوگو</p>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            <li class="nav-item">
                                <a href="{{route('footer.index')}}"
                                   class="nav-link @if (request()->getRequestURI() == '/panel/block/create') active @endif">
                                    <i class="fa fa-columns nav-icon"></i>
                                    <p> فوتر</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan

                    {{--exit--}}
                    <li class="nav-item">
                        <form class="nav-link" action="{{route('logout')}}" method="POST">
                            @csrf
                            <i class="fa fa-outdent nav-icon"></i>
                            <button class="border-transparent bg-transparent" type="submit">خروج</button>
                        </form>
                    </li>


                    ‍
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
