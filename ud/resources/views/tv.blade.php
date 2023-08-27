@include('layouts.sidebar')
<div class="page-wrapper">
    <div class="loading-overlay" id="loadingSpinner" style="display: none;">
        <div class="loading-spinner"></div>
    </div>
    <div class="loading-overlay" id="loadingSpinner1" style="display: none;">
        <div class="loading-spinner"></div>
    </div>
    <div class="content container-fluid">
        <div class="row justify-content-lg-center">
            <div class="col-lg-10">

                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">TV Subscription</h4>
                            <ul class="breadcrumb">
{{--                                <li class=""><a href="{{route('dashboard')}}">Dashboard</a></li>--}}
                                {{--                                <li class="breadcrumb-item active">Profile</li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!--                    <div class="box w3-card-4">-->
                        <div class="row">
                            <div class="col-sm-8">
                                <br>
                                <br>
                                <div class="alert alert-danger" id="ElectNote" style="text-transform: uppercase;font-weight: bold;font-size: 18px;display: none;">
                                </div>
                                <div id="electPanel">
                                    <div class="alert alert-danger">0.1% discount apply.</div>
                                    <form id="dataForm">
                                        @csrf
                                        <div  class="form-group">
                                            <label  class="requiredField">
                                                Select Tv
                                                <span class="asteriskField">*</span>
                                            </label>
                                            <select name="id" id="firstSelect" class="text-success form-control" required>
                                                <option selected="">---------</option>
                                                <option value="gotv">GOTV</option>
                                                <option value="dstv">DSTV</option>
                                                <option value="startimes">STARTIMES</option>
                                                <option value="showmax">SHOWMAX</option>

                                            </select>
                                        </div>

                                </div>
                                <br/>
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

                                <br/>
                                <div id="div_id_network" class="form-group">
                                    <label for="network" class=" requiredField">
                                        Enter IUC Number<span class="asteriskField">*</span>
                                    </label>
                                    <div class="">
                                        <input type="number" id="number" name="number" minlength="10" class="text-success form-control" required>
                                    </div>
                                </div>
                                <br/>
                                <div id="div_id_network" class="form-group">
                                    <label for="network" class=" requiredField">
                                        IUC Name<span class="asteriskField">*</span>
                                    </label>
                                    <div class="" >
                                        <input type="text" id="name" name="name" class="text-success form-control" readonly>

                                    </div>
                                </div>
                                <input type="hidden" name="refid" value="<?php echo rand(10000000, 999999999); ?>">
                                <button type="submit" class="submit-btn" >PURCHASE</button>
                            <div class="col-sm-4 ">
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
        $('#firstSelect').change(function() {
            var selectedValue = $(this).val();
            // Show the loading spinner
            $('#loadingSpinner').show();
            // Send the selected value to the '/getOptions' route
            $.ajax({
                url: '{{ url('getOptions') }}/' + selectedValue,
                type: 'GET',
                success: function(response) {
                    // Handle the successful response
                    var secondSelect = $('#secondSelect');
                    $('#loadingSpinner').hide();
                    // Clear the existing options
                    secondSelect.empty();

                    // Append the received options to the second select box
                    $.each(response, function(index, option) {
                        secondSelect.append('<option  value="' + option.id + '">' + option.plan +  ' --₦' + option.tamount + '</option>');
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
        $('#number').on('input', function() {
            var inputElement = document.getElementById("number");
            var inputValue = inputElement.value;
            var secondS = $('#firstSelect');
            var third = $('#name');

            if (inputValue.length === 10 || inputValue.length === 11) {
                $('#loadingSpinner1').show();

                $.ajax({
                    url: '{{ url('verifytv') }}/' + inputValue + '/' + secondS.val(),
                    type: 'GET',
                    data: {
                        value1: inputValue,
                        value2: secondS.val()
                    },
                    success: function(response) {
                        $('#loadingSpinner1').hide();
                        $('#name').val(response);
                    },
                    error: function(xhr) {
                        $('#loadingSpinner1').hide();
                        Swal.fire({
                            icon: 'error',
                            title: 'fail',
                            text: xhr.responseText
                        });
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataForm').submit(function(e) {
            e.preventDefault(); // Prevent the form from submitting traditionally
            // Get the form data
            var formData = $(this).serialize();
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to buy ' + document.getElementById("secondSelect").options[document.getElementById("secondSelect").selectedIndex].text + ' on ' + document.getElementById("number").value + '?',
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
                        url: "{{ route('buytv') }}",
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


            // Send the AJAX request
        });
    });

</script>

