@extends('layouts.app')
@section('content')
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" >
        <h1 class="text-white mb-4">แนวทางปฏิบัตินิติเวชสำหรับชาวต่างชาติ</h1>
    </div>
</div>
<div class="container">
    <div class="container-fluid about  py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-12">
                    <iframe src="{{ asset('files/helathservice.pdf') }}" width="100%" height="800"></iframe>
                    <h5 class="text-uppercase text-primary mt-3">
                        <i class="fas fa-info-circle"></i>
                        แนวทางการพัฒนาระบบบริการชาวสุขภาพแก่นักท่องเที่ยวต่างชาติ
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
