<x-guest-layout>
    <body class="inner_page login">
    <div id="loading-wrapper">
        <div class="spinner-border" style="color: #FF0066"></div>
        PRIMEDATA......
    </div>
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
                        <center><h5 class="text-wh text-red" style="color: #FF0066" >Primedata Get New Password</h5></center>
                        <center>
                            <a href="{{route('login')}}" class="btn btn-success"  style="background-color: #FF0066">Login</a>
                        </center>
                        <br>
                        <br>
                        @include('sweetalert::alert')
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
                <button type="submit" class="btn btn-success"  style="background-color: #FF0066" >Get password<span class="load loading"></span>
                </button>
    <script>
        const btns = document.querySelectorAll('button');
        btns.forEach((items)=>{
            items.addEventListener('click',(evt)=>{
                evt.target.classList.add('activeLoading');
            })
        })
    </script>
</center>
        </form>
                        </fieldset>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('hp/jquery.min.js')}}"></script>
    <script src="{{asset('hp/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('hp/modernizr.js')}}"></script>
    <script src="{{asset('hp/moment.js')}}"></script>
    <script src="{{asset('hp/main.js')}}"></script>

</x-guest-layout>
