@extends('layouts.app')
@section('content')
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" >
        <h1 class="text-white mb-4">ประชาสัมพันธ์</h1>
       <span class="text-white">{{ $data->news_title }}</span>
    </div>
</div>
<div class="container">
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-12">
                    <h5 class="text-primary">
                        <i class="far fa-edit"></i>
                        {{ $data->news_title }}
                    </h5>
                    <p class="fs-5 mb-4">
                        {{ $data->news_text }}
                    </p>
                    <i>
                        <small>
                            <a href="{{ asset('files/news')."/".$data->news_files }}" target="_blank">
                                <i class="fas fa-paperclip"></i>
                                ไฟล์แนบ : {{ $data->news_files }}
                            </a>
                        </small>
                    </i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
