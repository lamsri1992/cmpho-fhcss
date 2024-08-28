@extends('admin.layouts.backend')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            <i class="fas fa-book"></i>
            จัดการข้อมูลศูนย์ประสานงานสุขภาพชาวต่างชาติ
        </h1>
    </div>
    <div class="row">
        <form action="{{ route('admin.role.update') }}" method="POST" enctype="multipart/form-data">
            @csrf            
            <textarea name="content" id="roleEditor">{{ $data->role_text }}</textarea>
            <div class="mt-2">
                <button type="button" class="btn btn-success"
                    onclick="
                        Swal.fire({
                            icon: 'question',
                            title: 'ยืนยันการบันทึกข้อมูล ?',
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
                    <i class="fas fa-save"></i>
                    บันทึกข้อมูล
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
@section('script')
<script>
    CKEDITOR.replace('roleEditor',{
        width: '100%',
        height: '480px'
    });
    
</script>
@endsection