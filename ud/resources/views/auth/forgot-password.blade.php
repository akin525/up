<x-guest-layout>
    <body class="inner_page login">
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
                <div class="login_section">
                    <div class="logo_login">
                        <div class="center">
                            <img width="110" src="{{asset("images/bn.jpeg")}}" alt="#" />
                        </div>
                    </div>

                    <div class="login_form">
                        <center><h5 class="text-wh text-red">Primedata Get New Password</h5></center>
                        <br>
                        <br>


        <form method="POST" action="{{ route('passw') }}">
            @csrf
            <fieldset>
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                <div class="field">
                    <label class="label_field">Email</label>
                <input id="email" class="form-control" type="email" name="email"  required autofocus />
            </div>
<center>
                <button type="submit" class="btn btn-success" >Get password</button>
</center>
        </form>
                        </fieldset>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
