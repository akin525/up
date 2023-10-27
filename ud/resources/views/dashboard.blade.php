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
        <div class="alert alert-info alert-dismissible alert-alt fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            </button>
            <strong>Alert!</strong> {{$me->message}}.
        </div>

{{--        <div class="card">--}}
{{--            <div class="card-body">--}}
{{--                <div class="alert alert-secondary">--}}
{{--                    <center>--}}
{{--                        <!--                    <h4 class="w3-text-green"><b>&nbsp;&nbsp; &nbsp;&nbsp; <a class="w3-btn w3-green w3-border w3-round-large" href="with.php">Withdraw From MCD Wallet</a>-->--}}
{{--                        <a class="badge badge-info" href="{{route('invoice')}}">Get Invoice</a>--}}
{{--                        <a class="badge badge-info" href="{{route('airtime')}}">Airtime</a>--}}

{{--                        <a class="badge badge-info" href="{{route('tv')}}">Paytv</a>--}}
{{--                        <a class="badge badge-info" href="{{url('verifybill')}}">Validate Biils</a>--}}
{{--                        <a class="badge badge-info" href="{{url('verifydeposit')}}">Validate Deposit</a>--}}

{{--                        <!--                            <a class="w3-btn w3-green w3-border w3-round-large" href="method.php">All Payment Method</a>-->--}}
{{--                    </center>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <br>--}}
{{--        <div class="card">--}}
{{--            <div class="card-body">--}}
{{--                <h6>Your Referal Link</h6>--}}
{{--                <!-- The text field -->--}}
{{--                <input id="myInput" type="text" class="form-control" value="https://mobile.primedata.com.ng/register?refer={{$user->username}}" >--}}

{{--                <!-- The button used to copy the text -->--}}
{{--                <button class="btn-info" onclick="myFunction()">Copy Referal Link</button>--}}
{{--            </div>--}}
{{--        </div>--}}

        <style>
            img {
                max-width: 100%;
                height: auto;
            }
        </style>
{{--        <div class="card-body">--}}
{{--            <div class="center">--}}
{{--                <img    src="{{asset('images/banner.jpg')}}" alt="#" />--}}
{{--            </div>--}}
{{--        </div>--}}

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

        <div class="row">
            <div class="col-xl-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="any-card">
                            <div class="c-con">
                                <h4 class="heading mb-0">{{$greet}} <strong>{{Auth::user()->username}}!!</strong><img  src="#" alt=""></h4>
                                {{--                                <span>Best seller of the week</span>--}}
                                {{--                                <p class="mt-3">{{$me->message}}</p>--}}

                                <h6>Your Referal Link</h6>
                                <!-- The text field -->
                                <input id="myInput" type="text" class="form-control" value="https://mobile.primedata.com.ng/register?refer={{$user->username}}" >

                                <!-- The button used to copy the text -->
                                <button class="btn btn-info mb-1" onclick="myFunction()">Copy Link</button>

                                <a href="{{route('myaccount')}}" class="btn btn-primary btn-sm">View Profile</a>
                            </div>
                            <img  src="{{asset('deve.png')}}" class="harry-img" alt="">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info">
                    <div class="card-header border-0">
                        <h4 class="heading mb-0 text-white">Balance & Deposit 😎</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="sales-bx">
                                <i class="fa fa-money yellow_color" style="font-size: 30px"></i>
                                <h4>₦{{number_format(intval($wallet1->balance *1))}}</h4>
                                <span>Balance</span>
                            </div>
                            <div class="sales-bx">
                                <i class="fa fa-money blue1_color" style="font-size: 30px"></i>
                                <h4>₦{{number_format(intval($totaldeposite *1))}}</h4>
                                <span>Total Deposit</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary">
                    <div class="card-header border-0">
                        <h4 class="heading mb-0 text-white">Purchase & Referral😎</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="sales-bx">
                                <i class="fa fa-money yellow_color" style="font-size: 30px;"></i>
                                <h4>₦{{number_format(intval($bill *1))}}</h4>
                                <span>Total Bills</span>
                            </div>
                            <div class="sales-bx">
                                <i class="fa fa-lock yellow_color" style="font-size: 30px"></i>
                                <h4>₦{{number_format(intval($totalrefer *1),2)}}</h4>
                                <span>Referral</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card bg-secondary analytics-card">
                    <div class="card-body mt-4 pb-1">
                        <div class="row align-items-center">
                            <div class="col-xl-2">
                                <h3 class="mb-3 text-white">Solution</h3>
                                <p class="mb-0  pb-4 text-white">Validate all  <br>pending transaction</p>
                            </div>
                            <div class="col-xl-10">
                                <div class="row">
                                    <div class="col-xl-2 col-sm-4 col-6">
                                        <div class="card ov-card">
                                            <div class="card-body">
                                                <a href="{{route('invoice')}}"> <div class="ana-box">
                                                        <div class="ic-n-bx">
                                                            <div class="icon-box bg-primary ">
                                                                <i class="fa fa-book text-white"></i>
                                                            </div>
                                                        </div>
                                                        <div class="anta-data">
                                                            <h5>Invoice</h5>
                                                            <span>Check Bills</span>
                                                            {{--                                                        <h3>+23%</h3>--}}
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-sm-4 col-6" data-bs-toggle="modal" data-bs-target="#airtimeModalCenter">
                                        <div class="card ov-card">
                                            <div class="card-body">
                                                <div class="ana-box">
                                                    <div class="ic-n-bx">
                                                        <div class="icon-box bg-primary ">
                                                            <i class="fa fa-brands fa-mobile-phone text-white"></i>
                                                        </div>
                                                    </div>
                                                    <div class="anta-data">
                                                        <h5>Airtime</h5>
                                                        <span>Purchase</span>
                                                        {{--                                                        <h3>-32%</h3>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-sm-4 col-6" data-bs-toggle="modal" data-bs-target="#dataModalCenter">
                                        <div class="card ov-card">
                                            <div class="card-body">
                                                <div class="ana-box">
                                                    <div class="ic-n-bx">
                                                        <div class="icon-box bg-primary ">
                                                            <i class="fa fa-brands fa-cab text-white"></i>
                                                        </div>
                                                    </div>
                                                    <div class="anta-data">
                                                        <h5>Data</h5>
                                                        <span>Purchase</span>
                                                        {{--                                                        <h3>-32%</h3>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-sm-4 col-6">
                                        <div class="card ov-card">
                                            <div class="card-body">
                                                <a href="/"> <div class="ana-box">
                                                        <div class="ic-n-bx">
                                                            <div class="icon-box bg-primary">
                                                                <i class="fa fa-brands fa-money text-white"></i>
                                                            </div>
                                                        </div>
                                                        <div class="anta-data">
                                                            <h5>Withdraw</h5>
                                                            <span>from wallet</span>
                                                            {{--                                                        <h3>-33%</h3>--}}
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-sm-4 col-6">
                                        <div class="card ov-card">
                                            <div class="card-body">
                                                <a href="{{url('verifybill')}}"> <div class="ana-box">
                                                        <div class="ic-n-bx">
                                                            <div class="icon-box bg-primary">
                                                                <i class=" fa fa-brands fa-bookmark text-white"></i>
                                                            </div>
                                                        </div>
                                                        <div class="anta-data">
                                                            <h5>Validate</h5>
                                                            <span>Bills</span>
                                                            {{--                                                        <h3>+25%</h3>--}}
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-sm-4 col-6">
                                        <div class="card ov-card">
                                            <div class="card-body">
                                                <a href="{{url('verifydeposit')}}"> <div class="ana-box">
                                                        <div class="ic-n-bx">
                                                            <div class="icon-box bg-primary ">
                                                                <i class="fa fa-brands fa-money text-white"></i>
                                                            </div>
                                                        </div>
                                                        <div class="anta-data">
                                                            <h5>Validate</h5>
                                                            <span>Deposit</span>
                                                            {{--                                                        <h3>+30%</h3>--}}
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="airtimeModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="loading-overlay" id="loadingSpinner" style="display: none;">
                                                <div class="loading-spinner"></div>
                                            </div>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Airtime Recharge</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <form id="dataForm" >
                                                    @csrf
                                                    <div class="card card-body">
                                                        <p>AIRTIME PURCHASE</p>
                                                        {{--                       <input placeholder="Your e-mail" class="subscribe-input" name="email" type="email">--}}
                                                        <br/>
                                                        <div id="div_id_network" class="form-group">
                                                            <label for="network" class=" requiredField">
                                                                Network<span class="asteriskField">*</span>
                                                            </label>
                                                            <div class="">
                                                                <select name="id" class="text-success form-control" required="">

                                                                    <option value="MTN">MTN</option>
                                                                    <option value="GLO">GLO</option>
                                                                    <option value="AIRTEL">AIRTEL</option>
                                                                    <option value="9MOBILE">9MOBILE</option>


                                                                </select>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <div id="div_id_network" >
                                                            <label for="network" class=" requiredField">
                                                                Enter Amount<span class="asteriskField">*</span>
                                                            </label>
                                                            <div class="">
                                                                <input type="number" id="amount" name="amount" min="100" max="4000" class="text-success form-control" required>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <div id="div_id_network" class="form-group">
                                                            <label for="network" class=" requiredField">
                                                                Enter Phone Number<span class="asteriskField">*</span>
                                                            </label>
                                                            <div class="">
                                                                <input type="number" id="number" name="number" minlength="11" class="text-success form-control" required >
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                                                        <button type="submit" class="btn btn-primary">PURCHASE</button>
                                                    </div>
                                                </form>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    {{--                        <button type="button" class="btn btn-primary">Save changes</button>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="dataModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="loading-overlay" id="loadingSpinner1" style="display: none;">
                                                <div class="loading-spinner"></div>
                                            </div>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Data Purchase</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <form id="dataForm1">
                                                    @csrf
                                                    <div class="card card-body">
                                                    <label for="network" class=" requiredField">
                                                        Network<span class="asteriskField">*</span>
                                                    </label>
                                                    <select  name="id" id="firstSelect" class="text-success form-control" required="">
                                                        <option>Select Network</option>
                                                        @if($serve->name == 'mcd')
                                                            <option value="mtn-data">MTN</option>
                                                            <option value="glo-data">GLO</option>
                                                            <option value="etisalat-data">9MOBILE</option>
                                                        @else
                                                            <option value="MTN">MTN-SME</option>
                                                            <option value="MTN_CG">MTN-CG</option>
                                                            <option value="MTN_DG">MTN-DG</option>
                                                            <option value="GLO">GLO</option>
                                                            <option value="GLO_CG">GLO-CG</option>
                                                            <option value="9MOBILE">9MOBILE</option>
                                                            <option value="9MOBILE_CG">9MOBILE-CG</option>
                                                        @endif
                                                        @if ($serve->name == 'mcd')
                                                            <option value="airtel-data">AIRTEL</option>
                                                        @else
                                                            <option value="AIRTEL_DG">AIRTEL_DG</option>
                                                            <option value="AIRTEL_CG">AIRTEL_CG</option>
                                                        @endif
                                                    </select>

                                                    <br>
                                                    <div id="div_id_network" class="form-group">
                                                        <label for="network" class=" requiredField">
                                                            Select Your Plan<span class="asteriskField">*</span>
                                                        </label>
                                                        <div class="">
                                                            <select name="productid" id="secondSelect" class="text-success form-control" required>

                                                                <option>Select Your Plan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{--                                <div id="div_id_network" >--}}
                                                    {{--                                    <label for="network" class=" requiredField">--}}
                                                    {{--                                        Enter Amount<span class="asteriskField">*</span>--}}
                                                    {{--                                    </label>--}}
                                                    {{--                                    <div class="">--}}
                                                    {{--                                        <input type="number" name="amount" id="po" value="" min="100" max="4000" class="text-success form-control" readonly>--}}
                                                    {{--                                    </div>--}}
                                                    {{--                                </div>--}}
                                                    <br/>
                                                    <div id="div_id_network" class="form-group">
                                                        <label for="network" class=" requiredField">
                                                            Enter Phone Number<span class="asteriskField">*</span>
                                                        </label>
                                                        <div class="">
                                                            <input type="number" id="number1" name="number" minlength="11" class="text-success form-control" required>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                                                        <button type="submit" class="btn btn-success">Purchase now</button>

                                                    {{--                    <button type="submit" class=" btn" style="color: white;background-color: #28a745">Click Next<span class="load loading"></span></button>--}}
                                                    </div>
                                                </form>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    {{--                        <button type="button" class="btn btn-primary">Save changes</button>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    <!-- end graph -->
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
                                            @if($wallet1->bank == null)
                                            <li class='text-white'><h5 class="text-white"><b>Bank: WEMA-BANK</b></h5></li>
                                            @else
                                            <li class='text-white'><h5 class="text-white"><b>Bank:{{$wallet1->bank}}</b></h5></li>
                                            @endif
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

        <script>
            $(document).ready(function() {


                // Send the AJAX request
                $('#dataForm').submit(function(e) {
                    e.preventDefault(); // Prevent the form from submitting traditionally

                    // Get the form data
                    var formData = $(this).serialize();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you want to buy airtime of ₦' + document.getElementById("amount").value + ' on ' + document.getElementById("number").value +' ?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // The user clicked "Yes", proceed with the action
                            // Add your jQuery code here
                            // For example, perform an AJAX request or update the page content
                            $('#loadingSpinner').show();

                            $.ajax({
                                url: "{{ route('buyairtime1') }}",
                                type: 'POST',
                                data: formData,
                                success: function(response) {
                                    // Handle the success response here
                                    $('#loadingSpinner').hide();

                                    console.log(response);
                                    // Update the page or perform any other actions based on the response

                                    if (response.status == 'success') {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success',
                                            text: response.message
                                        }).then(() => {
                                            location.reload(); // Reload the page
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'info',
                                            title: 'Pending',
                                            text: response.message
                                        });
                                        // Handle any other response status
                                    }

                                },
                                error: function(xhr) {
                                    $('#loadingSpinner').hide();
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'fail',
                                        text: xhr.responseText
                                    });
                                    // Handle any errors
                                    console.log(xhr.responseText);

                                }
                            });

                        }
                    });
                });
            });

        </script>

        <script>
            $(document).ready(function() {
                $('#firstSelect').change(function() {
                    var selectedValue = $(this).val();
                    // Show the loading spinner
                    $('#loadingSpinner1').show();
                    // Send the selected value to the '/getOptions' route
                    $.ajax({
                        url: '{{ url('redata') }}/' + selectedValue,
                        type: 'GET',
                        success: function(response) {
                            // Handle the successful response
                            var secondSelect = $('#secondSelect');
                            $('#loadingSpinner1').hide();
                            // Clear the existing options
                            secondSelect.empty();

                            // Append the received options to the second select box
                            $.each(response, function(index, option) {
                                secondSelect.append('<option  value="' + option.id + '">' + option.plan +  ' --₦' + option.ramount + '</option>');
                            });

                            // Select the desired value dynamically
                            var desiredValue = 'value2'; // Set the desired value here
                            secondSelect.val(desiredValue);
                        },
                        error: function(xhr) {
                            // Handle any errors
                            console.log(xhr.responseText);
                        }
                    });
                });
            });

        </script>
        <script>
            $(document).ready(function() {
                $('#dataForm1').submit(function(e) {
                    e.preventDefault(); // Prevent the form from submitting traditionally
                    // Get the form data
                    var formData = $(this).serialize();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you want to buy ' + document.getElementById("secondSelect").options[document.getElementById("secondSelect").selectedIndex].text + ' on ' + document.getElementById("number1").value + '?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // The user clicked "Yes", proceed with the action
                            // Add your jQuery code here
                            // For example, perform an AJAX request or update the page content
                            $('#loadingSpinner1').show();
                            $.ajax({
                                url: "{{ route('bill') }}",
                                type: 'POST',
                                data: formData,
                                success: function(response) {
                                    // Handle the success response here
                                    $('#loadingSpinner1').hide();

                                    console.log(response);
                                    // Update the page or perform any other actions based on the response

                                    if (response.status == 'success') {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success',
                                            text: response.message
                                        }).then(() => {
                                            location.reload(); // Reload the page
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'info',
                                            title: 'Pending',
                                            text: response.message
                                        });
                                        // Handle any other response status
                                    }

                                },
                                error: function(xhr) {
                                    $('#loadingSpinner1').hide();
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'fail',
                                        text: xhr.responseText
                                    });
                                    // Handle any errors
                                    console.log(xhr.responseText);

                                }
                            });


                        }
                    });


                    // Send the AJAX request
                });
            });

        </script>


    </div>
@include('layouts.footer')
