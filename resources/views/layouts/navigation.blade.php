<!-- Header Container
    ================================================== -->

<style>
    .invalid-feedback{width:100%;margin-top:.25rem;font-size:80%;color:#e3342f}
</style>
<header id="header-container">

    <!-- Header -->
    <div id="header">
        <div class="container">

            <!-- Left Side Content -->
            <div class="left-side">

                <!-- Logo -->
                <div id="logo">
                    <a id="logo-link" href="/"><img id="main-logo" src="{{asset('images/Logo-white-200px.png')}}" data-sticky-logo="{{asset('images/Logo-red-200px.png')}}" alt=""></a>
                </div>

                <!-- Mobile Navigation -->
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                    </button>
                </div>

                {{--<!-- Main Navigation -->--}}
                {{--<nav id="navigation" class="style-1">--}}
                {{--<ul id="responsive">--}}

                {{--<li><a class="current" href="#">Home</a> </li>--}}

                {{--<li><a href="#">Trainers</a> </li>--}}

                {{--<li><a href="#">Contact</a></li>--}}

                {{--</ul>--}}
                {{--</nav>--}}
                {{--<div class="clearfix"></div>--}}
                {{--<!-- Main Navigation / End -->--}}

            </div>
            <!-- Left Side Content / End -->


            <!-- Right Side Content / End -->
            <div class="right-side">
                <div class="header-widget">
                    @auth
                    <!-- User Menu -->
                    <div class="user-menu">
                    <?php $img = "images/Avatars/".Auth::User()->profile->picture?>
                    <div class="user-name"><span><img src="{{asset($img)}}" alt=""></span>Hi, {{Auth::User()->name}}</div>
                    <ul>
                    <li><a id="dashboard-link" href="{{route('Dashboard', ['id' => Auth::id()])}}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        ><i class="sl sl-icon-power"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></li>
                    </ul>

                    </div>
                    @endauth
                    @guest
                    <a id="sign" href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In</a>
{{--                    <a href="" class="button border with-icon">Join Now</a>--}}
                    @endguest
                </div>
            </div>
            <!-- Right Side Content / End -->

            <!-- Sign In Popup -->
            <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

                <div class="small-dialog-header">
                    <h3>Sign In</h3>
                </div>
                @if( Session::has('modal_message_error'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                    {{ Session::get('modal_message_error') }}
                </p>
                @endif
                @if( Session::has('modal_register_error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                        {{ Session::get('modal_register_error') }}
                    </p>
                @endif
                @if( Session::has('modal_login_error'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                        {{ Session::get('modal_login_error') }}
                    </p>
                @endif
                <!--Tabs -->
                <div class="sign-in-form style-1">

                    <ul class="tabs-nav">
                        <li class=""><a href="#tab1">Log In</a></li>
                        <li><a id="reg" href="#tab2">Register</a></li>
                    </ul>

                    <div class="tabs-container alt">

                        <!-- Login -->
                        <div class="tab-content" id="tab1" style="display: none;">
                            <form method="post" class="login" action="{{ route('login') }}">
                                @csrf
                                <p class="form-row form-row-wide">
                                    <label for="email">Email:
                                        <i class="im im-icon-Mail"></i>
                                        <input id="email" type="email" class="input-text{{ $errors->has('email')  && Session::get('last_auth_attempt') != 'register' ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    </label>

                                    @if ($errors->has('email')  && Session::get('last_auth_attempt') != 'register')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password">Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input id="password" type="password" class="input-text{{ $errors->has('password')  && Session::get('last_auth_attempt') != 'register'  ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password') && Session::get('last_auth_attempt') != 'register')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </label>
                                    @if (Route::has('password.request'))
                                        <span class="lost_password">
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        </span>
                                    @endif
                                </p>

                                <input type="hidden" value="" id="hero_button" name="hero_button">

                                <div class="form-row">
                                    <input type="submit" class="button border margin-top-5" name="login" value="Login" />
{{--                                    <div class="checkboxes margin-top-10">--}}
{{--                                        <input id="remember-me" type="checkbox" name="check">--}}
{{--                                        <label for="remember-me">Remember Me</label>--}}
{{--                                    </div>--}}
                                </div>

                            </form>
                        </div>

                        <!-- Register -->
                        <div class="tab-content" id="tab2" style="display: none;">

                            <form method="POST" class="register" action="{{ route('register') }}">
                                @csrf
                                <p class="form-row form-row-wide">
                                    <label for="name">Name:
                                        <i class="im im-icon-Male"></i>
                                        <input id="name" type="text" class="input-text{{ $errors->has('name')  && Session::get('last_auth_attempt') == 'register' ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                    </label>
                                    @if ($errors->has('name') && Session::get('last_auth_attempt') == 'register')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="email">Email Address:
                                        <i class="im im-icon-Mail"></i>
                                        <input id="email" type="email" class="input-text{{ $errors->has('email')  && Session::get('last_auth_attempt') == 'register' ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                    </label>

                                    @if ($errors->has('email') && Session::get('last_auth_attempt') == 'register')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </p>

                                <input type="hidden" name="auth_attempt" value="register">

                                <p class="form-row form-row-wide">
                                    <label for="password">Password: (Minimum 8 characters | String)
                                        <i class="im im-icon-Lock-2"></i>
                                        <input id="password" type="password" class="input-text{{ $errors->has('password')  && Session::get('last_auth_attempt') == 'register' ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password') && Session::get('last_auth_attempt') == 'register')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password-confirm">Repeat Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input id="password-confirm" type="password" class="text-input" name="password_confirmation" required>
                                    </label>
                                </p>

                                <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Sign In Popup / End -->

        </div>
    </div>
    <!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->

