@extends('admin.layouts.backend')
@section('content')
<style>
    img {
        width: 10%;
        padding-right: 1%;
    }
</style>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            <i class="far fa-images"></i>
            กิจกรรม
        </h1>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.events') }}">รายการกิจกรรม</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $data->events_title }}</li>
            </ol>
        </nav>
    </div>
    <form action="{{ route('events.update',$data->events_id) }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">การเผยแพร่ 
                        <small class="text-muted">({{ "เผยแพร่เมื่อวันที่ ".date("d/m/Y", strtotime($data->events_date)) }})</small>
                    </label>
                    <select class="form-select" name="events_status">
                        @foreach ($stat as $rs)
                            <option value="{{ $rs->status_id }}"
                                {{ ($data->events_status == $rs->status_id) ? 'SELECTED' : '' }}>
                                {{ $rs->status_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">หัวข้อกิจกรรม</label>
                    <input type="text" class="form-control" name="events_title" placeholder="ระบุหัวข้อกิจกรรม" value="{{ $data->events_title }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">เนื้อหากิจกรรม</label>
                    <textarea class="form-control" name="events_text" rows="5" placeholder="ระบุเนื้อหากิจกรรม">{{ $data->events_text }}</textarea>
                </div>
            </div>
            <div class="">
                <button type="button" class="btn btn-success btn-sm" onclick="
                    Swal.fire({
                        icon: 'question',
                        title: 'ยืนยันการแก้ไขกิจกรรม ?',
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
    <div class="mt-2">
        @php $img = explode(',',$data->events_img); @endphp
        <label for="" class="form-label">รูปภาพกิจกรรม</label>
        <div class="row">
            @foreach ($img as $imgs)
            <div class="col-md-3 mt-2">
                <div class="card">
                    <img src="{{ asset('img/events')."/".$imgs }}" class="card-img-top">
                    <div class="card-body text-center">
                        <p class="card-text">
                            {{ $imgs }}
                        </p>
                        <form action="{{ route('events.delete',$data->events_id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="img" value="{{ $imgs }}">
                            <button type="button" class="btn btn-danger btn-sm" onclick="
                                 Swal.fire({
                                    icon: 'error',
                                    title: 'ยืนยันการลบภาพ ?',
                                    text: '{{ $imgs }}',
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
                                <i class="fas fa-trash"></i>
                                ลบภาพนี้
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mt-2">
        <form action="{{ route('events.add',$data->events_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            แนบรูปภาพเพิ่ม
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
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
                        <div class="mb-4 text-center">
                            <button type="button" class="btn btn-success btn-sm" onclick="
                                Swal.fire({
                                    icon: 'question',
                                    title: 'ยืนยันการเพิ่มรูปภาพ ?',
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
                                <i class="fas fa-plus"></i>
                                เพิ่มรูปภาพ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
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
