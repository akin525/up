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

                    <div class="text-center">
                        <h6>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h6>
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
                    <div class="login_form">
                        <center><h5 class="text-wh text-red">Primedata Reset Password</h5></center>
                        <br>
                        <br>
<div class="card-body text-center">
        <x-jet-validation-errors class="mb-4" />
</div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <fieldset>
                <div class="field">
                    <label class="label_field">Email</label>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="btn btn-outline-cyan">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
                        </fieldset>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
