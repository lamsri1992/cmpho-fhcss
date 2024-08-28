@extends('layouts.app')
@section('content')
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" >
        <h1 class="text-white mb-4">ข้อมูลศูนย์ประสานงานสุขภาพชาวต่างชาติ (ศสต.) จังหวัดเชียงใหม่</h1>
    </div>
</div>

<div class="container">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-12">
                {!! $data->role_text !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
