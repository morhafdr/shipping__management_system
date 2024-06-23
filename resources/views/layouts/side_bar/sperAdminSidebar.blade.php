<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret  bg-gradient-dark" id="sidenav-main">
<div class="collapse navbar-collapse px-0 w-auto " id="sidenav-collapse-main">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10">dashboard</i>
                </div>
                <span class="nav-link-text me-1">لوحة القيادة</span>
            </a>
        </li>
        <!-- العناصر الأخرى من القائمة -->
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() === 'offices.index' ? 'active' : '' }}"  href="{{ route('offices.index') }}">
                <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10">format_textdirection_r_to_l</i>
                </div>
                <span class="nav-link-text me-1">المكاتب</span>
            </a>
        </li>

    <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() === 'employees.index' ? 'active' : '' }}"  href="{{ route('employees.index') }}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">table_view</i>
            </div>
            <span class="nav-link-text me-1">الموظفين</span>
        </a>
    </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10">table_view</i>
                </div>
                <span class="nav-link-text me-1">الطلبات</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">طلب جديد</a></li>
                <li><a class="dropdown-item" href="#">طلب قيد المعالجة</a></li>
                <li><a class="dropdown-item" href="#">طلبات مكتملة</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">المزيد من الطلبات</a></li>
            </ul>
        </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() === 'trucks.index' ? 'active' : '' }}"  href="{{ route('trucks.index') }}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text me-1">الشاحنات</span>
        </a>
    </li>
        <li class="nav-item">
            <a class="nav-link " href="../pages/virtual-reality.html">
                <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10">view_in_ar</i>
                </div>
                <span class="nav-link-text me-1">السائقون</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="../pages/virtual-reality.html">
                <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons-round opacity-10">view_in_ar</i>
                </div>
                <span class="nav-link-text me-1">الفواتير</span>
            </a>
        </li>
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link active" href="../pages/rtl.html">--}}
{{--            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">--}}
{{--                <i class="material-icons-round opacity-10">format_textdirection_r_to_l</i>--}}
{{--            </div>--}}
{{--            <span class="nav-link-text me-1">RTL</span>--}}
{{--        </a>--}}
{{--    </li>--}}
    <li class="nav-item">
        <a class="nav-link " href="../pages/notifications.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text me-1">إشعارات</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="../pages/profile.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">person</i>
            </div>
            <span class="nav-link-text me-1">حساب تعريفي</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="../pages/sign-in.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">login</i>
            </div>
            <span class="nav-link-text me-1">تسجيل الدخول</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="../pages/sign-up.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">assignment</i>
            </div>
            <span class="nav-link-text me-1">اشتراك</span>
        </a>
    </li>
</ul>
</div>
</aside>
