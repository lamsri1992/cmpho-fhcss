<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CMPHO - Foreign Health Service Collaboration Center</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('temp/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('temp/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('temp/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('temp/css/style.css') }}" rel="stylesheet">
    
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.24.0-lts/full/ckeditor.js"></script>
</head>
<style>
    .goog-te-combo, .VIpgJd-ZVi9od-ORHb *, .VIpgJd-ZVi9od-SmfZ *, .VIpgJd-ZVi9od-xl07Ob *, .VIpgJd-ZVi9od-vH1Gmf *, .VIpgJd-ZVi9od-l9xktf * {
    font-family: "Noto Sans Thai" !important;
    font-size: 10pt;
}
</style>
<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    @include('layouts.nav')
    @yield('content')
    @include('layouts.footer')
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('temp/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('temp/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('temp/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('temp/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('temp/lib/lightbox/js/lightbox.min.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('temp/js/main.js') }}"></script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'th'}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
@section('script')
@show

</html>
