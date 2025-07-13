<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="description"
        content="Dreams POS is a powerful Bootstrap based Inventory Management Admin Template designed for businesses, offering seamless invoicing, project tracking, and estimates.">
    <meta name="keywords"
        content="inventory management, admin dashboard, bootstrap template, invoicing, estimates, business management, responsive admin, POS system"> --}}
    <meta name="author" content="ZB Solutions">
    <meta name="robots" content="index, follow">


    <title>ZB POS</title>

    <script src="{{ asset('assets/js/theme-script.js') }}" type="text/javascript"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <!-- animation CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables-bootstrap5.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.theme.default.min.css') }}">
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/@simonwep/pickr/themes/nano.min.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @stack('css')

</head>

<body class="pos-page">
    <x-app-loader />
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <x-pos-header />
        <!-- /Header -->

        @yield('content')


    </div>
    <!-- /Main Wrapper -->


    @yield('models')


    <!-- jQuery -->
    <script data-cfasync="false"
        src="{{ asset('assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script
			src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('assets/js/feather.min.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>

    <!-- Datatable JS -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>

    <!-- Daterangepikcer JS -->
    <script src="{{ asset('assets/js/moment.min.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>

    <!-- Owl JS -->
    <script src="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>

    <!-- Sticky-sidebar -->
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>
    <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('assets/plugins/@simonwep/pickr/pickr.es5.min.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>

    <!-- Custom JS -->
    <script src="{{ asset('assets/js/theme-colorpicker.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>
    <script src="{{ asset('assets/js/calculator.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>
    <script src="{{ asset('assets/js/script.js') }}"
			type="0d1c8ee9f1d1c5afa5b8c72e-text/javascript"></script>

    <script src="{{ asset('assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="0d1c8ee9f1d1c5afa5b8c72e-|49" defer></script>
    <script defer
        src="{{ url('https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015') }}"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"954235ede8bb5134","version":"2025.6.2","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}'
        crossorigin="anonymous"></script>

        @stack('js')
    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                $("#searchInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase().trim();
                    $("#productList li").filter(function() {
                        $(this).toggle(
                            $(this).text().toLowerCase().indexOf(value) > -1
                        );
                    });
                });
            });
        });
    </script>
</body>

</html>
