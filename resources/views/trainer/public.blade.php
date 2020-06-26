@extends('layouts.main')

@section('head')
    <title>Pumping Hearts | {{$profile->title}}</title>
@stop


@section('body')

    <script type="text/javascript">
        document.getElementById("body").classList.remove('transparent-header');
        document.getElementById("main-logo").src="{{asset('images/Logo-red-200px.png')}}";
        document.getElementById("header").classList.add('not-sticky');
    </script>

        <!-- Slider
    ================================================== -->
        <div class="listing-slider mfp-gallery-container margin-bottom-0">

            @foreach($gallery as $image)
                <a href="{{asset('images/ProfileGallery/'.$image->name)}}" data-background-image="{{asset('images/ProfileGallery/'.$image->name)}}" class="item mfp-gallery"></a>
            @endforeach
        </div>


    @if( Session::has('FailedPurchase'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ Session::get('FailedPurchase') }}
        </p>
    @endif

    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row sticky-wrapper">
            <div class="col-lg-8 col-md-8 padding-right-30">

                    <!-- Titlebar -->
                    <div id="titlebar" style="margin-top: 50px;" class="listing-titlebar">

                        <div class="listing-titlebar-title">
                            <h2>{{$profile->title}}</h2>
                            <span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							{{$profile->address}}
						</a>
					</span>
                        <div class="star-rating" data-rating="{{count($reviews)}}">
                            <div class="rating-counter"><a href="#listing-reviews">({{count($reviews)}} reviews)</a>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Listing Nav -->
                    <div id="listing-nav" class="listing-nav-container">
                        <ul class="listing-nav">
                            <li><a href="#listing-overview" class="active">Overview</a></li>
                            <li><a href="#listing-pricing-list">Pricing</a></li>
                            <li><a href="#listing-location">Location</a></li>
                            <li><a href="#listing-reviews">Reviews</a></li>
                        </ul>
                    </div>

                <!-- Overview -->
                <div id="listing-overview" class="listing-section">

                    <!-- Description -->

                    <p>
                        {{$profile->description}}
                    </p>


                    <!-- Listing Contacts -->
                    <div class="listing-links-container">

                        <ul class="listing-links contact-links">
                            <li><a href="tel:12-345-678" class="listing-links"><i
                                            class="fa fa-phone"></i> {{$profile->phone}}</a></li>
                            <li><a href="{{'mailto:'.$mail}}" class="listing-links"><i
                                            class="fa fa-envelope-o"></i> {{$mail}}</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>

                            <ul class="listing-links">
                                <li><a href="{{$profile->facebook}}" target="_blank" class="listing-links-fb"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                                <li><a href="{{$profile->instagram}}" target="_blank" class="listing-links-ig"><i class="fa fa-instagram"></i> Instagram</a></li>
                                <li><a href="{{$profile->twitter}}" target="_blank" class="listing-links-tt"><i class="fa fa-twitter"></i> Twitter</a></li>
                            </ul>
                            <div class="clearfix"></div>

                        </div>
                        <div class="clearfix"></div>


                    <!-- Amenities -->
                    <h3 class="listing-desc-headline">Specialities</h3>
                    <ul class="listing-features checkboxes margin-top-0">
                        @foreach($categories as $category)
                            <li>
                                {{$category->category_name}}
                            </li>
                        @endforeach
                    </ul>
                    <!-- Amenities -->
                    <h3 class="listing-desc-headline">CPR Certification</h3>
                    @if($profile->cpr)
                        <ul class="listing-features checkboxes margin-top-0">
                            <li>CPR Certified</li>
                        </ul>
                    @else
                        <li>NOT CPR Certified</li>
                    @endif

                    @if(count($cprs) > 0)
                    <h3 class="listing-desc-headline">Additional Certification</h3>
                        @foreach($cprs as $cpr)
                            <ul class="listing-features checkboxes margin-top-0">
                                <strong>{{$cpr->name}}</strong>: {{$cpr->description}}
                            </ul>
                        @endforeach
                    @endif
                </div>


                <!-- Food Menu -->
                <div id="listing-pricing-list" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-70 margin-bottom-30">Pricing</h3>

                    <div class="pricing-list-container">

                        <!-- Food List -->

                        <ul>
                            @foreach($packages as $package)
                                @auth
                                    @php
                                        $buyCheck = App\Order::where(['profile_user_id' => Auth::user()->id, 'package_id'=>$package->id])->get()->first();
                                    @endphp
                                @endauth
                                @guest
                                        @php
                                            $buyCheck = null;
                                        @endphp
                                @endguest
                                <h4>Prices and Packages </h4>
                                <li>
                                    <h5>{{$package->name}}</h5>
                                    <p>{{$package->description}}</p>
                                    <span>{{$package->price}} USD</span>
                                    @if($buyCheck == null)
                                        <a href="{{route('CreateOrder', ['id' => $package->id])}}">
                                            <button style="margin-top: 1.7em" class="button">Purchase Now</button>
                                        </a>
                                    @else
                                        <a>
                                            <button style="margin-top: 1.7em" class="like-button">Purchased</button>
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <hr>

                </div>
                <!-- Food Menu / End -->


                <!-- Location -->
                <div id="listing-location" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>

                    <div id="singleListingMap-container">
                        <div id="map_view" style="width: 100%;height: 350px;display: inline-block"></div>
                        {{--<div id="singleListingMap" data-latitude="40.70437865245596" data-longitude="-73.98674011230469" data-map-icon="im im-icon-Hamburger"></div>
                        <a href="#" id="streetView">Street View</a>--}}
                    </div>
                </div>


                <!-- Reviews -->
                <div id="listing-reviews" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews
                        <span>({{count($reviews)}})</span></h3>

                    <!-- Rating Overview -->
                    <div class="rating-overview">
                        <div class="rating-overview-box">
                            <span class="rating-overview-box-total">{{round($r_array['overall'])}}</span>
                            <span class="rating-overview-box-percent">out of 5.0</span>
                            <div class="star-rating" data-rating="{{$r_array['overall']}}"></div>
                        </div>

                        <div class="rating-bars">
                            {{--                                <div class="rating-bars-item">--}}
                            {{--                                    <span class="rating-bars-name">Service <i class="tip" data-tip-content="Quality of customer service and attitude to work with you"></i></span>--}}
                            {{--                                    <span class="rating-bars-inner">--}}
                            {{--									<span class="rating-bars-rating" data-rating="{{$r_array['services']}}">--}}
                            {{--										<span class="rating-bars-rating-inner"></span>--}}
                            {{--									</span>--}}
                            {{--									<strong>{{$r_array['services']}}</strong>--}}
                            {{--								</span>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="rating-bars-item">--}}
                            {{--                                    <span class="rating-bars-name">Value for Money <i class="tip" data-tip-content="Overall experience received for the amount spent"></i></span>--}}
                            {{--                                    <span class="rating-bars-inner">--}}
                            {{--									<span class="rating-bars-rating" data-rating="{{$r_array['vom']}}">--}}
                            {{--										<span class="rating-bars-rating-inner"></span>--}}
                            {{--									</span>--}}
                            {{--									<strong>{{$r_array['vom']}}</strong>--}}
                            {{--								</span>--}}
                            {{--                                </div>--}}
                            <div class="rating-bars-item">
                                <span class="rating-bars-name">Experience <i class="tip"
                                                                             data-tip-content="Demonstrated enough knowledge to suffice along with safe exercises and professionalism"></i></span>
                                <span class="rating-bars-inner">
									<span class="rating-bars-rating" data-rating="{{$r_array['exp']}}">
										<span class="rating-bars-rating-inner"></span>
									</span>
									<strong>{{$r_array['exp']}}</strong>
								</span>
                            </div>
                            <div class="rating-bars-item">
                                <span class="rating-bars-name">Friendliness <i class="tip"
                                                                               data-tip-content="Ability to communicate and ask questions or concerns"></i></span>
                                <span class="rating-bars-inner">
									<span class="rating-bars-rating" data-rating="{{$r_array['friend']}}">
										<span class="rating-bars-rating-inner"></span>
									</span>
									<strong>{{$r_array['friend']}}</strong>
								</span>
                            </div>
                        </div>
                    </div>
                    <!-- Rating Overview / End -->


                    <div class="clearfix"></div>

                    <!-- Reviews -->
                    <section class="comments listing-reviews">
                        <ul>
                            @foreach($reviews as $review)
                                <li>
                                    <div class="comment-content">
                                        <div class="comment-by">{{$review->profile->user->name}} <span
                                                    class="date">{{date('M j Y g:i A', strtotime($review->created_at))}}</span>
                                            <?php $rating = ($review->experience + $review->friendliness) / 2?>
                                            <div class="star-rating" data-rating="{{$rating}}"></div>
                                        </div>
                                        <p>{{$review->review}}</p>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </section>

                    {{--                        <!-- Pagination -->--}}
                    {{--                        <div class="clearfix"></div>--}}
                    {{--                        <div class="row">--}}
                    {{--                            <div class="col-md-12">--}}
                    {{--                                <!-- Pagination -->--}}
                    {{--                                <div class="pagination-container margin-top-30">--}}
                    {{--                                    <nav class="pagination">--}}
                    {{--                                        <ul>--}}
                    {{--                                            <li><a href="#" class="current-page">1</a></li>--}}
                    {{--                                            <li><a href="#">2</a></li>--}}
                    {{--                                            <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>--}}
                    {{--                                        </ul>--}}
                    {{--                                    </nav>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="clearfix"></div>--}}
                    {{--                        <!-- Pagination / End -->--}}
                </div>


            </div>


            <!-- Sidebar
            ================================================== -->
            <div class="col-lg-4 col-md-4 margin-top-75 sticky">


                    <!-- Contact -->
                    <div class="boxed-widget margin-top-35 margin-bottom-35">
                        <div class="hosted-by-title">
                            <h4><span>Trainer Details</span> <a href="#">{{$profile->title}}</a></h4>
                            <?php $img = "images/Avatars/".$profile->picture?>
                            <a href="#" style="max-width: 60px;
                                        max-height: 60px;
    overflow: hidden;
    border-radius: 50%;
    position: absolute;
     right: 0;
    top: -8px;
    image-rendering: -webkit-optimize-contrast;
" ><img src="{{asset($img)}}" alt=""></a>
                        </div>
                        <ul class="listing-details-sidebar">
                            <li><i class="sl sl-icon-phone"></i> {{$profile->phone}}</li>
                            <!-- <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> -->
                            <li><i class="fa fa-envelope-o"></i> <a href="#">{{$mail}}</a></li>
                        </ul>

                        <ul class="listing-details-sidebar social-profiles">
                            <li><a href="#" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                            <li><a href="#" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>
                            <!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
                        </ul>
                    </div>
                    <!-- Contact / End-->



                    <!-- Verified Badge -->
                    <div class="verified-badge with-tip" data-tip-content="Account has been verified and belongs to the person or organization represented.">
                        <i class="sl sl-icon-user-following"></i> Verified Account
                    </div>

                <!-- Message Vendor -->
                <div class="boxed-widget booking-widget message-vendor margin-top-35">
                    <h3><i class="fa fa-envelope-o"></i> Message Trainer</h3>

                    <form id="pre-sale-query" method="post" action="{{route('PreSale')}}">
                        @csrf
                        <input type="text" value="{{$profile->user_id}}" style="display: none" name="profile_id">
                        <div class="row with-forms  margin-top-0">
                            @if(Session::has('message'))
                                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                            @endif
                            <div class="col-lg-12">
                                <input type="text" name="name" placeholder="Full Name">
                                <input type="email" name="email" placeholder="mail@example.com">
                                <input type="tel" name="phone" placeholder="12 345 678 910">
                                <textarea name="question" id="query" cols="10" rows="2"
                                          placeholder="Message"></textarea>
                            </div>

                            <!-- Preferred Contact Methos Radios -->
                            <div class="col-lg-12">
                                <div class="preferred-contact-method">
                                    <h5>Preferred contact method</h5>

                                    <div class="preferred-contact-radios">
                                        <div class="radio">
                                            <input id="radio-1" name="contact_radio" type="radio" checked value="Email">
                                            <label for="radio-1"><span class="radio-label"></span> Email</label>
                                        </div>

                                        <div class="radio">
                                            <input id="radio-2" name="contact_radio" type="radio" value="Phone">
                                            <label for="radio-2"><span class="radio-label"></span> Phone</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </form>

                    <!-- Recaptcha Holder -->
                    <div class="captcha-holder">
                        <!-- Recaptcha goes here -->
                    </div>

                    <!-- Book Now -->
                    <a onclick="SubmitForm()" class="button book-now fullwidth margin-top-5">Submit Request</a>
                </div>
                <!-- Book Now / End -->

                <!-- Opening Hours -->
                <div class="boxed-widget opening-hours margin-top-35">
                    {{--                        <div class="listing-badge now-open">Now Open</div>--}}
                    <h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
                    <ul>
                        <li>Monday
                            <span>
                                    @if(is_null($timings->monday_opening))
                                    NA
                                @else {{date("h.i A", strtotime($timings->monday_opening))}} @endif - @if(is_null($timings->monday_closing))
                                    NA @else{{date("h.i A", strtotime($timings->monday_closing))}}
                                @endif
                                </span>
                        </li>
                        <li>Tuesday
                            <span>
                                    @if(is_null($timings->tuesday_opening))
                                    NA
                                @else {{date("h.i A", strtotime($timings->tuesday_opening))}} @endif - @if(is_null($timings->tuesday_closing))
                                    NA
                                @else{{date("h.i A", strtotime($timings->tuesday_closing))}}
                                @endif
                                </span>
                        </li>
                        <li>Wednesday
                            <span>
                                    @if(is_null($timings->wednesday_opening))
                                    NA
                                @else {{date("h.i A", strtotime($timings->wednesday_opening))}} @endif - @if(is_null($timings->wednesday_closing))
                                    NA @else{{date("h.i A", strtotime($timings->wednesday_closing))}}
                                @endif
                                </span>
                        </li>
                        <li>Thursday
                            <span>
                                    @if(is_null($timings->thursday_opening))
                                    NA
                                @else {{date("h.i A", strtotime($timings->thursday_opening))}} @endif - @if(is_null($timings->thursday_closing))
                                    NA @else{{date("h.i A", strtotime($timings->thursday_closing))}}
                                @endif
                                </span>
                        </li>
                        <li>Friday
                            <span>
                                    @if(is_null($timings->friday_opening))
                                    NA
                                @else {{date("h.i A", strtotime($timings->friday_opening))}} @endif - @if(is_null($timings->friday_closing))
                                    NA @else{{date("h.i A", strtotime($timings->friday_closing))}}
                                @endif
                                </span>
                        </li>
                        <li>Saturday
                            <span>
                                    @if(is_null($timings->saturday_opening))
                                    NA
                                @else {{date("h.i A", strtotime($timings->saturday_opening))}} @endif - @if(is_null($timings->saturday_closing))
                                    NA @else{{date("h.i A", strtotime($timings->saturday_closing))}}
                                @endif
                                </span>
                        </li>
                        <li>Sunday
                            <span>
                                    @if(is_null($timings->sunday_opening))
                                    NA
                                @else {{date("h.i A", strtotime($timings->sunday_opening))}} @endif - @if(is_null($timings->sunday_closing))
                                    NA @else{{date("h.i A", strtotime($timings->sunday_closing))}}
                                @endif
                                </span>
                        </li>


                    </ul>
                </div>
                <!-- Opening Hours / End -->

                    <!-- Share / Like -->
                    <div class="listing-share margin-top-40 margin-bottom-40 no-border">
                        @auth
                            @if($bookmark === 0)
                                <button class="like-button"><span class="like-icon"></span> Bookmark this Trainer</button>
                            @else
                                <button class="like-button liked"><span class="like-icon liked"></span> Bookmark this Trainer</button>
                            @endif
                        @endauth
                        @guest

                        <h4>Register now to save this Trainer</h4>
                    @endguest
                    {{--                        // <span>159 people bookmarked this trainer</span>--}}

                    <div id="dom-target" style="display: none;">
                        <?php
                        $output = $profile->user_id;
                        echo htmlspecialchars($output);
                        ?>
                    </div>
                    <!-- Share Buttons -->
                    <ul class="share-buttons margin-top-40 margin-bottom-0">
                        <li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
                        <li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
                        <li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
                        <!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
                    </ul>
                    <div class="clearfix"></div>
                </div>

            </div>
            <!-- Sidebar / End -->

        </div>
    </div>


@stop

@section('script')


    <!-- Maps -->
    {{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA41R-L2BjhBdL6dN6H_vtYBQ09vvI7jJQ"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>--}}
    <script type="text/javascript" src="{{asset('scripts/infobox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/markerclusterer.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/maps.js')}}"></script>

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('.like-icon, .widget-button, .like-button').on('click', function (e) {
            e.preventDefault();
            var div = document.getElementById("dom-target");
            var myData = div.textContent;


            $.ajax({
                type: 'POST',
                url: '/save-bookmark',
                data: {id: myData},
                dataType: 'JSON',
                // success:function(data){
                //     console.log(data);
                // }
            });

            $(this).toggleClass('liked');
            $(this).children('.like-icon').toggleClass('liked');

        });


    </script>

    <script type="text/javascript">
        function SubmitForm() {
            document.getElementById("pre-sale-query").submit();
        }

        new Vue({
            el: '#singleListingMap-container',
            data: {
                map: null,
                user: {},
            },
            methods: {
                getUserData: function () {
                    let app = this;
                    $.ajax({
                        type: 'GET',
                        url: window.location.href,
                        success: function (resp) {
                            app.user = resp;
                            if (resp.lat) {
                                app.map = new google.maps.Map(document.getElementById('map_view'), {
                                    center: {lat: parseFloat(app.user.lat), lng: parseFloat(app.user.long)},
                                    radius: 500,
                                    zoom: 15
                                });
                                var infowindow = new google.maps.InfoWindow({
                                    content: app.user.location
                                });
                                var marker = new google.maps.Marker({
                                    position: {lat: parseFloat(app.user.lat), lng: parseFloat(app.user.long)},
                                    map: app.map,
                                    title: app.user.title
                                });
                                google.maps.event.addListener(marker, 'click', function () {
                                    infowindow.open(app.map, marker);
                                });
                                google.maps.event.trigger(marker, 'click');
                            } else {
                                app.map = new google.maps.Map(document.getElementById('map_view'), {
                                    center: {lat: 36.778259, lng: -119.417931},
                                    radius: 500,
                                    zoom: 5
                                });
                            }
                        }
                    });
                }
            },
            mounted() {
                this.getUserData();
            }
        });
    </script>

@stop
