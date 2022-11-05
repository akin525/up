@include('layouts.sidebar')

<script src="{{asset('asset/js/vendor.min.js')}}" type="847c8da2504a1915642ffbeb-text/javascript"></script>
<script src="{{asset('asset/js/app.min.js')}}" type="847c8da2504a1915642ffbeb-text/javascript"></script>
<script src="{{asset('asset/js/theme/default.min.js')}}" type="847c8da2504a1915642ffbeb-text/javascript"></script>



<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>My Dashboard</h2>
                </div>
            </div>
        </div>
{{--<div class="alert alert-info">--}}
{{--    <button type='button' class='close text-white' data-dismiss='alert'>&times;</button>--}}
{{--    <i class="fa fa-bell"></i><b>Account Status:</b><h6 class="align-content-center text-center text-white"><b>@if(Auth::user()->apikey ==NULL)--}}
{{--        *Member* <button type="button" class="btn btn-success" onclick="window.location.href='https://mobile.primedata.com.ng/reseller';">Click to upgrade</button> @else*Reseller*--}}
{{--        @endif</b></h6>--}}
{{--</div>--}}

{{--        <div class='alert alert-info'>--}}
{{--            <button type='button' class='close' data-dismiss='alert'>&times;</button>--}}
{{--            <i class='fa fa-ban-circle'></i><strong>Notification: </br></strong>Welcome Back {{"$user->username"}}--}}
{{--        </div>--}}
        <div class='alert alert-info'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <i class='fa fa-ban-circle'></i><h6 class="text-white">Important Notification: </br><b>{{$me->message}}</b></h6>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="alert alert-info">
                    @foreach($wallet as $wallet1)
                        @if ($wallet1->account_number==1 && $wallet1->account_name==1)
                            <a href='{{route('vertual')}}' class='text-white'>Click this section to get your permament Virtual Bank Account (Transfer money to the account no to get your PrimeData Wallet funded instantly!)</a>
                        @else
                            <div class="row column1">
                                <div class="col-md-7 col-lg-6">
                                    <div class="card-body">
                                        <ul style="list-style-type:square">
                                            <li class="text-white"><h3 class="text-white"><b>Personal Vertual Account Number</b></h3></li>
                                            <br>
                                            <li class='text-white'><h5 class="text-white"><b>{{$wallet1->account_name}}</b></h5></li>
                                            <li class='text-white'><h5 class="text-white"><b>Account No:{{$wallet1->account_number}}</b></h5></li>
                                            <li class='text-white'><h5 class="text-white"><b>WEMA-BANK</b></h5></li>
                                            <br>
                                            <li class='text-white'><h5 class="text-white"><b>Note: All vertual funding are being set automatically</b></h5></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-6">
                                    <div>
                                        <center>
                                            <a href="#">
                                                <img width="200" src="{{asset("images/bn.jpeg")}}"  alt="">
                                            </a>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6>Your Referal Link</h6>
                <!-- The text field -->
                <input id="myInput" type="text" class="form-control" value="https://mobile.primedata.com.ng/register?refer={{$user->username}}" >

                <!-- The button used to copy the text -->
                <button class="btn-info" onclick="myFunction()">Copy Referal Link</button>
            </div>
        </div>

        <style>
            img {
                max-width: 100%;
                height: auto;
            }
        </style>
        <div class="card-body">
            <div class="center">
                <img    src="{{asset('images/banner.jpg')}}" alt="#" />
            </div>
        </div>

        <br>

        <style>
            .tooltip {
                position: relative;
                display: inline-block;
            }

            .tooltip .tooltiptext {
                visibility: hidden;
                width: 140px;
                background-color: #555;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 5px;
                position: absolute;
                z-index: 1;
                bottom: 150%;
                left: 50%;
                margin-left: -75px;
                opacity: 0;
                transition: opacity 0.3s;
            }

            .tooltip .tooltiptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #555 transparent transparent transparent;
            }

            .tooltip:hover .tooltiptext {
                visibility: visible;
                opacity: 1;
            }

        </style>

        <script>
            function myFunction() {
                /* Get the text field */
                var copyText = document.getElementById("myInput");

                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                navigator.clipboard.writeText(copyText.value);

                /* Alert the copied text */
                alert( copyText.value);
            }
        </script>
        <br>
    <!-- end graph -->

    <!-- end graph -->
    <br>
    <div class="row column1">
        <div class="col-md-6 col-lg-4">
            <div class="full counter_section margin_bottom_30">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-google-wallet yellow_color"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <h5 class="total_no text-center">₦{{number_format(intval($wallet1->balance *1),2)}}</h5>
                        <h6 class="head_couter">Wallet Balance</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="full counter_section margin_bottom_30">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-money blue1_color"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <h5 class="total_no text-center">₦{{number_format(intval($totaldeposite *1), 2)}}</h5>
                        <h6 class="head_couter">Total Deposit</h6>
                    </div>















                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="full counter_section margin_bottom_30">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-money green_color"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <h5 class="total_no text-center">₦{{number_format(intval($bill *1),2)}}</h5>
                        <h6 class="head_couter">Total Bills</h6>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row column1">
        <div class="col-md-7 col-lg-6">
            <div class="full counter_section margin_bottom_30">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-users yellow_color"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <h5 class="total_no text-center">{{$count}}</h5>
                        <h6 class="head_couter">Number Of Referal</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-lg-6">
            <div class="full counter_section margin_bottom_30">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-money blue1_color"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <h5 class="total_no text-center">₦{{number_format(intval($totalrefer *1),2)}}</h5>
                        <h6 class="head_couter">Referal Bonus</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="row column3">
            <div class="col-md-6">
                <div class="dark_bg full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Your Last Deposit</h2>
                        </div>
                    </div>
                    <div class="full graph_revenue">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content testimonial">
                                    <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for carousel items -->
                                        <div class="carousel-inner">
                                            @foreach($pam as $deposit)
                                                <div class="item carousel-item active">
                                                    <div class="img-box"><img src="https://mobile.primedata.com.ng/images/bn.jpeg" alt=""></div>
                                                    <p class="testimonial">Your Account Was Funded With ₦{{number_format(intval($deposit->amount *1),2)}} On {{$deposit->date}}.</p>
                                                    <p class="overview"><b>Payment Confirmed</b>By Admin</p>
                                                </div>
                                            @endforeach
                                            @foreach($pam1 as $deposit1)
                                                <div class="item carousel-item">
                                                    <div class="img-box"><img src="https://mobile.primedata.com.ng/images/bn.jpeg" alt=""></div>
                                                    <p class="testimonial">Your Account Was Funded With ₦{{number_format(intval($deposit1->amount *1),2)}} On {{$deposit1->date}}.</p>
                                                    <p class="overview"><b>Payment Confirmed</b>By Admin</p>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Carousel controls -->
                                        <a class="carousel-control left carousel-control-prev" href="#testimonial_slider" data-slide="prev">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                        <a class="carousel-control right carousel-control-next" href="#testimonial_slider" data-slide="next">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>Progress Bar</h2>
                        </div>
                    </div>
                    <div class="full progress_bar_inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="progress_bar">
                                    <!-- Skill Bars -->
                                    <span class="skill" style="width: 80%;">Total Deposit<span class="info_valume">{{$cdeposite}}</span></span>
                                    <div class="progress skill-bar ">
                                        <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="{{$cdeposite}}" aria-valuemin="0" aria-valuemax="1000" style="width: {{$cdeposite}}%;">
                                        </div>
                                    </div>
                                    <span class="skill" style="width:80%;">Total Purchase<span class="info_valume">{{$cbill}}</span></span>
                                    <div class="progress skill-bar ">
                                        <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="{{$cbill}}" aria-valuemin="0" aria-valuemax="1000" style="width: {{$cbill}}%;">
                                        </div>
                                    </div>
                                    <span class="skill" style="width:80%;">Total All Transaction<span class="info_valume">{{$all}}</span></span>
                                    <div class="progress skill-bar ">
                                        <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="{{$all}}" aria-valuemin="0" aria-valuemax="1000" style="width: {{$all}}%;">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>
                    <!--                            My Invoice</h3>-->
            </div>
            <link href="{{asset('asset/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
            <link href="{{asset('asset/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
            <link href="{{asset('asset/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" />

            <div class="content">
                <div class="module">
                    <div class="module-head">
                        <div class="card">
                            <div class="card-body">
                                <h3>Transactions</h3>
                                <div class="table-responsive">
                                    <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                                        <thead>
                                            <th>Date</th>
                                            <th>Username</th>
                                            <th>Plan</th>
                                            <th>Amount</th>
                                            <th>Phone No</th>
                                            <th>Payment_Ref</th>
                                            <th>Token </th>
                                            <!--                                                    <th>Action</th>-->

                                        </thead>
                                        <tbody>
                                        @foreach($bil2 as $re)
                                            <tr>
                                                <td>{{$re->date}}</td>
                                                <td>{{$re->username}}</td>
                                                <td>{{$re->plan}}</td>
                                                <td>{{$re->amount}}</td>
                                                <td>{{$re->phone}}</td>
                                                <td>{{$re->refid}}</td>
                                                <td>{{$re->token}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
