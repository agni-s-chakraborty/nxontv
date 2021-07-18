<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@lang('messages.siteName') - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- General CSS Files Old-->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css')}}">

    {{-- <link href="{{ asset('admin/assets/css/v5.0.1/all.css')}}" rel="stylesheet"> --}}
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <!-- General CSS Files New-->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
    <!-- CSS Libraries -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/developer.css')}}">
    @yield('css')
    <style>
        .modal-backdrop {
            display: none!important;
        }
        .modal {
            background: rgba(0, 0, 0, 0.5)!important;
        }
        .modal.show .modal-dialog{
            padding-top: 100px!important;
        }
    </style>
</head>
<body class="layout-3">
    <div id="app">
        <div class="main-wrapper">
            @include('admin.navbar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <!-- Main Content Area Start -->
                    @yield('content')
                <!-- Main Content Area End -->
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    NxtonTv © Copyright {{ now()->year }} All rights reserved | Developed by <a
                        href="https://www.arianus.in">@lang('messages.footer')</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.26/moment-timezone-with-data-10-year-range.js"></script>
    <script src="{{ asset('admin/assets/js/stisla.js')}}"></script>
    <script src="{{ asset('admin/assets/js/developer.js')}}"></script>
    <script src="{{ asset('admin/assets/js/scripts.js')}}"></script>
    <script src="{{ asset('admin/assets/js/custom.js')}}"></script>
    @yield('scripts')
    <script type="text/javascript">window.baseUrl = "<?php echo URL::to('/') ?>";</script>
    <script>window.siteName="@php echo trans('messages.siteName'); @endphp"</script>

    <script>
        var tz = moment.tz.guess();
        document.cookie = "headvalue="+tz;
        $(document).ready(function() {

            // $.ajax({
            //     url: baseUrl+'/settimezone',
            //     type: "POST",
            //     dataType: 'json',
            //     data: {
            //         timezone:tz,
            //         "_token": "{{ csrf_token() }}"
            //     },
            //     success: function (data) {

            //     },
            //     error: function (data) {

            //     }
            // });
            setTimeout(function() {
                $('#successMessage').fadeOut('fast');
            }, 4100);

            setTimeout(function() {
                $('#errorMessage').fadeOut('fast');
            }, 4100);
        });
    </script>
</body>
</html>
