@extends('layouts.main')

@section('head')

    <title>Pumping Hearts | Trainers</title>
    <style rel="stylesheet">
        .paypal-disabled {
            pointer-events: none;
            opacity: 0.5;
        }
    </style>
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
                            <li>Booking</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <!-- Content
    ================================================== -->

    <form id="checkOutForm" method="post" action="{{route('FinalizeOrder')}}">
        @csrf

    <!-- Container -->
    <div class="container">
        @if($profile->tos)
        <div class="row margin-bottom-45">
            <div class="col-md-12">
                <h4>Notice</h4>
                <p>By purchasing the selected item you are agreeing to the terms of the trainer and incase of inconvenience resolved within the client and trainer only. Pumping Hearts is not responsible for any issues.</p>
                <p>"{{$profile->tos}}"</p>
            </div>
        </div>
        @endif
        <div class="row">

            <!-- Content
            ================================================== -->
            <div class="col-lg-8 col-md-8 padding-right-30">

                <h3 class="margin-top-0 margin-bottom-30">Personal Details</h3>
                @if ($errors->has('paypal_details'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('paypal_details') }}
                    </div>
                @endif
                <input type="hidden" name="paypal_details" id="paypal_details">
                <div class="row">

                    <div class="col-md-6">
                        <label>First Name</label>
                        <input onchange="checkValidation()" type="text" required name="fname" value="">
                    </div>

                    <div class="col-md-6">
                        <label>Last Name</label>
                        <input onchange="checkValidation()" type="text" required name="lname" value="">
                    </div>

                    <div class="col-md-6">
                        <div class="input-with-icon medium-icons">
                            <label>E-Mail Address</label>
                            <input onchange="checkValidation()" type="email" required name="email" value="">
                            <i class="im im-icon-Mail"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-with-icon medium-icons">
                            <label>Phone</label>
                            <input onchange="checkValidation()" required type="text" name="phone" value="">
                            <i class="im im-icon-Phone-2"></i>
                        </div>
                    </div>

                </div>


                <h3 class="margin-top-55 margin-bottom-30">Payment Method</h3>

            @if($profile->stripe_user_id)
                <!-- Payment Methods Accordion -->
                <div class="payment paypal-disabled" id="paypalLinks">

                    {{--<button class="btn btn-info" id="popupmodal" style="width: 100%">Pay with stripe</button>--}}
                    <input type="hidden" id="stripe-publishable-key" value="{{ env('STRIPE_KEY') }}">
                    <input type="hidden" name="amount" value="{{$package->price}}">
                    <input type="hidden" name="profile_user_id" value="{{$package->profile_user_id}}">
                    <div class="form-group">
                        <label for="username">Full name (on the card)</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" onchange="cardValidate()" onkeyup="cardValidate()" name="username"  id="username" placeholder="" required="">
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group.// -->

                    <div class="form-group">
                        <label for="cardNumber">Card number</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                            </div>
                            <input type="text" class="form-control" onchange="cardValidate()" onkeyup="cardValidate()" name="cardNumber" id="cardNumber" placeholder="" required>
                        </div> <!-- input-group.// -->
                    </div> <!-- form-group.// -->

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label><span class="hidden-xs">Expiration</span> </label>
                                <div class="form-inline">
                                    <select class="form-control" name="month" onchange="cardValidate()" id="month"  style="width:45%" required>
                                        <option value="">MM</option>
                                        <option value="01">01 - January</option>
                                        <option value="02">02 - February</option>
                                        <option value="03">03 - March</option>
                                        <option value="04">04 - April</option>
                                        <option value="05">05 - May</option>
                                        <option value="06">06 - June</option>
                                        <option value="07">07 - July</option>
                                        <option value="08">08 - August</option>
                                        <option value="09">09 - Septembar</option>
                                        <option value="10">10 - October</option>
                                        <option value="11">11 - November</option>
                                        <option value="12">12 - December</option>
                                    </select>
                                    <span style="width:10%; text-align: center"> / </span>
                                    <select class="form-control" name="year" id="year" onchange="cardValidate()" style="width:45%" required>
                                        <option value="">YY</option>
                                        @for($i=date('Y'); $i < (date('Y')+8); $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
                                <input class="form-control" name="ccvnumber" onchange="cardValidate()" onkeyup="cardValidate()" id="ccvnumber" min="3" max="3" required="" type="text">
                            </div> <!-- form-group.// -->
                        </div>
                    </div> <!-- row.// -->

                    {{--<div class="payment-tab payment-tab-active">
                        <div class="payment-tab-trigger">
                            <input checked id="Test" name="cardType" type="radio" value="Test">
                            <label for="Test">Test</label>
--}}{{--                            <img class="payment-logo paypal" src="https://i.imgur.com/ApBxkXU.png" alt="">--}}{{--
                        </div>

                        <div class="payment-tab-content">
                            <p>You will be redirected to complete payment.</p>
                        </div>
                    </div>--}}


{{--                    <div class="payment-tab payment-tab-active">--}}
{{--                        <div class="payment-tab-trigger">--}}
{{--                            <input checked id="paypal" name="cardType" type="radio" value="paypal">--}}
{{--                            <label for="paypal">PayPal</label>--}}
{{--                            <img class="payment-logo paypal" src="https://i.imgur.com/ApBxkXU.png" alt="">--}}
{{--                        </div>--}}

{{--                        <div class="payment-tab-content">--}}
{{--                            <p>You will be redirected to PayPal to complete payment.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="payment-tab">--}}
{{--                        <div class="payment-tab-trigger">--}}
{{--                            <input type="radio" name="cardType" id="creditCart" value="creditCard">--}}
{{--                            <label for="creditCart">Credit / Debit Card</label>--}}
{{--                            <img class="payment-logo" src="https://i.imgur.com/IHEKLgm.png" alt="">--}}
{{--                        </div>--}}

{{--                        <div class="payment-tab-content">--}}
{{--                            <div class="row">--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <div class="card-label">--}}
{{--                                        <label for="nameOnCard">Name on Card</label>--}}
{{--                                        <input id="nameOnCard" name="nameOnCard"  type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <div class="card-label">--}}
{{--                                        <label for="cardNumber">Card Number</label>--}}
{{--                                        <input id="cardNumber" name="cardNumber" placeholder="1234  5678  9876  5432"  type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-4">--}}
{{--                                    <div class="card-label">--}}
{{--                                        <label for="expirynDate">Expiry Month</label>--}}
{{--                                        <input id="expiryDate" placeholder="MM"  type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-4">--}}
{{--                                    <div class="card-label">--}}
{{--                                        <label for="expiryDate">Expiry Year</label>--}}
{{--                                        <input id="expirynDate" placeholder="YY"  type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-4">--}}
{{--                                    <div class="card-label">--}}
{{--                                        <label for="cvv">CVV</label>--}}
{{--                                        <input id="cvv"  type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
                <!-- Payment Methods Accordion / End -->
            @else
                <p class="alert alert-danger">Whoops! Looks like the trainers payment method is not specified! Sorry for the hazard.</p>
            @endif

                <button type="submit" class="button booking-confirmation-btn margin-top-40 margin-bottom-65 paypal-disabled">Confirm and Pay</button>

            </div>

            <!-- Sidebar
            ================================================== -->
            <div class="col-lg-4 col-md-4 margin-top-0 margin-bottom-60">
                <input style="display: none" type="text" name="package_id" value="{{$package->id}}">
                <!-- Booking Summary -->
                <div class="listing-item-container compact order-summary-widget" style="height: auto">
                    <div class="listing-item">
                        <?php

                        $images = App\Gallery::where('profile_user_id', $profile->user_id)->first();
                        if($images)
                            $image = 'images/ProfileGallery/'.$images->name;
                        else
                            $image = 'images/listing-item-01.jpg';
                        ?>
                        <img src="{{asset($image)}}" alt="">

                        <div class="listing-item-content">
                            <div class="numerical-rating" data-rating="5.0"></div>
                            <h3>{{$profile->title}}</h3>
                            <span>{{$profile->address}}</span>
                        </div>
                    </div>
                </div>
                <div class="boxed-widget opening-hours summary margin-top-0">
                    <h3><i class="fa fa-calendar-check-o"></i> Booking Summary</h3>
                    <ul>
                        <li>Date <span>{{date("Y/m/d")}}</span></li>
                        <li>Package <span>{{$package->name}}</span></li>
                        <li>Description <span>{{$package->description}}</span></li>
                        <li class="total-costs">Total Cost <span>{{$package->price}}</span></li>
                    </ul>

                </div>
                <!-- Booking Summary / End -->

            </div>

        </div>
    </div>
    <!-- Container / End -->

    </form>

@stop


@section('script')


    <!-- Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>
    <script type="text/javascript" src="{{asset('scripts/infobox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/markerclusterer.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/maps.js')}}"></script>

{{--    <script type="text/javascript">--}}
{{--        var x = document.getElementById("footer");--}}
{{--        x.remove(x.selectedIndex);--}}
{{--    </script>--}}
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        function checkValidation(){
            var form = $('#checkOutForm');

            var fname = form.find('input[name="fname"]').val();
            var lname = form.find('input[name="lname"]').val();
            var email = form.find('input[name="email"]').val();
            var phone = form.find('input[name="phone"]').val();

            if($.trim(fname).length > 0 && $.trim(phone).length > 0 &&
                $.trim(lname).length > 0 && $.trim(email).length > 0){
                $('#paypalLinks').removeClass('paypal-disabled');
                return true;
            } else {
                $('#paypalLinks').addClass('paypal-disabled');
                return false;
            }
        }

        function cardValidate(){
            var form = $('#checkOutForm');

            var username = form.find('input[name="username"]').val();
            var cardNumber = form.find('input[name="cardNumber"]').val();
            var month = $('#month').val();
            var year = $('#year').val();
            var ccvnumber = form.find('input[name="ccvnumber"]').val();

            if($.trim(username).length > 0 && $.trim(cardNumber).length > 0 &&
                $.trim(month).length > 0 && $.trim(year).length > 0 && $.trim(ccvnumber).length > 0){
                $('.booking-confirmation-btn').removeClass('paypal-disabled');
                return true;
            } else {
                $('.booking-confirmation-btn').addClass('paypal-disabled');
                return false;
            }
        }

        // Set up an event listener for the form.
        $(".booking-confirmation-btn").click(function(e) {
            // Stop the browser from submitting the form.
            e.preventDefault();

            var cardvalues = {
                number : $("#cardNumber").val(),
                exp_month : $("#month").val(),
                exp_year : $("#year").val(),
                cvc : $("#ccvnumber").val()
            };

            Stripe.setPublishableKey($('#stripe-publishable-key').val());
            Stripe.createToken(cardvalues, stripeResponseHandler);
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                alert(response.error.message);
                console.log(response.error.message);
            } else {
                // token contains id, last4, and card type
                var token = response['id'];
                // insert the token into the form so it gets submitted to the server
                // $form.find('input[type=text]').empty();
                $('#checkOutForm').append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $('#checkOutForm').submit();
            }
        }

        /*paypal.Buttons({
            createOrder: function(data, actions) {
                if(checkValidation()){
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: "{{$package->price}}"
                            }
                        }]
                    });
                }
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    console.log(details);
                    $('#paypal_details').val(JSON.stringify(details));
                    setTimeout(function(){
                        $('#checkOutForm')[0].submit();
                    }, 1000);
                });
            }
        }).render('#paypalLinks');*/
    </script>
@stop
