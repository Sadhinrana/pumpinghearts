@include('layouts.head')

<body id="body" class="transparent-header">

<!-- Wrapper -->
<div id="wrapper">


    @include('layouts.navigation')

    @yield('body')

    @include('layouts.footer')

    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{asset('scripts/form/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/magnific-popup.min.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('scripts/waypoints.min.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('scripts/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{asset('scripts/custom.js')}}"></script>


<!-- Google Autocomplete -->
<script>
    function initAutocomplete() {
        var input = document.getElementById('autocomplete-input');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }
        });

        if ($('.main-search-input-item')[0]) {
            setTimeout(function(){
                $(".pac-container").prependTo("#autocomplete-container");
            }, 300);
        }
    }

    function LaunchUserModal() {
        document.getElementById("sign").click();
    }
</script>
@if( Session::has('modal_register_error'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sign').click();
            $('#reg').click();
        });
    </script>
@endif
@if( Session::has('modal_login_error'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sign').click();
        });
    </script>
@endif
{{--<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>--}}
<!-- Maps -->



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
