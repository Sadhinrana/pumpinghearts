@extends('layouts.dashboard')

@section('head')
    <title>Pumping Hearts | {{Auth::User()->name}}</title>
@stop

@section('body')

    <script>
        document.getElementById("bookings-menu-selling").classList.add('active');
    </script>
    <!-- Content
	================================================== -->
    <div class="dashboard-content">

        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Selling</h2>
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




                    <div id="small-dialog" class="zoom-anim-dialog mfp-hide small-dialog">
                        <div class="small-dialog-header">
                            <h3>Send Message</h3>
                            <p id="client-name">Trainer: </p>
                        </div>
                        <form method="post" action="{{route('TrainersMail')}}">
                            @csrf
                            <input style="display: none;" type="email" name="client_email" id="client_email" value="">
                            <input style="display: none;" type="text" name="order_id" id="order_id" value="">

                            <div class="message-reply margin-top-0">
                                <textarea name="message" required cols="40" rows="3" placeholder="Your Message to Client"></textarea>
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
                                                <h5>Client:</h5>
                                                <ul class="booking-list">
                                                    <li>{{$order->first_name}} {{$order->last_name}}</li>
                                                    <li>{{$order->email}}</li>
                                                    <li>{{$order->profile->phone}}</li>
                                                </ul>
                                            </div>


                                            <a id="client-message" href="#small-dialog" data-id="{{$order->id}}" data-email="{{$order->email}}" data-client="{{$order->first_name}} {{$order->last_name}}" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>

                                        </div>
                                    </div>
                                </div>
                                @if($order->completed == 0)
                                <form id="form-{{$order->id}}" method="post" action="{{route('AskForApproval')}}">
                                    @csrf
                                <div class="buttons-to-right">
                                    <input style="display: none;" type="text" value="{{$order->id}}" name="order_id">
                                    <a onclick="AsKForAcceptance({{$order->id}})" href="#" class="button gray approve"><i class="sl sl-icon-check"></i> Ask for Approval</a>
                                </div>
                                </form>
                                @else
                                    <div class="buttons-to-right">
                                        <a href="#" style="background-color: #64bc36" class="button approve"><i class="sl sl-icon-check"></i> Approved</a>
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
        $( "#client-message" ).click(function() {
            var client = $(this).data("client");
            var email = $(this).data("email");
            var id = $(this).data("id");
            var text ="Client: "+client;
            $("#client-name").text(text);
            $("#client_email").val(email);
            $("#order_id").val(id);
        });

       function AsKForAcceptance(id) {
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
