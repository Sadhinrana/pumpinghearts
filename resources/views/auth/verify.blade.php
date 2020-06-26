


@extends('layouts.main')

@section('head')
    <title>Pumping Hearts</title>
@stop

@section('body')


    <script type="text/javascript">
        document.getElementById("body").classList.remove('transparent-header');
        document.getElementById("main-logo").src="{{asset('images/Logo-red-200px.png')}}";
        document.getElementById("header").classList.add('not-sticky');
    </script>
    <!-- Fullwidth Section -->
    <section class="fullwidth padding-top-75 padding-bottom-70" data-background-color="#fafafa" style="text-align: center">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Verify your email address to begin your profile') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Fullwidth Section / End -->
@stop
