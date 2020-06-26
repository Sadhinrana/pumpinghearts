@extends('layouts.main')

@section('head')

    <title>Pumping Hearts | FAQs</title>

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

                    <h2>Contact Us</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>FAQs</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <div class="clearfix"></div>
    <!-- Map Container / End -->


    <!-- Container / Start -->
    <div class="container" style="margin-bottom: 75px;">

        <div class="row">

            <div class="col-md-12">
                <!-- Toggles Container -->
                <div class="style-2">

                    <!-- Toggle 1 -->
                    <div class="toggle-wrap">
                        <span class="trigger "><a href="#">First FAQ<i class="sl sl-icon-plus"></i></a></span>
                        <div class="toggle-container">
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Vivamus justo arcu, elementum a sollicitudin pellentesque, tincidunt ac enim. Proin id arcu ut ipsum vestibulum elementum.</p>
                        </div>
                    </div>
                    <!-- Toggle 1 -->
                    <div class="toggle-wrap">
                        <span class="trigger "><a href="#">Second FAQ<i class="sl sl-icon-plus"></i></a></span>
                        <div class="toggle-container">
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Vivamus justo arcu, elementum a sollicitudin pellentesque, tincidunt ac enim. Proin id arcu ut ipsum vestibulum elementum.</p>
                        </div>
                    </div>
                    <!-- Toggle 1 -->
                    <div class="toggle-wrap">
                        <span class="trigger "><a href="#">Third FAQ<i class="sl sl-icon-plus"></i></a></span>
                        <div class="toggle-container">
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Vivamus justo arcu, elementum a sollicitudin pellentesque, tincidunt ac enim. Proin id arcu ut ipsum vestibulum elementum.</p>
                        </div>
                    </div>
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
