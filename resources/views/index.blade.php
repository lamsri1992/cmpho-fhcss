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

<!-- Services Start -->
<div class="container-fluid service bg-light">
    <div class="py-5">
        <div class="text-center mx-auto pb-5">
            <h5 class="text-uppercase text-primary">สำนักงานสาธารณสุขจังหวัดเชียงใหม่</h5>
            <h2 class="mb-0">สถานที่ให้บริการศูนย์ประสานงานสุขภาพชาวต่างชาติ</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="service-item">
                    <img src="{{ asset('img/place02.jpg') }}" class="img-fluid w-100">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="service-item">
                    <img src="{{ asset('img/place03.jpg') }}" class="img-fluid w-100">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="service-item">
                    <img src="{{ asset('img/place04.jpg') }}" class="img-fluid w-100">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="service-item">
                    <img src="{{ asset('img/place05.jpg') }}" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->

@endsection
@section('script')

@endsection
