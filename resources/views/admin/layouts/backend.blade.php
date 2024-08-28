<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>ระบบจัดการเว็บไซต์ - HSCC</title>
    <link href="{{ asset('web/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('web/custom.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
</head>

<body>
    @include('admin.layouts.header')
    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.nav')
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="{{ asset('web/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    
    @if($message = Session::get('success'))
    <script>
        $(function() {
            var Toast = Swal.mixin({
                position: 'top-end',
                toast: true,
                showConfirmButton: false,
                timer: 5000
            });
                Toast.fire({
                icon: 'success',
                title: '{{ $message }}'
            })
        });
    </script>
    @endif

    @if($errors->any())
    <script>
        Swal.fire({
            title: 'พบข้อผิดพลาด',
            icon: 'warning',
            html: '<div class="text-start">'+
                    '<ul>'+
                        '@foreach ($errors->all() as $error)' +
                            '<li>{{ $error }}</li>' +
                            '@endforeach'+
                        '</ul>'+
                    '</div>'
                })
    </script>
    @endif
    
    @section('script')
    @show
</body>

</html>
