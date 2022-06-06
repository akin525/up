@include('admin.layouts.sidebar')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>
        <div class='alert alert-info'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <i class='fa fa-ban-circle'></i><strong>Notification: </br></strong>Welcome Back {{"$user->username"}}
        </div>
        <div class="card">
            <div class="card-body">
                <div class="w3-panel w3-yellow w3-round-xlarge">
                    <div class="card-body">
                        <center>
                            <!--                    <h4 class="w3-text-green"><b>&nbsp;&nbsp; &nbsp;&nbsp; <a class="w3-btn w3-green w3-border w3-round-large" href="with.php">Withdraw From MCD Wallet</a>-->
                            <a class="w3-btn w3-green w3-border w3-round-large" href="#">Credit User</a>
                            <a class="w3-btn w3-green w3-border w3-round-large" href="#">Withdraw MCD Wallet</a>

                            <a class="w3-btn w3-green w3-border w3-round-large" href="#">Refund User</a>
                            <a class="w3-btn w3-green w3-border w3-round-large" href="#">Charge User</a>
                            <a class="w3-btn w3-green w3-border w3-round-large" href="#">Withdraw MCD Commission</a>

                            <!--                            <a class="w3-btn w3-green w3-border w3-round-large" href="method.php">All Payment Method</a>-->
                        </center>
                    </div>
                    </b></h4>  	</div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="row column1">
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-bars yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">{{$data['bill']}}</h5>
                                <h6 class="head_couter">Number Of Today Bill</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-bars blue1_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">{{$data['deposit']}}</h5>
                                <h6 class="head_couter">Number Of Today Deposit</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-users green_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">{{$data['user']}}</h5>
                                <h6 class="head_couter">Today New Users</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-users yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">{{$data['nou']}}</h5>
                                <h6 class="head_couter">Number of uers Purchase Today</h6>
                            </div>
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
                                <i class="fa fa-money yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">₦{{number_format(intval($data['sum_deposits'] *1),2)}}</h5>

                                <h6 class="head_couter">Today Total Deposits</h6>
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

                                <h5 class="total_no text-center">₦{{ number_format(intval($data['sum_bill'] *1),2)}}</h5>
                                <h6 class="head_couter">Today Total Purchase</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="row column1">
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-google-wallet yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">₦{{ number_format(intval($totalwallet *1),2)}}</h5>
                                <h6 class="head_couter">All User Balance</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-money blue1_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">₦{{ number_format(intval($totaldeposite *1),2)}}</h5>
                                <h6 class="head_couter">All Total Deposit</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-money green_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">₦{{number_format(intval($bill *1),2)}}</h5>
                                <h6 class="head_couter">All Total Bills</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div>
                                <i class="fa fa-users yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">{{$alluser}}</h5>
                                <h6 class="head_couter">Total Users</h6>
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
                                <i class="fa fa-money yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">₦{{number_format(intval($tran *1),2)}}</h5>

                                <h6 class="head_couter">MCD Balance</h6>
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

                                <h5 class="total_no text-center">₦{{ number_format(intval($lock *1),2)}}</h5>
                                <h6 class="head_couter">Airtime Discounts</h6>
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
                                <i class="fa fa-money yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                                <h5 class="total_no text-center">₦{{ number_format(intval($totalcharge *1),2)}}</h5>
                                <h6 class="head_couter">Total Charges</h6>
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
                                <h5 class="total_no text-center">₦{{number_format(intval($totalprofit *1),2)}}</h5>
                                <h6 class="head_couter">Total Profit</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.row -->
        <br>
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Deposit History</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                        <thead>
                        <th class="table-active"> Username </th>
                        <th> Transaction Id </th>
                        <th> Date</th>
                        <th>Amount</th>
                        </thead>
                        <tbody>
                        @foreach($deposite as $de)
                            <tr>
                                <td>{{$de->username}}</td>
                                <td>{{$de->payment_ref}}</td>
                                <td>{{$de->date}}</td>
                                <td>{{$de->amount}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

        <script>
            $(function () {
                "use strict";
                // Bar chart
                new Chart(document.getElementById("bar-chart"), {
                    type: 'bar',
                    data: {
                        labels: ["Total Users Wallet", "Total Bills", "Deposits"],
                        datasets: [
                            {
                                label: "Population (millions)",
                                backgroundColor: ["#03a9f4", "#e861ff","#08ccce"],
                                data: [200000,300000,400000]
                            }
                        ]
                    },
                    options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'System Payment Chart'
                        }
                    }
                });


                // line second
            });
        </script>

        <script>
            // Horizental Bar Chart
            new Chart(document.getElementById("bar-chart-horizontal"), {
                type: 'horizontalBar',
                data: {
                    labels: ["All Users", "Active Users"],
                    datasets: [
                        {
                            label: "Total Users",
                            backgroundColor: ["#0000FF","#00FF00"],
                            data: [250,200]
                        }
                    ]
                },
                options: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'System Customers Chart'
                    }
                }
            });
        </script>

        @include('layouts.footer')

