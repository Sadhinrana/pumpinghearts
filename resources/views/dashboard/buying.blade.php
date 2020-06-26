@extends('layouts.dashboard')

@section('head')
    <title>Pumping Hearts | {{Auth::User()->name}}</title>
@stop

@section('body')

    <script>
        document.getElementById("bookings-menu-buying").classList.add('active');
    </script>
    <!-- Content
	================================================== -->
    <div class="dashboard-content">

        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Buying</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Bookings</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
            <!-- Listings -->
            <div class="col-lg-12 col-md-12">
                <div class="dashboard-list-box margin-top-0">

                    <!-- Booking Requests Filters  -->
                    <div class="booking-requests-filter">

                    {{--                        <!-- Sort by -->--}}
                    {{--                        <div class="sort-by">--}}
                    {{--                            <div class="sort-by-select">--}}
                    {{--                                <select data-placeholder="Default order" class="chosen-select-no-single">--}}
                    {{--                                    <option>All Packages</option>--}}
                    {{--                                    <option>Standard</option>--}}
                    {{--                                    <option>Premium</option>--}}
                    {{--                                </select>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    <!-- Date Range -->
                        <div id="booking-date-range">
                            <span></span>
                        </div>
                    </div>



                    <!-- Add Review Box -->
                    <div id="add" class=" zoom-anim-dialog mfp-hide small-dialog">
                        <form method="post" action="{{route('PostAReview')}}">
                            @csrf
                        <div class="small-dialog-header">
                            <h3>Add A Review</h3>
                            <p id="order-review-trainer">Trainer: </p>
                        </div>

                        <input type="hidden" value="" id="review_order_id" name="order_id">
                        <input type="hidden" value="" id="review_email" name="review_email">
                        <!-- Subratings Container -->
                        <div class="margin-bottom-25">

                            <!-- Subrating #3 -->
                            <div class="add-sub-rating">
                                <div class="sub-rating-title">Experience <i class="tip" data-tip-content="Demonstrated enough knowledge to suffice along with safe exercises and professionalism"></i></div>
                                <div class="sub-rating-stars">
                                    <!-- Leave Rating -->
                                    <div class="clearfix"></div>
                                    <div class="leave-rating">
                                        <input required type="radio" name="rating_exp" id="rating-21" value="1"/>
                                        <label for="rating-21" class="fa fa-star"></label>
                                        <input required type="radio" name="rating_exp" id="rating-22" value="2"/>
                                        <label for="rating-22" class="fa fa-star"></label>
                                        <input required type="radio" name="rating_exp" id="rating-23" value="3"/>
                                        <label for="rating-23" class="fa fa-star"></label>
                                        <input required type="radio" name="rating_exp" id="rating-24" value="4"/>
                                        <label for="rating-24" class="fa fa-star"></label>
                                        <input required type="radio" name="rating_exp" id="rating-25" value="5"/>
                                        <label for="rating-25" class="fa fa-star"></label>
                                    </div>
                                </div>
                            </div>

                            <!-- Subrating #4 -->
                            <div class="add-sub-rating">
                                <div class="sub-rating-title">Friendliness <i class="tip" data-tip-content="Ability to communicate and ask questions or concerns"></i></div>
                                <div class="sub-rating-stars">
                                    <!-- Leave Rating -->
                                    <div class="clearfix"></div>
                                    <div class="leave-rating">
                                        <input required type="radio" name="rating_friend" id="rating-31" value="1"/>
                                        <label for="rating-31" class="fa fa-star"></label>
                                        <input required type="radio" name="rating_friend" id="rating-32" value="2"/>
                                        <label for="rating-32" class="fa fa-star"></label>
                                        <input required type="radio" name="rating_friend" id="rating-33" value="3"/>
                                        <label for="rating-33" class="fa fa-star"></label>
                                        <input required type="radio" name="rating_friend" id="rating-34" value="4"/>
                                        <label for="rating-34" class="fa fa-star"></label>
                                        <input required type="radio" name="rating_friend" id="rating-35" value="5"/>
                                        <label for="rating-35" class="fa fa-star"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Subratings Container / End -->

                        <!-- Review Comment -->
                        <div id="add-comment" class="add-comment">
                            <fieldset>
                                <div>
                                    <label>Review:</label>
                                    <textarea name="comment" cols="40" rows="3"></textarea>
                                </div>

                            </fieldset>
                            <button type="submit" class="button">Submit Review</button>
                            <div class="clearfix"></div>

                        </div>
                        </form>

                    </div>

                    <!-- Add Review Box / End -->


                    <div id="small-dialog" class="zoom-anim-dialog mfp-hide small-dialog">
                        <div class="small-dialog-header">
                            <h3>Send Message</h3>
                            <p id="trainer-name">Trainer: </p>
                        </div>

                        <form method="post" action="{{route('CustomersMail')}}">
                            @csrf
                            <input style="display: none;" type="email" name="trainer_email" id="trainer_email" value="">
                            <input style="display: none;" type="text" name="order_id" id="order_id" value="">


                            <div class="message-reply margin-top-0">
                            <textarea cols="40" rows="3" placeholder="Your Message to Trainer"></textarea>
                            <button type="submit" class="button">Send</button>
                        </div>
                        </form>
                    </div>
                    <h4>Booking</h4>
                    <ul>

                    {{--                        One Booking--}}

                    @foreach($orders as $order)
                        <!-- Reply to review popup -->

                            <li>
                                <div class="list-box-listing bookings">
                                    <div class="list-box-listing-content">
                                        <div class="inner">
                                            <div class="inner-booking-list">
                                                <h5>Booking Date:</h5>
                                                <ul class="booking-list">
                                                    <li class="highlighted">{{date('M j Y g:i A', strtotime($order->created_at))}}</li>
                                                </ul>
                                            </div>


                                            <div class="inner-booking-list">
                                                <h5>Price:</h5>
                                                <ul class="booking-list">
                                                    <li class="highlighted">{{$order->package->price}}</li>
                                                </ul>
                                            </div>

                                            <div class="inner-booking-list">
                                                <h5>Trainer:</h5>
                                                <ul class="booking-list">
                                                    <li>{{$order->package->profile->user->name}}</li>
                                                    <li>{{$order->package->profile->user->email}}</li>
                                                    <li>{{$order->package->profile->phone}}</li>
                                                </ul>
                                            </div>



                                            <a id="trainer-message" href="#small-dialog" data-email="{{$order->package->profile->user->email}}" data-id="{{$order->id}}" data-trainer="{{$order->package->profile->user->name}}" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>

                                        @if(is_null($order->review))
                                            <a id="add-a-review" href="#add" data-email="{{$order->package->profile->user->email}}" data-id="{{$order->id}}" data-trainer="{{$order->package->profile->user->name}}" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Leave A Review</a>
                                            @else
                                                <a href="#" data-email="{{$order->package->profile->user->email}}" data-id="{{$order->id}}" data-trainer="{{$order->package->profile->user->name}}" class="rate-review"><i class="sl sl-icon-check"></i> Reviewed</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                @if($order->completd === 0)
                                    <form id="form-{{$order->id}}" method="post" action="{{route('MarkAsComplete')}}">
                                        @csrf
                                        <div class="buttons-to-right">
                                            <input style="display: none;" type="text" value="{{$order->id}}" name="order_id">
                                            <a onclick="AsKForApproval({{$order->id}})" class="button gray approve"><i class="sl sl-icon-check"></i> Mark As Complete</a>
                                        </div>
                                    </form>
                                    @else
                                    <div class="buttons-to-right">
                                        <a href="#" style="background-color: #64bc36" class="button approve"><i class="sl sl-icon-check"></i> Marked As Complete</a>
                                    </div>

                                    @endif


                            </li>

                        @endforeach

                    </ul>
                </div>
            </div>


            <!-- Copyrights -->
            <div class="col-md-12">
                <div class="copyrights">© 2019 Pumping Hearts. All Rights Reserved.</div>
            </div>
        </div>

    </div>
    <!-- Content / End -->


@stop

@section('script')
    <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
    <script src="{{asset('scripts/moment.min.js')}}"></script>
    <script src="{{asset('scripts/daterangepicker.js')}}"></script>

    <script>
        $( "#trainer-message" ).click(function() {
            var trainer = $(this).data("trainer");
            var email = $(this).data("email");
            var id = $(this).data("id");
            var text ="Tariner: "+trainer;
            $("#trainer-name").text(text);
            $("#trainer_email").val(email);
            $("#order_id").val(id);

        });
        $( "#add-a-review" ).click(function() {
            var trainer = $(this).data("trainer");
            var email = $(this).data("email");
            var id = $(this).data("id");
            var text ="Tariner: "+trainer;
            $("#order-review-trainer").text(text);
            $("#review_email").val(email);
            $("#review_order_id").val(id);

        });



        function AsKForApproval(id) {
            var form = "form-"+id;
            document.getElementById(form).submit();
        }


    </script>

    <script>
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#booking-date-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            cb(start, end);
            $('#booking-date-range').daterangepicker({
                "opens": "left",
                "autoUpdateInput": false,
                "alwaysShowCalendars": true,
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });

        // Calendar animation and visual settings
        $('#booking-date-range').on('show.daterangepicker', function(ev, picker) {
            $('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
            $('.daterangepicker').removeClass('calendar-hidden');
        });
        $('#booking-date-range').on('hide.daterangepicker', function(ev, picker) {
            $('.daterangepicker').removeClass('calendar-visible');
            $('.daterangepicker').addClass('calendar-hidden');
        });
    </script>

@stop
