@extends('admin.layouts.backend')
@section('content')
<style>
    img {
        width: 10%;
        padding-right: 1%;
    }
</style>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            <i class="far fa-images"></i>
            กิจกรรม
        </h1>
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#eventsModal">
            <i class="fas fa-plus-circle"></i>
            เพิ่มกิจกรรม
        </button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>
                            <i class="far fa-image"></i>
                            หัวข้อกิจกรรม
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
                            <td class="text-center">{{ $rs->events_id }}</td>
                            <td>{{ $rs->events_title }}</td>
                            <td class="text-center">
                                <span class="{{ $rs->status_color }}">
                                    {!! $rs->status_icon !!}
                                    {{ $rs->status_name }}
                                </span>
                            </td>
                            <td class="text-center">
                                {{ date("d/m/Y", strtotime($rs->events_date)) }}</td>
                            <td class="text-center">
                                <a href="{{ route('events.show',$rs->events_id) }}"
                                    class="btn btn-primary btn-sm">
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
<div class="modal fade" id="eventsModal" tabindex="-1" aria-labelledby="eventsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('events.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eventsModalLabel">
                        <i class="fas fa-plus-circle"></i>
                        เพิ่มกิจกรรม
                    </h1>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">หัวข้อกิจกรรม</label>
                        <input type="text" class="form-control" name="events_title" placeholder="ระบุหัวข้อกิจกรรม">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">เนื้อหากิจกรรม</label>
                        <textarea class="form-control" name="events_text" rows="5" placeholder="ระบุเนื้อหากิจกรรม"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">แนบรูปภาพ</label>
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <div id="drop-area"
                                        class="border rounded d-flex justify-content-center align-items-center"
                                        style="height: 200px; cursor: pointer">
                                        <div class="text-center">
                                            <i class="bi bi-cloud-arrow-up-fill text-primary"
                                                style="font-size: 48px"></i>
                                            <p class="mt-3">
                                                Drag and drop your image here or click to select a file.
                                            </p>
                                        </div>
                                    </div>
                                    <input type="file" id="fileElem" name="events_img[]" multiple accept="image/*" class="d-none" />
                                    <div id="gallery">
                                        <div class="mt-2">
                                            <p>Preview</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">ปิดหน้าต่าง</button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="
                        Swal.fire({
                            icon: 'question',
                            title: 'ยืนยันการเพิ่มกิจกรรม ?',
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

<script>
    let dropArea = document.getElementById('drop-area');
    let fileElem = document.getElementById('fileElem');
    let gallery = document.getElementById('gallery');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    dropArea.addEventListener('drop', handleDrop, false);

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight(e) {
        dropArea.classList.add('highlight');
    }

    function unhighlight(e) {
        dropArea.classList.remove('highlight');
    }

    function handleDrop(e) {
        let dt = e.dataTransfer;
        let files = dt.files;
        handleFiles(files);
    }

    dropArea.addEventListener('click', () => {
        fileElem.click();
    });

    fileElem.addEventListener('change', function (e) {
        handleFiles(this.files);
    });

    function handleFiles(files) {
        files = [...files];
        files.forEach(previewFile);
    }

    function previewFile(file) {
        let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function () {
            let img = document.createElement('img');
            img.src = reader.result;
            gallery.appendChild(img);
        }
    }

</script>
@endsection
