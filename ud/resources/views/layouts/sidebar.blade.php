<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>{{Auth::user()->name }} Dashboard</title>
    <meta name="keywords" content="Buy data in a few clicks to keep surfing the internet. You can buy whatever size of data plan for whichever network you desire. All plans are topped-up to your specified number in seconds.">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel="icon" href="https://mobile.primedata.com.ng/images/bn.jpeg"  />
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
    <style>
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <style>
        .subscribe {
            position: relative;
            padding: 20px;
            background-color: #FFF;
            border-radius: 4px;
            color: #333;
            box-shadow: 0px 0px 60px 5px rgba(0, 0, 0, 0.4);
        }

        .subscribe:after {
            position: absolute;
            content: "";
            right: -10px;
            bottom: 18px;
            width: 0;
            height: 0;
            border-left: 0px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #208b37;
        }

        .subscribe p {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 4px;
            line-height: 28px;
        }



        .subscribe .submit-btn {
            position: absolute;
            border-radius: 30px;
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
            background-color: #208b37;
            color: #FFF;
            padding: 12px 25px;
            display: inline-block;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 5px;
            right: -10px;
            bottom: -20px;
            cursor: pointer;
            transition: all .25s ease;
            box-shadow: -5px 6px 20px 0px rgba(26, 26, 26, 0.4);
        }

        .subscribe .submit-btn:hover {
            background-color: #208b37;
            box-shadow: -5px 6px 20px 0px rgba(88, 88, 88, 0.569);
        }
    </style>

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
            /*margin: 20px;*/
            transition: all .25s ease;
            background: rgba(116, 23, 231, 1);
            color: #fff;
            overflow: hidden;
            /*border-radius: 10px*/
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

<body class="dashboard dashboard_1">
<div id="loading-wrapper">
    <div class="spinner-border" style="color: #FF0066"></div>
    PRIMEDATA......
</div>
<div class="full_container">
    <div class="inner_container">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar_blog_1">
                <div class="sidebar-header">
                    <div class="logo_section">
                        <a href="#"><img class="logo_icon img-responsive" src="{{asset("images/bn.jpeg")}}" alt="#" /></a>
                    </div>
                </div>
                <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">
                        @if(Auth::user()->profile_photo_path==NULL)
                            <div class="user_img"><img class="img-responsive" src="{{asset("images/layout_img/user_img.jpg")}}" alt="#" /></div>
                        @else
                            <div class="user_img"><img class="img-responsive" src="{{url('/', Auth::user()->profile_photo_path)}}" alt="#" /></div>
                        @endif
                        <div class="user_info">
                            <h6> {{ Auth::user()->username}}</h6>
                            <p><span class="online_animation"></span> Online</p>
                        </div>
                    </div>
                    <form method="post" action="{{route('pic')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="pic" required><button type="submit" class="badge badge-success">Upload</button>
                    </form>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <br>
                        <a href="{{ route('logout') }}"><button type="submit" class="btn btn-success">logout</button></a>
                    </form>
                </div>

            </div>
            <div class="sidebar_blog_2">
                <h4>General</h4>
                <ul class="list-unstyled components">
                    @if(Auth::user()->role=="admin")
                        <li class="active">
                            <a href="{{ route('admin/dashboard') }}"  ><i class="fa fa-amazon white_color"></i> <span>Administrartor</span></a>
                        </li>
                    @endif
                    <li class="active">
                        <a href="{{ route('dashboard') }}"  ><i class="fa fa-dashboard white_color"></i> <span>Dashboard</span></a>
                    </li>
                        <li>
                            <a href="{{route('invoice')}}"><i class="fa fa-sticky-note orange_color"></i> <span>Bills Invoice</span></a>
                        </li>
                    <li><a href="{{ route('fund') }}"><i class="fa fa-credit-card orange_color"></i> <span>Fund Wallet</span></a></li>
                        <li>
                            <a href="#app4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-bullhorn"></i> <span>Recharge</span></a>
                            <ul class="collapse list-unstyled" id="app4">
                                @if(Auth::user()->apikey ==NULL)
                                    <li>
                                        <a href="{{route('select')}}"><i class="fa fa-laptop "></i> <span>Buy Data</span></a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('select1')}}"><i class="fa fa-laptop "></i> <span>Reseller Data</span></a>
                                    </li>
                                @endif

                                <li>
                                    <a href="{{route('airtime')}}"><i class="fa fa-phone "></i> <span>Buy Airtime</span></a>
                                </li>
                                <li>
                                    <a href="{{url('tv')}}"><i class="fa fa-tv"></i> <span>Pay Tv</span></a>
                                </li>


                                <li>
                                    <a href="{{route('elect')}}"><i class="fa fa-power-off"></i> <span>Pay Electricity</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#app7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users"></i> <span>Self Service</span></a>
                            <ul class="collapse list-unstyled" id="app7">
                                <li><a href="{{ url('verifybill') }}"><i class="fa fa-bookmark"></i> <span>Verify Airtime/Data</span></a></li>
                                <li><a href="{{ url('verifydeposit') }}"><i class="fa fa-newspaper-o"></i> <span>Verify Deposit</span></a></li>

                            </ul>
                        </li>
                    <li>
                        <a href="{{route('referal')}}"><i class="fa fa-laptop "></i> <span>Referal System</span></a>
                    </li>
                        <li>
                            <a href="#app3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user"></i> <span>Profile</span></a>
                            <ul class="collapse list-unstyled" id="app3">
                                @if(Auth::user()->apikey ==NULL)
                                    <li>
                                        <a href="{{route('reseller')}}"><i class="fa fa-shopping-cart yellow_color"></i> <span>Become Reseller</span></a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('upgrade')}}"><i class="fa fa-book "></i> <span>Api</span></a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{route('myaccount')}}"><i class="fa fa-user "></i> <span>My Profile</span></a>
                                </li>
                                <li class="active">
                                    <a href="{{ route('profile.show') }}"  ><i class="fa fa-user white_color"></i> <span>Account Setting</span></a>
                                </li>

                            </ul>
                        </li>
                    <li>
                        <a href="{{route('charges')}}"><i class="fa fa-sticky-note orange_color"></i> <span>Charges</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="content">
            <!-- topbar -->
            <div class="topbar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                            <a href="{{ route('dashboard') }}"><img class="img-responsive" src="{{asset("images/bn.jpeg")}}" alt="#" /></a>
                        </div>
                        {{--                        <div class="right_topbar">--}}
                        {{--                            <div class="icon_info">--}}
                        {{--                                <!--                                <ul>-->--}}
                        {{--                                <!--                                    <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a>-->--}}
                        {{--                                <!--                                  -->--}}
                        {{--                                <!--                                    </li>-->--}}
                        {{--                                <!---->--}}
                        {{--                                <!--                                    <li><a href="#"><i class="fa fa-question-circle"></i></a></li>-->--}}
                        {{--                                <!--                                    <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>-->--}}
                        {{--                                <!--                                </ul>-->--}}
                        {{--                                <ul class="user_profile_dd">--}}
                        {{--                                    <li>--}}
                        {{--                                        <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{asset("images/layout_img/user_img.jpg")}}" alt="#" /><span class="name_user" > {{ Auth::user()->name }}</span></a>--}}
                        {{--                                        <div class="dropdown-menu">--}}
                        {{--                                            <a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a>--}}
                        {{--                                            <a class="dropdown-item" href="profile.php">Settings</a>--}}
                        {{--                                            <!--                                            <a class="dropdown-item" href="help.html">Help</a>-->--}}
                        {{--                                            <a class="dropdown-item" href=""><span>Log Out</span> <i class="fa fa-sign-out"></i></a>--}}
                        {{--                                        </div>--}}
                        {{--                                    </li>--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </nav>
            </div>
        @include('sweetalert::alert')

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

            <script src="{{asset('hp/jquery.min.js')}}"></script>
            <script src="{{asset('hp/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('hp/modernizr.js')}}"></script>
            <script src="{{asset('hp/moment.js')}}"></script>
            <script src="{{asset('hp/main.js')}}"></script>



            {{-- toastr js --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


