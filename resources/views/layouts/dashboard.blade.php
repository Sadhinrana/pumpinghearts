@include('layouts.head')

<body>


<div id="wrapper">

    @include('layouts.navigation')

    <script type="text/javascript">
        document.getElementById("header-container").classList.add('fixed');
        document.getElementById("header-container").classList.add('fullwidth');
        document.getElementById("header-container").classList.add('dashboard');
        document.getElementById("header").classList.add('not-sticky');
        document.getElementById("logo-link").classList.add('dashboard-logo');
    </script>

    <!-- Dashboard -->
        <div id="dashboard">

            <!-- Navigation
            ================================================== -->

            <!-- Responsive Navigation Trigger -->
            <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

            <div class="dashboard-nav">
                <div class="dashboard-nav-inner">

                    <ul data-submenu-title="Main">
                        <li id="dashboard-menu"><a href="{{route('Dashboard', ['id' => Auth::id()])}}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>


                        <li><a><i class="fa fa-calendar-check-o"></i> Bookings</a>
                            <ul>
                                <li id="bookings-menu-selling"><a href="{{route('DashboardBookingsSelling', ['id' => Auth::id()])}}"><i class=""></i> Selling</a></li>
                                <li id="bookings-menu-buying"><a href="{{route('DashboardBookingsBuying', ['id' => Auth::id()])}}"><i class=""></i> Buying</a></li>
                            </ul>
                        </li>


                        <li id="bookings-menu"></li>
                        <li id="wallet-menu"><a href="{{route('DashboardWallet', ['id' => Auth::id()])}}"><i class="sl sl-icon-wallet"></i> Wallet </a>
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <a href="{{route('PaymentDetails', ['id' => Auth::id()])}}">Payment Details</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}



                        </li>
                    </ul>

                    <ul data-submenu-title="Services">
                        <li id="reviews-menu"><a href="{{route('DashboardReviews', ['id' => Auth::id()])}}"><i class="sl sl-icon-star"></i> Reviews </a>
                        </li>
                        <li id="bookmarks-menu"><a href="{{route('DashboardBookmarks', ['id' => Auth::id()])}}"><i class="sl sl-icon-heart"></i> Bookmarks</a></li>
                        <li id="packages-menu"><a href="{{route('DashboardPackage', ['id' => Auth::id()])}}"><i class="sl sl-icon-plus"></i> Packages </a></li>
                    </ul>

                    <ul data-submenu-title="Account">

                        <li><a><i class="sl sl-icon-user"></i>  My Profile</a>
                            <ul>
                                <li id="profile-menu"><a href="{{route('DashboardProfile', ['id' => Auth::id()])}}">Edit Profile</a></li>
                                <li id="profile-gallery-menu">Gallery
                                <ul>
                                    <li>
                                        <a href="{{route('DashboardGallery', ['id' => Auth::id()])}}">Add Images</a>
                                    </li>
                                    <li>
                                        <a href="{{route('DashboardGalleryEdit', ['id' => Auth::id()])}}">Edit Images</a>
                                    </li>
                                </ul>
                                </li>
                                <li id="profile-timings-menu"><a href="{{route('DashboardTimings', ['id' => Auth::id()])}}">Timings</a></li>
                            </ul>
                        </li>

                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" ><i class="sl sl-icon-power"></i> Logout</a>
                        </li>
                    </ul>

                </div>
            </div>
            <!-- Navigation / End -->

            @yield('body')

        </div>
        <!-- Dashboard / End -->


</div>


<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{asset('scripts/jquery-2.2.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/custom.js')}}"></script>


{{--<!-- Google Autocomplete -->--}}
{{--<script>--}}
    {{--function initAutocomplete() {--}}
        {{--var input = document.getElementById('autocomplete-input');--}}
        {{--var autocomplete = new google.maps.places.Autocomplete(input);--}}

        {{--autocomplete.addListener('place_changed', function() {--}}
            {{--var place = autocomplete.getPlace();--}}
            {{--if (!place.geometry) {--}}
                {{--window.alert("No details available for input: '" + place.name + "'");--}}
                {{--return;--}}
            {{--}--}}
        {{--});--}}

        {{--if ($('.main-search-input-item')[0]) {--}}
            {{--setTimeout(function(){--}}
                {{--$(".pac-container").prependTo("#autocomplete-container");--}}
            {{--}, 300);--}}
        {{--}--}}
    {{--}--}}
{{--</script>--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>--}}



@yield('script')

{{--<!-- Style Switcher--}}
{{--================================================== -->--}}
{{--<script src="scripts/switcher.js"></script>--}}

{{--<div id="style-switcher">--}}
{{--<h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>--}}

{{--<div>--}}
{{--<ul class="colors" id="color1">--}}
{{--<li><a href="#" class="main" title="Main"></a></li>--}}
{{--<li><a href="#" class="blue" title="Blue"></a></li>--}}
{{--<li><a href="#" class="green" title="Green"></a></li>--}}
{{--<li><a href="#" class="orange" title="Orange"></a></li>--}}
{{--<li><a href="#" class="navy" title="Navy"></a></li>--}}
{{--<li><a href="#" class="yellow" title="Yellow"></a></li>--}}
{{--<li><a href="#" class="peach" title="Peach"></a></li>--}}
{{--<li><a href="#" class="beige" title="Beige"></a></li>--}}
{{--<li><a href="#" class="purple" title="Purple"></a></li>--}}
{{--<li><a href="#" class="celadon" title="Celadon"></a></li>--}}
{{--<li><a href="#" class="red" title="Red"></a></li>--}}
{{--<li><a href="#" class="brown" title="Brown"></a></li>--}}
{{--<li><a href="#" class="cherry" title="Cherry"></a></li>--}}
{{--<li><a href="#" class="cyan" title="Cyan"></a></li>--}}
{{--<li><a href="#" class="gray" title="Gray"></a></li>--}}
{{--<li><a href="#" class="olive" title="Olive"></a></li>--}}
{{--</ul>--}}
{{--</div>--}}

{{--</div>--}}
{{--<!-- Style Switcher / End -->--}}


</body>
</html>
