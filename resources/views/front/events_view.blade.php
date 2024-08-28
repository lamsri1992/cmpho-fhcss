@extends('layouts.app')
@section('content')
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5">
        <h1 class="text-white mb-4">กิจกรรม</h1>
        <span class="text-white">{{ $data->events_title }}</span>
    </div>
</div>
<div class="container">
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-12">
                    <div class="mt-2">
                        @php $img = explode(',',$data->events_img); @endphp
                        <small class="text-muted">
                            <i class="far fa-calendar"></i>
                            {{ date("d/m/Y", strtotime($data->events_date)) }}
                        </small>
                        <div class="row">
                            @foreach ($img as $imgs)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="{{ asset('img/events')."/".$imgs }}" class="card-img-top">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <h5 class="text-primary">
                        <i class="far fa-edit"></i>
                        {{ $data->events_title }}
                    </h5>
                    <p class="fs-5 mb-4">
                        {{ $data->events_text }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
