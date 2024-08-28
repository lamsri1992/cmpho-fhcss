@extends('layouts.app')
@section('content')
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" >
        <h1 class="text-white mb-4">ประชาสัมพันธ์</h1>
    </div>
</div>
<div class="container">
    <div class="container-fluid">
        <div class="container py-3">
            <div class="row g-5">
                <div class="col-xl-12">
                    <ul class="list-group">
                        @foreach ($data as $rs)
                        <li class="list-group-item">
                            <a href="{{ route('front.news.view',$rs->news_id) }}">
                                <div class="row">
                                    <div class="col-md-8">
                                        <i class="far fa-edit"></i>
                                        {{ $rs->news_title }}
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <i class="far fa-calendar"></i>
                                        {{ date("d/m/Y", strtotime($rs->news_date)) }}
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
