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
<div class="alert alert-info">
    <button type='button' class='close text-white' data-dismiss='alert'>&times;</button>
    <i class="fa fa-bell"></i><b>Account Status:</b><h6 class="align-content-center text-center text-white"><b>@if(Auth::user()->apikey ==NULL)
        *Member* <button type="button" class="btn btn-success" onclick="window.location.href='https://mobile.primedata.com.ng/reseller';">Click to upgrade</button> @else*Reseller*
        @endif</b></h6>
</div>

{{--        <div class='alert alert-info'>--}}
{{--            <button type='button' class='close' data-dismiss='alert'>&times;</button>--}}
{{--            <i class='fa fa-ban-circle'></i><strong>Notification: </br></strong>Welcome Back {{"$user->username"}}--}}
{{--        </div>--}}
        <div class='alert alert-info'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <i class='fa fa-ban-circle'></i><h6 class="text-white">Important Notification: </br><b>{{$me->message}}</b></h6>
        </div>
        <br>
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
        <div class="card">
            <div class="card-body">
                <h6>Your Referal Link</h6>
                <!-- The text field -->
                <input id="myInput" type="text" class="form-control" value="https://mobile.primedata.com.ng/register?refer={{$user->username}}" >

                <!-- The button used to copy the text -->
                <button class="btn-info" onclick="myFunction()">Copy Referal Link</button>
            </div>
        </div>


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
        <div class="card">
            <div class="card-body">
                <div class='alert alert-info'>
                    <button type='button' class='close'></button>
                    <i class='fa fa-ban-circle'></i><strong>Notification: </br></strong>
                    <center>
                        <div class="card-body">
                            <li  class=" btn-info">
                                @foreach($wallet as $wallet1)
                                    @if ($wallet1->account_number==1 && $wallet1->account_name==1)
                                        <a href='{{route('vertual')}}' class='text-white'>Click this section to get your permament Virtual Bank Account (Transfer money to the account no to get your PrimeData Wallet funded instantly!)</a>
                                    @else
                                        <h6 class='text-white'>{{$wallet1->account_name}}</h6>
                                        <h5 class='text-white'>Account No:{{$wallet1->account_number}}</h5>
                                        <h6 class='text-white'>WEMA-BANK</h6>
                                    @endif
                                @endforeach

                            </li>
                        </div>
                    </center>
                </div>
            </div>
        </div>

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
                        <h5 class="total_no text-center">???{{number_format(intval($wallet1->balance *1),2)}}</h5>
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
                        <h5 class="total_no text-center">???{{number_format(intval($totaldeposite *1), 2)}}</h5>
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
                        <h5 class="total_no text-center">???{{number_format(intval($bill *1),2)}}</h5>
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
                        <h5 class="total_no text-center">???{{number_format(intval($totalrefer *1),2)}}</h5>
                        <h6 class="head_couter">Referal Bonus</h6>
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
