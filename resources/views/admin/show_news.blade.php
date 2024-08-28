@extends('admin.layouts.backend')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">ข่าวประชาสัมพันธ์</h1>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.news') }}">รายการข่าวประชาสัมพันธ์</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $data->news_title }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('news.update',$data->news_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">การเผยแพร่ 
                                <small class="text-muted">({{ "เผยแพร่เมื่อวันที่ ".date("d/m/Y", strtotime($data->news_date)) }})</small>
                            </label>
                            <select class="form-select" name="news_status">
                                @foreach ($stat as $rs)
                                    <option value="{{ $rs->status_id }}"
                                        {{ ($data->news_status == $rs->status_id) ? 'SELECTED' : '' }}>
                                        {{ $rs->status_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">หัวข้อข่าว</label>
                            <input type="text" class="form-control" name="news_title" placeholder="ระบุหัวข้อข่าว" value="{{ $data->news_title }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">เนื้อหาข่าว</label>
                            <textarea class="form-control" name="news_text" rows="5" placeholder="ระบุเนื้อหาข่าว">{{ $data->news_text }}</textarea>
                        </div>
                        <div class="mb-3">
                            <a href="{{ asset('files/news')."/".$data->news_files }}" target="_blank">
                                <strong>
                                    <i class="fas fa-file"></i>
                                    {{ $data->news_files }}
                                </strong>
                            </a>
                            <br>
                            <label for="" class="form-label">ไฟล์แนบ</label>
                            <input type="file" class="form-file" name="news_files">
                        </div>
                    </div>
                    <div class="">
                        <button type="button" class="btn btn-success btn-sm"
                        onclick="
                            Swal.fire({
                                icon: 'question',
                                title: 'ยืนยันการแก้ไขข่าวประชาสัมพันธ์ ?',
                                showCancelButton: true,
                                confirmButtonText: 'ยืนยัน',
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    form.submit()
                                } else if (result.isDenied) {
                                    form.reset()
                                }
                            });
                        ">
                            <i class="far fa-save"></i>
                            บันทึกข้อมูล
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
@section('script')

@endsection
