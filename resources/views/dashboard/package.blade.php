@extends('layouts.dashboard')

@section('head')
    <title>Pumping Hearts | {{Auth::User()->name}}</title>
@stop


@section('body')

    <script>
        document.getElementById("packages-menu").classList.add('active');
    </script>
    <!-- Content
	================================================== -->
    <div class="dashboard-content">

        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Packages</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Packages</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">

            @if(Session::has('No'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('No') }}</p>
            @endif

            <div class="col-lg-12 col-md-12">
                <div class="dashboard-list-box margin-top-0">


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
                    <h4>Existing Package</h4>
                    <ul>

                    {{--                        One Booking--}}

                    @foreach($packages as $package)
                        <!-- Reply to review popup -->
                        @if( ($package->nulled == 0) || ($package->fresh == 1) )
                                <li>
                                    <div class="list-box-listing bookings">
                                        <div class="list-box-listing-content">
                                            <div class="inner">


                                                <div class="inner-booking-list">
                                                    <h5>Client:</h5>
                                                    <ul class="booking-list">
                                                        <li>{{$package->name}}</li>
                                                        <li>{{$package->description}}</li>
                                                    </ul>
                                                </div>


                                                <div class="inner-booking-list">
                                                    <h5>Price:</h5>
                                                    <ul class="booking-list">
                                                        <li class="highlighted">{{$package->price}}</li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="buttons-to-right">
                                        @if($package->display)
                                            <form id="formd-{{$package->id}}" method="post" action="{{route('HidePackage')}}">
                                                @csrf

                                                <input type="hidden" value="{{$package->id}}" name="package_id">
                                                <input type="hidden" value="hide" name="display_task">
                                                <a onclick="DisplayForm({{$package->id}})" style="background: dodgerblue; color: #ffffff;" href="#" class="button gray approve"><i class="sl sl-icon-check"></i> Hide</a>

                                            </form>
                                        @else
                                            <form id="formd-{{$package->id}}" method="post" action="{{route('HidePackage')}}">
                                                @csrf

                                                <input type="hidden" value="{{$package->id}}" name="package_id">
                                                <input type="hidden" value="public" name="display_task">
                                                <a onclick="DisplayForm({{$package->id}})" style="background: dodgerblue; color: #ffffff;" href="#" class="button gray approve"><i class="sl sl-icon-check"></i> Make Public</a>
                                            </form>
                                        @endif

                                        <form id="formdel-{{$package->id}}" method="post" action="{{route('DeletePackage')}}">
                                            @csrf

                                            <input type="hidden" value="{{$package->id}}" name="package_id">
                                            <input type="hidden" value="public" name="display_task">
                                            <a onclick="DelForm({{$package->id}})" style="color: #ffffff; background: #c3272d" href="#" class="button gray approve"><i class="sl sl-icon-check"></i> Delete</a>
                                        </form>
                                    </div>
                                </li>
                        @endif

                        @endforeach

                    </ul>
                </div>
            </div>




            <div class="col-lg-12">

                <form method="post" action="{{route('NewPackages')}}">
                    @csrf

                <div id="add-listing">

                    <!-- Section -->
                    <div class="add-listing-section margin-top-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-book-open"></i> Pricing</h3>
                            <!-- Switcher -->
                        </div>

                        <!-- Switcher ON-OFF Content -->
                        <div>

                            <div class="row">
                                <div class="col-md-12">
                                    <table id="pricing-list-container">


                                            <tr class="pricing-list-item pattern">
                                                <td>
                                                    <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                                    <div class="fm-input pricing-name"><input type="text" name="title[]" placeholder="Title" value=""/></div>
                                                    <div class="fm-input pricing-ingredients"><input type="text" name="description[]" placeholder="Description" value="" /></div>
                                                    <div class="fm-input pricing-price"><input type="text" name="price[]" placeholder="Price" data-unit="USD" value="" /></div>
                                                    <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
                                                </td>
                                            </tr>




                                    </table>
                                    <a href="#" class="button add-pricing-list-item">Add Item</a>
                                </div>
                            </div>

                        </div>
                        <!-- Switcher ON-OFF Content / End -->

                    </div>
                    <!-- Section / End -->

                    <button class="button preview" type="submit">
                        Save
                    </button>

                </div>

                </form>

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
    <script>


        function DisplayForm(id) {
            var form = "formd-"+id;
            document.getElementById(form).submit();
        }

        function DelForm(id) {
            var form = "formdel-"+id;
            document.getElementById(form).submit();
        }
    </script>



@stop
