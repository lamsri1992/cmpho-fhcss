@extends('layouts.app')
@section('content')
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" >
        <h1 class="text-white mb-4">กิจกรรม</h1>
    </div>
</div>
<div class="container">
    <div class="container-fluid">
        <div class="container py-3">
            <div class="row g-5">
                <div class="col-xl-12">
                    <div class="row"> 
                        @foreach ($data as $rs)
                            <div class="col-md-3">
                                <div class="card" style="height: 100%;">
                                    @php $img = explode(',',$rs->events_img); @endphp
                                    <img src="{{ asset('img/events')."/".$img[0] }}" class="card-img-top" style="height: 200px;">
                                    <div class="card-body">
                                        <div class="col-md-12 row">
                                            <small class="text-muted">
                                                <i class="far fa-calendar"></i>
                                                {{ date("d/m/Y", strtotime($rs->events_date)) }}
                                            </small>
                                            <div class="mt-2">
                                                <h4 class="mb-4">{{ $rs->events_title }}</h4>
                                            </div>
                                        </div>
                                        <a href="{{ route('front.events.view',$rs->events_id) }}" class="btn-hover-bg btn btn-primary btn-sm text-white py-2 px-4" style="width: 100%;">
                                            <i class="fas fa-search"></i>
                                            รายละเอียด
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
