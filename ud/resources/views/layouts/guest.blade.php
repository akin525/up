<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- mobile metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <!-- site metas -->
        <title>PrimeData Nig | Data Refill, Airtime, Cable TV, Electricity Subscription</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="https://mobile.primedata.com.ng/images/bn.jpeg"  />
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="{{asset('asset/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
        <link href="{{asset('asset/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
        <link href="{{asset('asset/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
        <!-- site css -->
        <link rel="stylesheet" href="{{asset('style1.css')}}" />
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
        <link rel="stylesheet" href="{{asset('hp/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('hp/main.css')}}" />

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
        <script src="{{asset('hp/main.js')}}"></script>
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
        <style>

            * {
                padding: 0;
                margin: 0
            }


            button {
                padding: 20px 30px;
                font-size: 1.5em;
                /*width:200px;*/
                cursor: pointer;
                border: 0px;
                position: relative;
                margin: 20px;
                transition: all .25s ease;
                background: rgba(116, 23, 231, 1);
                color: #fff;
                overflow: hidden;
                border-radius: 10px
            }

            .load {
                position: absolute;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                background: inherit;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: inherit
            }

            .load::after {
                content: '';
                position: absolute;
                border-radius: 50%;
                border: 3px solid #fff;
                width: 30px;
                height: 30px;
                border-left: 3px solid transparent;
                border-bottom: 3px solid transparent;
                animation: loading1 1s ease infinite;
                z-index: 10
            }

            .load::before {
                content: '';
                position: absolute;
                border-radius: 50%;
                border: 3px dashed #fff;
                width: 30px;
                height: 30px;
                border-left: 3px solid transparent;
                border-bottom: 3px solid transparent;
                animation: loading1 2s linear infinite;
                z-index: 5
            }

            @keyframes loading1 {
                0% {
                    transform: rotate(0deg)
                }

                100% {
                    transform: rotate(360deg)
                }
            }

            button.active {
                transform: scale(.85)
            }

            button.activeLoading .loading {
                visibility: visible;
                opacity: 1
            }

            button .loading {
                opacity: 0;
                visibility: hidden
            }
        </style>

    </head>


    <body>

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>

</html>
