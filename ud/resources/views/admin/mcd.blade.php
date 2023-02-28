@include('admin.layouts.sidebar')
<script>
    function myNewFunction(sel) {
        // alert(sel.options[sel.selectedIndex].id);
        document.getElementById("po").value = (sel.options[sel.selectedIndex].id);
        document.getElementById("pk").value = (sel.options[sel.selectedIndex].text);
    }
</script>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row justify-content-lg-center">
            <div class="col-lg-10">

                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title text-white">Withdraw From MCD</h3>
                            <ul class="breadcrumb">
                                <li class=""><a href="{{route('admin/dashboard')}}">Home</a></li>
                                {{--                                <li class="breadcrumb-item active">Profile</li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{--                                <h4 class="card-title">Basic Info</h4>--}}
                                <x-jet-validation-errors class="mb-4 alert-danger alert-dismissible alert"/>

                                <script src=
                                        "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js">
                                </script>
                                @if (session('status'))
                                    <script>
                                        Swal.fire({
                                            toast: true,
                                            icon: 'success',
                                            title: '{{ session('status') }}',
                                            confirmButtonText: "ok",
                                            confirmButtonColor: "#28a745",
                                        })
                                    </script>
                                @endif

                                @if (session('error'))
                                    <div class="mb-4 font-medium text-sm alert-danger alert-dismissible alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @if (session('success'))
                                    <script>
                                        Swal.fire({
                                            toast: true,
                                            icon: 'success',
                                            title: '{{ session('success') }}',
                                            confirmButtonText: "ok",
                                            confirmButtonColor: "#28a745",
                                        })
                                    </script>
                                @endif

                                <form action="{{route('admin/verify')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Your Bank Name</label>
                                                <select class="form-control" name="bank" onChange="myNewFunction(this);" required>
                                                    @foreach($data['data'] as $plans)
                                                        <option id="{{$plans['name']}}" value="{{$plans['code']}}">{{$plans['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input name="code" type="hidden" id="po" value="" class="form-control"
                                            <div class="form-group">
                                                <label>Enter Account Number</label>
                                                <input name="number" type="number" class="form-control"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input name="username" type="text" class="form-control" value="{{Auth::user()->username}}" readonly
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end mt-4 card-body">

                                        <button type="submit" class="btn btn-primary">Verify Account</button>


                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

