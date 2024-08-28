<div class="container-fluid fixed-top px-0">
    <div class="topbar">
        <div class=" align-items-center justify-content-start">
            {{-- <div class="col-md-6">
                <div class="topbar-info d-flex flex-wrap">
                    <a href="#" class="text-light me-4">
                        <img src="{{ asset('img/18166.jpg') }}" class="img" width="4%">
                        English
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="topbar-info d-flex flex-wrap">
                    <a href="#" class="text-light me-4">
                        <img src="{{ asset('img/27145.jpg') }}" class="img" width="4%">
                        ภาษาไทย
                    </a>
                </div>
            </div> --}}
            <div id="google_translate_element"></div>
        </div>
    </div>
    <nav class="navbar navbar-light bg-light navbar-expand-xl">
        <div class="row">
            <div class="col-md-12">
                <button class="navbar-toggler py-2 px-3 me-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-light" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="/" class="nav-item nav-link">
                            <i class="fas fa-home"></i>
                            หน้าแรก
                        </a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-book"></i>
                                ศูนย์ข้อมูล
                            </a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0" style="font-size: 18px;">
                                <a href="{{ route('role') }}" class="dropdown-item">ข้อมูลศูนย์ประสานงานสุขภาพชาวต่างชาติ</a>
                                <a href="{{ route('servicepoint') }}" class="dropdown-item">ข้อมูลสถานบริการ</a>
                                <a href="https://cmi.hdc.moph.go.th/hdc/reports/report.php?&cat_id=f05dcee246d3d761e4637d611d773cb6&id=c673db9d1be8c5a15f87af8c770a2cea"
                                    target="_blank" class="dropdown-item">
                                    ข้อมูลด้านสุขภาพ
                                </a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-question-circle"></i>
                                คู่มือบริการ
                            </a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0" style="font-size: 18px;">
                                <a href="{{ route('manual') }}" class="dropdown-item">คู่มือให้บริการชาวต่างชาติ</a>
                                <a href="{{ route('forensics') }}" class="dropdown-item">แนวทางปฏิบัตินิติเวชสำหรับชาวต่างชาติ</a>
                            </div>
                        </div>
                        <a href="{{ route('service') }}" class="nav-item nav-link">
                            <i class="fas fa-heartbeat"></i>
                            บริการสุขภาพชาวต่างชาติ
                        </a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-bullhorn"></i>
                                ข่าวสาร
                            </a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0" style="font-size: 18px;">
                                <a href="{{ route('news') }}" class="dropdown-item">ประชาสัมพันธ์</a>
                                <a href="{{ route('events') }}" class="dropdown-item">กิจกรรม</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
