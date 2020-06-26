{{--{{dd($profiles)}}--}}

@extends('layouts.main')

@section('head')
    <title>Pumping Hearts</title>
@stop


@section('body')
    <!-- Banner
    ================================================== -->
    <div class="main-search-container centered" data-background-image="images/main-search-background-01.jpg">
        <div class="main-search-inner">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>
                            Find Nearby
                            <!-- Typed words can be configured in script settings at the bottom of this HTML file -->
                            <span class="typed-words"></span>
                        </h2>
                        <h4>Personal training made personal!</h4>

{{--                        <div class="main-search-input">--}}

{{--                            <div class="main-search-input-item">--}}
{{--                                <input type="text" placeholder="What are you looking for?" value=""/>--}}
{{--                            </div>--}}

{{--                            <div class="main-search-input-item location">--}}
{{--                                <div id="autocomplete-container">--}}
{{--                                    <input id="autocomplete-input" type="text" placeholder="Location">--}}
{{--                                </div>--}}
{{--                                <a href="#"><i class="fa fa-map-marker"></i></a>--}}
{{--                            </div>--}}

{{--                            <div class="main-search-input-item">--}}
{{--                                <select data-placeholder="All Categories" class="chosen-select" >--}}
{{--                                    <option>All Categories</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <button class="button" >Search</button>--}}

{{--                        </div>--}}




                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6 " style="margin-top: 50px; text-align: center">
                        <form action="{{route('trainer-search')}}">
                            <button type="submit" class="button" style="font-size: 18px;
	font-weight: 600;
	padding: 0 40px;
	margin-right: 1px;
	height: 50px;
	outline: none;" >I am looking for a Trainer</button>
                        </form>

                    </div>


                    <div class="col-md-6" style="margin-top: 50px; text-align: center;">
                        @auth
                        <button onclick="Dashboard()" class="button" style="font-size: 18px;
	font-weight: 600;
	padding: 0 40px;
	margin-right: 1px;
	height: 50px;
	outline: none;" >I am a Personal Trainer</button>
                        @endauth
                        <a id="profile-det" style="display: none" href="{{route('DashboardProfile', ['id' => Auth::id()])}}"></a>
                        @guest
                        <button onclick="LaunchUserModal()" class="button" style="font-size: 18px;
	font-weight: 600;
	padding: 0 40px;
	margin-right: 1px;
	height: 50px;
	outline: none;" >I am a Personal Trainer</button>
                            @endguest
                    </div>
                </div>
                <!-- Features Categories -->
                {{--<div class="row">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<h5 class="highlighted-categories-headline">Or browse featured categories:</h5>--}}

                        {{--<div class="highlighted-categories">--}}
                            {{--<!-- Box -->--}}
                            {{--<a href="listings-list-with-sidebar.html" class="highlighted-category">--}}
                                {{--<i class="im im-icon-Home"></i>--}}
                                {{--<h4>Apartments</h4>--}}
                            {{--</a>--}}

                            {{--<!-- Box -->--}}
                            {{--<a href="listings-list-full-width.html" class="highlighted-category">--}}
                                {{--<i class="im im-icon-Hamburger"></i>--}}
                                {{--<h4>Eat &amp; Drink</h4>--}}
                            {{--</a>--}}

                            {{--<!-- Box -->--}}
                            {{--<a href="listings-half-screen-map-list.html" class="highlighted-category">--}}
                                {{--<i class="im im-icon-Electric-Guitar"></i>--}}
                                {{--<h4>Events</h4>--}}
                            {{--</a>--}}

                            {{--<!-- Box -->--}}
                            {{--<a href="listings-half-screen-map-list.html" class="highlighted-category">--}}
                                {{--<i class="im im-icon-Dumbbell"></i>--}}
                                {{--<h4>Fitness</h4>--}}
                            {{--</a>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}
                <!-- Featured Categories - End -->

            </div>

        </div>

    </div>


    <!-- Content
    ================================================== -->


    <!-- Fullwidth Section -->
    <section class="fullwidth padding-top-75 padding-bottom-70" data-background-color="#fafafa">

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-45">
                        <strong class="headline-with-separator">Find Your Personal Trainer</strong>
                        <span class="margin-top-25">Not all personal trainers are created equal. Which is why you came to the right place. Here you will be matched accordingly to a personal trainer custom to your goals</span>
                    </h3>
                </div>

                <div class="col-md-12">
                    <div class="simple-slick-carousel dots-nav">

                        <!-- Listing Item -->
                        @foreach($profiles as $profile)
                            <?php

                                $images = \App\Gallery::where('profile_user_id', $profile->user_id)->first();
                                if($images)
                                    $image = 'images/ProfileGallery/'.$images->name;
                                else
                                    $image = 'images/listing-item-01.jpg';
                                $city = \App\City::find($profile->city);
                                $user = \App\User::find($profile->user_id);
                            ?>
                        <div class="carousel-item">
                            <a href="{{route('PublicProfile', ['id' => $user->id, 'name' => $user->name])}}" class="listing-item-container">
                                <div class="listing-item">

                                    <img src="{{asset($image)}}" alt="">

                                    {{--<div class="listing-badge now-open">Now Open</div>--}}

                                    <div class="listing-item-content">
                                        <span class="tag">{{$city->name}}</span>
                                        <h3>{{$profile->title}}<i class="verified-icon"></i></h3>
                                        <span>{{$profile->address}}</span>
                                    </div>

                                </div>
                                <div class="star-rating" data-rating="{{count($profile->review)}}">
                                    <div class="rating-counter">({{count($profile->review)}})</div>
                                </div>
                            </a>
                        </div>

                        <!-- Listing Item / End -->
                        @endforeach

                    </div>

                </div>

            </div>
        </div>

    </section>
    <!-- Fullwidth Section / End -->

    <section class="fullwidth padding-top-75 padding-bottom-30" data-background-color="#fff">
        <!-- Info Section -->
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="headline centered headline-extra-spacing">
                        <strong class="headline-with-separator">What Our Users Say</strong>
                        <span class="margin-top-25">We collect reviews from our users so you can get an honest opinion of what an experience with our website are really like!</span>
                    </h3>
                </div>
            </div>

        </div>
        <!-- Info Section / End -->

        <!-- Categories Carousel -->
        <div class="fullwidth-carousel-container margin-top-20 no-dots">
            <div class="testimonial-carousel testimonials">

                <!-- Item -->
                <div class="fw-carousel-review">
                    <div class="testimonial-box">
                        <div class="testimonial">Great customer service and my trainer Armon deserves 5 stars in all aspects.
                        </div>
                    </div>
                    <div class="testimonial-author">
                        <img src="images/happy-client-01.jpg" alt="">
                        <h4>Jennie Smith <span>CEO XYZ Corp</span></h4>
                    </div>
                </div>

                <!-- Item -->
                <div class="fw-carousel-review">
                    <div class="testimonial-box">
                        <div class="testimonial">Armon helped me lose 10 lbs in 1 month! Awesome trainer. Pumping Hearts helped me find the best match.</div>
                    </div>
                    <div class="testimonial-author">
                        <img src="images/happy-client-02.jpg" alt="">
                        <h4>Athar<span>IT Manager - SMCSE</span></h4>
                    </div>
                </div>

                <!-- Item -->
                <div class="fw-carousel-review">
                    <div class="testimonial-box">
                        <div class="testimonial">Pumping Hearts made it so easy for me and firends to find the perfect trainers. We are all following healthy lifestyle now</div>
                    </div>
                    <div class="testimonial-author">
                        <img src="images/happy-client-03.jpg" alt="">
                        <h4>Ilyas <span>Restaurant Owner</span></h4>
                    </div>
                </div>

            </div>
        </div>
        <!-- Categories Carousel / End -->

    </section>



    <!-- Info Section -->
    <section class="fullwidth padding-top-75 padding-bottom-70" data-background-color="#fafafa">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="headline centered headline-extra-spacing">
                        <strong class="headline-with-separator">Your Pathway to Healthy Lifestyle</strong>
                        <span class="margin-top-25">Explore some of the best tips from around the world from our partners and friends.</span>
                    </h3>
                </div>
            </div>

            <div class="row icons-container">
                <!-- Stage -->
                <div class="col-md-4">
                    <div class="icon-box-2 with-line">
                        <i class="im im-icon-weight-Lift"></i>
                        <h3>Tailored For Your Goal</h3>
                    </div>
                </div>


                <!-- Stage -->
                <div class="col-md-4">
                    <div class="icon-box-2">
                        <i class="im im-icon-Checked-User"></i>
                        <h3>Honest Reviews</h3>
                    </div>
                </div>

                <!-- Stage -->
                <div class="col-md-4">
                    <div class="icon-box-2 with-line">
                        <i class="im im-icon-Watch"></i>
                        <h3>At Your Time</h3>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- Info Section / End -->
@stop

@section('script')

    <!-- Typed Script -->
    <script type="text/javascript" src="{{asset('scripts/typed.js')}}"></script>
    <script>
        var typed = new Typed('.typed-words', {
            strings: ["Trainers"," Coaches"," Instructors", " Gurus"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
        });
    </script>


    <script type="text/javascript">

        function Dashboard() {
            document.getElementById("profile-det").click();
        }

    </script>

    @if( Session::has('modal_message_error'))
        <script type="text/javascript">
            $(document).ready(function() {
                $('#sign').click();
            });
        </script>
    @endif

    @if( Session::has('modal_register_error'))
        <script type="text/javascript">
            $(document).ready(function() {
                $('#sign').click();
                $('#reg').click();
            });
        </script>
    @endif

@stop
