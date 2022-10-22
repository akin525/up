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


                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('sweetalert::alert')
                    <div class="login_form">
                        <center>
                            <h3 class="text-wh text-red">LOG-IN</h3>
                            <hr>
                            <h6 class="text-wh text-red">Login With</h6>

                            <div class="btn-group">
                            <a href="{{ route('google.login') }}" class="btn btn-secondary btn-user" >
                                <i class="fa fa-google "></i> Login Google
                            </a>
                                .OR.
                            <a href="{{ route('facebook.login') }}" class="btn btn-secondary " >
                                <i class="fa fa-facebook"></i> Login Facebook
                            </a>
                            </div>
                        </center>
                        <br>
                        <br>

                        <form method="POST" action="{{ route('log') }}">
                            @csrf
                            <fieldset>
                                @if ($errors->has('email'))<div class='alert alert-danger'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                    <i class='fa fa-ban-circle'></i>
                                    <span class="text-white">{{ $errors->first('email') }}</span>
                                </div>
                                @endif
                                @if ($errors->has('password'))<div class='alert alert-danger'>
                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                    <i class='fa fa-ban-circle'></i>
                                    <span class="text-white">{{ $errors->first('password') }}</span>
                                </div>
                                @endif
                                <div class="field">

                                    <label class="label_field">Email</label>
                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                </div>

                                <div class="field">
                                    <label class="label_field">Password</label>
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                </div>
                                <center>
                                    <div class="field">
                                        <label class="label_field hidden">hidden label</label>

                                        <label class="form-check-label"><input type="checkbox" id="remember_me" name="remember" class="form-check-input"> Remember Me</label>
                                        @if (Route::has('password.request'))
                                            <a class="forgot" href="{{ route('password.request') }}">Forgotten Password?</a>
                                        @endif


                                        <button type="submit" class="btn btn-danger" style="background-color: #FF0066">
                                            login<span class="load loading"></span>
                                        </button>

                                        <script>
                                            const btns = document.querySelectorAll('button');
                                            btns.forEach((items)=>{
                                                items.addEventListener('click',(evt)=>{
                                                    evt.target.classList.add('activeLoading');
                                                })
                                            })
                                        </script>
                                        <script>
                                            const btn = document.querySelector(".button");

                                            btn.classList.add("button--loading");
                                            btn.classList.remove("button--loading");

                                        </script>

                                    </div>
                                </center>
                                <div class="field margin_0">
                                    <label class="label_field hidden">hidden label</label>
                                    <a href="{{ route('register') }}" ><button type="button" class="main_bt" style="background-color: #FF0066">Sign Up</button></a>
                                </div>

                            </fieldset>

                        </form>
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
