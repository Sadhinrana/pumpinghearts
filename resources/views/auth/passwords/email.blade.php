
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
<h3>
    Reset Password
</h3>
                        <hr>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group row">

                                    <div class="col-md-6 col-md-offset-3">
                                        <input id="email" placeholder="Please enter your e-mail address" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="  col-md-6 centered col-md-offset-3" >
                                        <button type="submit"  class="button btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- Fullwidth Section / End -->
@stop

