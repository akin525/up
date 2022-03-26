<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="{{asset('asset/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
        <link href="{{asset('asset/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
        <link href="{{asset('asset/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
        <!-- site css -->
        <link rel="stylesheet" href="{{asset('style.css')}}" />
        <!-- responsive css -->
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
        <!-- color css -->
        <link rel="stylesheet" href="{{asset('css/colors.css')}}" />
        <!-- select bootstrap -->
        <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}" />
        <!-- scrollbar css -->
        <link rel="stylesheet" href="{{asset('css/perfect-scrollbar.css')}}" />
        <!-- custom css -->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}" />

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script>
            const rmCheck = document.getElementById("rememberMe"),
                emailInput = document.getElementById("email");

            if (localStorage.checkbox && localStorage.checkbox !== "") {
                rmCheck.setAttribute("checked", "checked");
                emailInput.value = localStorage.username;
            } else {
                rmCheck.removeAttribute("checked");
                emailInput.value = "";
            }

            function lsRememberMe() {
                if (rmCheck.checked && emailInput.value !== "") {
                    localStorage.username = emailInput.value;
                    localStorage.checkbox = rmCheck.value;
                } else {
                    localStorage.username = "";
                    localStorage.checkbox = "";
                }
            }
        </script>
        <!-- jQuery -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <!-- wow animation -->
        <script src="{{asset('js/animate.js')}}"></script>
        <!-- select country -->
        <script src="{{asset('js/bootstrap-select.js')}}"></script>
        <!-- owl carousel -->
        <script src="{{asset('js/owl.carousel.js')}}"></script>

        <!-- nice scrollbar -->
        <script src="{{asset('js/perfect-scrollbar.min.js')}}"></script>
        <script>
            var ps = new PerfectScrollbar('#sidebar');
        </script>
        <!-- custom js -->
        <script src="{{asset('js/custom.js')}}"></script>
        <script src="{{asset('js/chart_custom_style1.js')}}"></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
