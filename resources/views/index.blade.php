@extends('layouts.app')
@section('content')
<!-- Carousel Start -->
{{-- <div class="container-fluid carousel-header vh-100 px-0"> --}}
<div class="container-fluid" style="margin-top: 7rem;">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="{{ asset('img/body.jpg') }}" class="img-fluid" alt="ศูนย์ประสานงานสุขภาพชาวต่างชาติ">
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<div class="container-fluid about  py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-5">
                <div class="h-100">
                    <img src="{{ asset('img/p0.png') }}" class="img-fluid w-100 h-100" alt="Image">
                </div>
            </div>
            <div class="col-xl-7">
                <h5 class="text-uppercase text-primary">เกี่ยวกับเรา</h5>
                <h1 class="mb-4">ศูนย์ประสานงานสุขภาพชาวต่างชาติ</h1>
                <p class="fs-5 mb-4">
                    <small>
                        องค์กรหลักในระดับสาธารณสุขจังหวัดที่ประสานงาน รวบรวมสภาพปัญหา และแก้ไขปัญหา ด้านระบบบริการสุขภาพชาวต่างชาติ
                        ที่สามารถดำเนินการได้ร่วมกับภาคีเครือข่ายที่เกี่ยวข้อง ทั้งภายในและภายในจังหวัดหรือส่งต่อเพื่อดำเนินการในระดับกระทรวงฯ
                    </small>
                    <br><br>
                    <b>บทบาทหน้าที่</b>
                    <br>
                    <ul>
                        <li>กำหนดนโยบาย ยุทธศาสตร์ มาตรการ และแผนการดำเนินงานด้านสาธารณสุขต่างประเทศ ให้สอดคล้องกับพื้นที่ตามภารกิจกระทรวงฯ ในระดับจังหวัด</li>
                        <li>พิจารณาจัดทำคำขอตั้ง/จัดสรรงบประมาณรายจ่ายประจำปี เพื่อใช้ในการบริหารจัดการระบบบริการสุขภาพรับรองชาวต่างชาติในระดับจังหวัด</li>
                        <li>ส่งเสริม สนับสนุนให้เกิดระบบบริการที่เป็นมิตรรองรับชาวต่างชาติ ของโรงพยาบาลในสังกัดภายในจังหวัด</li>
                        <li>เป็นศูนย์กลางของข้อมูลข่าวสาร ประสานและพัฒนา ระบบการประสานงานสาธารณสุขอาเซียนและต่างประเทศในระดับจังหวัด</li>
                        <li>นิเทศก์ กำกับ ติดตามงานตามภารกิจของ คสต. ภาพรวมระดับจังหวัด และร่วมเป็นทีมนิเทศก์ กำกับ ติดตามประเมิน กับ ศสต. ระดับกระทรวงฯ</li>
                        <li>ตรวจสอบความถูกต้อง/ครบถ้วน สรุปวิเคราะห์ข้อมูลบริการสุขภาพชาวต่างชาติของโรงพยาบาลทุกแห่งในระดับจังหวัด</li>
                        <li>สรุปรายงานผลงานตามภารกิจ ศสต. รายไตรมาส</li>
                    </ul>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Services Start -->
<div class="container-fluid service bg-light">
    <div class="py-5">
        <div class="text-center mx-auto pb-5">
            <h5 class="text-uppercase text-primary">สำนักงานสาธารณสุขจังหวัดเชียงใหม่</h5>
            <h2 class="mb-0">สถานที่ให้บริการศูนย์ประสานงานสุขภาพชาวต่างชาติ</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="service-item">
                    <img src="{{ asset('img/p1.jpg') }}" class="img-fluid w-100">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="service-item">
                    <img src="{{ asset('img/p3.jpg') }}" class="img-fluid w-100">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="service-item">
                    <img src="{{ asset('img/p2.jpg') }}" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->

@endsection
@section('script')

@endsection
