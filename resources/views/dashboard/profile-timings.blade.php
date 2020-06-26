@extends('layouts.dashboard')

@section('head')
    <title>Pumping Hearts | {{Auth::User()->name}}</title>
    <link rel="stylesheet" href="{{asset('css/clockpicker.css')}}">
@stop


@section('body')

    <script>
        document.getElementById("profile-menu").classList.add('active');
    </script>
    <!-- Content
	================================================== -->
    <div class="dashboard-content">

        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>My Profile</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="{{route('ProfileUpdate', ['id' => Auth::id()])}}">Dashboard</a></li>
                            <li>My Profile</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <form method="post" action="{{route('TimingsUpdate')}}">
            @csrf
                    <div class="add-listing-section margin-top-45 margin-bottom-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-clock"></i> Availability Hours</h3>
{{--                            <!-- Switcher -->--}}
{{--                            <label class="switch"><input type="checkbox" name="timings_check" checked><span class="slider round"></span></label>--}}
                        </div>

                        <!-- Switcher ON-OFF Content -->



                            <div>

                            <div class="row">
                                <div class="col-md-2">
                                    <h4>Day</h4>
                                </div>
                                <div class="col-md-5" >
                                    <h4>Opening Times</h4>
                                </div>
                                <div class="col-md-5">
                                    <h4>Closing Times</h4>
                                </div>
                            </div>
                            <hr>
                            <!-- Day -->


                            <div class="row opening-day js-demo-hours">
                                <div class="col-md-2"><h5>Monday</h5></div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="monday_opening" type="text" class="form-control" value="{{$timings->monday_opening}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="monday_closing" type="text" class="form-control" value="{{$timings->monday_closing}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Day / End -->

                            <!-- Day -->
                            <div class="row opening-day js-demo-hours">
                                <div class="col-md-2"><h5>Tuesday</h5></div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="tuesday_opening" type="text" class="form-control" value="{{$timings->tuesday_opening}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="tuesday_closing" type="text" class="form-control" value="{{$timings->tuesday_closing}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Day / End -->

                            <!-- Day -->
                            <div class="row opening-day js-demo-hours">
                                <div class="col-md-2"><h5>Wednesday</h5></div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="wednesday_opening" type="text" class="form-control" value="{{$timings->wednesday_opening}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="wednesday_closing" type="text" class="form-control" value="{{$timings->wednesday_closing}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>

                                </div>
                            </div>
                            <!-- Day / End -->

                            <!-- Day -->
                            <div class="row opening-day js-demo-hours">
                                <div class="col-md-2"><h5>Thursday</h5></div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="thursday_opening" type="text" class="form-control" value="{{$timings->thursday_opening}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="thursday_closing" type="text" class="form-control" value="{{$timings->thursday_closing}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>

                                </div>
                            </div>
                            <!-- Day / End -->

                            <!-- Day -->
                            <div class="row opening-day js-demo-hours">
                                <div class="col-md-2"><h5>Friday</h5></div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="friday_opening" type="text" class="form-control" value="{{$timings->friday_opening}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="friday_closing" type="text" class="form-control" value="{{$timings->friday_closing}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>

                                </div>
                            </div>
                            <!-- Day / End -->

                            <!-- Day -->
                            <div class="row opening-day js-demo-hours">
                                <div class="col-md-2"><h5>Saturday</h5></div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="saturday_opening" type="text" class="form-control" value="{{$timings->saturday_opening}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="saturday_closing" type="text" class="form-control" value="{{$timings->saturday_closing}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>

                                </div>
                            </div>
                            <!-- Day / End -->

                            <!-- Day -->
                            <div class="row opening-day js-demo-hours">
                                <div class="col-md-2"><h5>Sunday</h5></div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="sunday_opening" type="text" class="form-control" value="{{$timings->sunday_opening}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <div class="input-group clockpicker">
                                        <input name="sunday_closing" type="text" class="form-control" value="{{$timings->sunday_closing}}">
                                        <span class="input-group-addon">
        <span><i class="sl sl-icon-clock"></i></span>
    </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Day / End -->


                        </div>
                        <!-- Switcher ON-OFF Content / End -->

                        <button type="submit" class="button margin-top-15 margin-bottom-15">Save Changes</button>
                    </div>
                    <!-- Section / End -->

        </form>



                </div>
            </div>

        </div>


    </div>
    <!-- Content / End -->


@stop


@section('script')


{{--    <!-- Opening hours added via JS (this is only for demo purpose) -->--}}
{{--    <script>--}}
{{--        $(".opening-day.js-demo-hours .chosen-select").each(function() {--}}
{{--            $(this).append(''+--}}
{{--                '<option></option>'+--}}
{{--                '<option>Closed</option>'+--}}
{{--                '<option>1 AM</option>'+--}}
{{--                '<option>2 AM</option>'+--}}
{{--                '<option>3 AM</option>'+--}}
{{--                '<option>4 AM</option>'+--}}
{{--                '<option>5 AM</option>'+--}}
{{--                '<option>6 AM</option>'+--}}
{{--                '<option>7 AM</option>'+--}}
{{--                '<option>8 AM</option>'+--}}
{{--                '<option>9 AM</option>'+--}}
{{--                '<option>10 AM</option>'+--}}
{{--                '<option>11 AM</option>'+--}}
{{--                '<option>12 AM</option>'+--}}
{{--                '<option>1 PM</option>'+--}}
{{--                '<option>2 PM</option>'+--}}
{{--                '<option>3 PM</option>'+--}}
{{--                '<option>4 PM</option>'+--}}
{{--                '<option>5 PM</option>'+--}}
{{--                '<option>6 PM</option>'+--}}
{{--                '<option>7 PM</option>'+--}}
{{--                '<option>8 PM</option>'+--}}
{{--                '<option>9 PM</option>'+--}}
{{--                '<option>10 PM</option>'+--}}
{{--                '<option>11 PM</option>'+--}}
{{--                '<option>12 PM</option>');--}}
{{--        });--}}
{{--    </script>--}}

    <!-- DropZone | Documentation: http://dropzonejs.com -->
    <script type="text/javascript" src="{{asset('scripts/dropzone.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/clockpicker.js')}}"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker({
        placement: 'top',
        align: 'left',
        donetext: 'Done'
    });
</script>
@stop

