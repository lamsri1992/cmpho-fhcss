<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-2 mb-1 text-muted text-uppercase">
            <span>ระบบจัดการข้อมูล</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('backend/role*')) ? 'active' : '' }}" href="{{ route('admin.role') }}">
                    <i class="fas fa-book"></i>
                    จัดการข้อมูลศูนย์ประสานงานสุขภาพชาวต่างชาติ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('backend/servicepoint*')) ? 'active' : '' }}" href="{{ route('admin.servicepoint') }}">
                    <i class="fas fa-hospital"></i>
                    จัดการข้อมูลสถานบริการ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('backend/news*')) ? 'active' : '' }}" href="{{ route('admin.news') }}">
                    <i class="fas fa-bullhorn"></i>
                    ข่าวประชาสัมพันธ์
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('backend/events*')) ? 'active' : '' }}" href="{{ route('admin.events') }}">
                    <i class="far fa-images"></i>
                    กิจกรรม
                </a>
            </li>
        </ul>
    </div>
</nav>