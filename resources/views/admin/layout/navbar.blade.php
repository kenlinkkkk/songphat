<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

{{--                <li>--}}
{{--                    <a href="#" class="waves-effect">--}}
{{--                        <i class="bx bx-home-circle"></i><span>Dashboards</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Quản lý</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.product.index') }}">Công nghệ & sản phẩm</a></li>
                        <li><a href="{{ route('admin.post.index') }}">Tin tức & sự kiện</a></li>
                        <li><a href="{{ route('admin.recruitment.index') }}">Tuyển dụng</a></li>
                        @role('SuperAdmin')
                        <li><a href="{{ route('admin.position.index') }}">Vị trí tuyển dụng</a></li>
                        @endrole
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Quản lý user</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.profile') }}">Thông tin cá nhân</a></li>
                        @hasanyrole('SuperAdmin|Admin')
                        <li><a href="{{ route('admin.user.index') }}">Danh sách tài khoản</a></li>
                        @endhasanyrole
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
