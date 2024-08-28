@extends('admin.layouts.backend')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            <i class="fas fa-bullhorn"></i>
            ข่าวประชาสัมพันธ์
        </h1>
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#newsModal">
            <i class="fas fa-plus-circle"></i>
            เพิ่มข่าวประชาสัมพันธ์
        </button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>
                            <i class="far fa-newspaper"></i>
                            หัวข้อข่าว
                        </th>
                        <th class="text-center">
                            สถานะ
                        </th>
                        <th class="text-center">
                            <i class="far fa-calendar"></i>
                            วันที่เผยแพร่
                        </th>
                        <th class="text-center">
                            <i class="fas fa-cog"></i>
                            จัดการ
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $rs)
                        <tr>
                            <td class="text-center">{{ $rs->news_id }}</td>
                            <td>{{ $rs->news_title }}</td>
                            <td class="text-center">
                                <span class="{{ $rs->status_color }}">
                                    {!! $rs->status_icon !!}
                                    {{ $rs->status_name }}
                                </span>
                            </td>
                            <td class="text-center">{{ date("d/m/Y", strtotime($rs->news_date)) }}</td>
                            <td class="text-center">
                                <a href="{{ route('news.show',$rs->news_id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-search"></i>
                                    รายละเอียด
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="newsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('news.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newsModalLabel">
                        <i class="fas fa-plus-circle"></i>
                        เพิ่มข่าวประชาสัมพันธ์
                    </h1>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">หัวข้อข่าว</label>
                        <input type="text" class="form-control" name="news_title" placeholder="ระบุหัวข้อข่าว">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">เนื้อหาข่าว</label>
                        <textarea class="form-control" name="news_text" rows="5" placeholder="ระบุเนื้อหาข่าว"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">ไฟล์แนบ</label>
                        <input type="file" class="form-file" name="news_files">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">ปิดหน้าต่าง</button>
                    <button type="button" class="btn btn-primary btn-sm"
                    onclick="
                        Swal.fire({
                            icon: 'question',
                            title: 'ยืนยันการเพิ่มข่าวประชาสัมพันธ์ ?',
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
@endsection
@section('script')
<script>
    new DataTable('#example');
</script>
@endsection
