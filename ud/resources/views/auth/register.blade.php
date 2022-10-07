<x-guest-layout>
    <body class="inner_page login">
    <br>
    <br>
    <br>
    <br>
    <div id="loading-wrapper">
        <div class="spinner-border"></div>
        PRIMEDATA......
    </div>
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
                <div class="login_section">
                    <div class="login_section">
                        <div class="logo_login">
                            <div class="center">
                                <img width="110" src="{{asset("images/bn.jpeg")}}" alt="#" />
                            </div>
                        </div>
                        <x-slot name="logo">
                        </x-slot>

                        <div class="login_form">
                            <h3 class="text-center text-purple">SIGN-UP</h3>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <fieldset>
                                    <center>
                                        <div class="card-body">
                                            <x-jet-validation-errors class="mb-4" />
                                        </div>
                                    </center>
                                    <div class="field">
                                        <label class="label_field">Full Name</label>
                                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    </div>
                                    <div class="field">
                                        <label class="label_field">Phone Number</label>
                                        <x-jet-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autofocus autocomplete="phone "/>
                                    </div>
                                    <div class="field">
                                        <label class="label_field">Username</label>
                                        <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                                    </div>
                                    @if(isset($request->refer))
                                        <div class="field">
                                            <label class="label_field">Refer</label>
                                            <input id="username" class="block mt-1 w-full" type="text" name="refer" value="{{$request->refer}}" required autofocus autocomplete="username" readonly/>
                                        </div>
                                    @else
                                        <div class="field">
                                            {{--                        <label class="label_field">Refer</label>--}}
                                            <input id="username" class="block mt-1 w-full" type="hidden" name="refer" value="" required autofocus autocomplete="username" readonly/>
                                        </div>
                                    @endif
                                    <div class="field">
                                        <label class="label_field">Email</label>
                                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                    </div>

                                    <div class="field">
                                        <label class="label_field">Password</label>
                                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                    </div>

                                    <div class="field">
                                        <label class="label_field">Confirmed-Password</label>
                                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                    </div>

                                    <div class="field">
                                        <label class="label_field hidden">hidden label</label>
                                        <!--                                <label class="form-check-label"><input type="checkbox" id="rememberMe" class="form-check-input"> Remember Me</label>-->
                                        <a class="forgot" href="{{route('login')}}">Already Signed-Up, then Login</a>
                                    </div>
                                    <div class="field margin_0">
                                        <label class="label_field hidden">hidden label</label>
                                        <style>
                                            .button {
                                                position: relative;
                                                padding: 8px 16px;
                                                background: #009579;
                                                border: none;
                                                outline: none;
                                                border-radius: 2px;
                                                cursor: pointer;
                                            }

                                            .button:active {
                                                background: #e7eceb;
                                            }

                                            .button__text {
                                                font: bold 20px "Quicksand", san-serif;
                                                color: #ffffff;
                                                transition: all 0.2s;
                                            }

                                            .button--loading .button__text {
                                                visibility: hidden;
                                                opacity: 0;
                                            }

                                            .button--loading::after {
                                                content: "";
                                                position: absolute;
                                                width: 16px;
                                                height: 16px;
                                                top: 0;
                                                left: 0;
                                                right: 0;
                                                bottom: 0;
                                                margin: auto;
                                                border: 8px solid transparent;
                                                border-top-color: #ffffff;
                                                border-radius: 50%;
                                                animation: button-loading-spinner 1s ease infinite;
                                            }

                                            @keyframes button-loading-spinner {
                                                from {
                                                    transform: rotate(0turn);
                                                }

                                                to {
                                                    transform: rotate(1turn);
                                                }
                                            }
                                        </style>

                                        <button type="submit" class="button btn btn-success " onclick="this.classList.toggle('button--loading') ">
                                            <span class="button__text">Sign up</span>
                                        </button>
                                        <script>
                                            const btn = document.querySelector(".button");

                                            btn.classList.add("button--loading");
                                            btn.classList.remove("button--loading");

                                        </script>
                                    </div>
                            </form>
                            <script src="{{asset('hp/jquery.min.js')}}"></script>
                            <script src="{{asset('hp/bootstrap.bundle.min.js')}}"></script>
                            <script src="{{asset('hp/modernizr.js')}}"></script>
                            <script src="{{asset('hp/moment.js')}}"></script>
                            <script src="{{asset('hp/main.js')}}"></script>

</x-guest-layout>
