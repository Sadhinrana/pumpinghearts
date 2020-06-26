@extends('layouts.main')

@section('head')

    <title>Pumping Hearts | Trainers</title>

@stop


@section('body')
    <script type="text/javascript">
        document.getElementById("body").classList.remove('transparent-header');
        document.getElementById("main-logo").src="{{asset('images/Logo-red-200px.png')}}";
        // document.getElementById("header-container").classList.add('fixed');
        // document.getElementById("header-container").classList.add('fullwidth');
        // document.getElementById("header").classList.add('not-sticky');
    </script>


    <div class="clearfix"></div>
    <!-- Header Container / End -->


    <!-- Titlebar
    ================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Booking</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Booking Processed</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <!-- Content
    ================================================== -->

    <!-- Content
 ================================================== -->

    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="booking-confirmation-page">
                    <i class="fa fa-check-circle"></i>
                    <h2 class="margin-top-30">Thanks for your booking!</h2>
                    <p>You'll receive a confirmation email at {{Auth::User()->email}}</p>
                    <input style="display: none" name="order" type="text">
                    <a href="{{route('InvoiceDisplay', ['id' => $order->id])}}" class="button margin-top-30">View Invoice</a>
                </div>

            </div>
        </div>
    </div>
    <!-- Container / End -->


@stop


@section('script')


    <!-- Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>
    <script type="text/javascript" src="{{asset('scripts/infobox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/markerclusterer.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/maps.js')}}"></script>


@stop
