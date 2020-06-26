@extends('layouts.dashboard')

@section('head')
    <title>Pumping Hearts | {{Auth::User()->name}}</title>


@stop


@section('body')

    <script>
        document.getElementById("profile-menu").classList.add('active');
    </script>
    <!-- Content
	================================================== -->
    <div class="dashboard-content" id="app">

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
        <div class="row">
            <div class="col-md-12">
                @if( Session::has('profile_updated'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                        {{ Session::get('profile_updated') }}
                    </p>
                @endif
                @if( Session::has('success_payment'))
                    <p class="alert alert-success">
                        {{ Session::get('success_payment') }}
                    </p>
                @endif
            </div>
        </div>

        <form action="{{route('ProfileUpdate')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div id="add-listing">
                        <!-- Section -->
                        <div class="add-listing-section">
                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-doc"></i> Basic Information</h3>
                            </div>

                            <!-- Title -->
                            <div class="row with-forms">
                                <div class="col-md-12">
                                    <h5> Name <i class="tip" data-tip-content="Name of your business"></i></h5>
                                    <input name="title" class="search-field" type="text" value="{{$profile->title}}"/>
                                </div>
                                <div class="col-md-12">
                                    <h5>Gender</h5>
                                    <select class="chosen-select-no-single" name="gender" >
                                        <option value="NULL" {{$profile->gender == '' ? 'selected="selected"' : ''}}>Select an option</option>
                                        <option value="Male" {{$profile->gender == 'Male' ? 'selected="selected"' : ''}}>Male</option>
                                        <option value="Female" {{$profile->gender == 'Female' ? 'selected="selected"' : ''}}>Female</option>

                                    </select>

                                </div>
                            </div>
                        <!-- Row -->
                            <div class="row with-forms">

                                <!-- Status -->
                                <div class="col-md-12">
                                    <h5>Category (What do you specialize in?) <i class="tip" data-tip-content="Maximum of 3 Categories based on your expertise"></i></h5>
                                    <div class="checkboxes margin-bottom-20">
                                        <div class="row">
                                            <div class="col-md-4">
                                                @foreach($categories1 as $category)
                                                    <?php
                                                    $cond = false;
                                                    foreach ($profile_cat as $cat)
                                                        if ($cat == $category->id)
                                                            $cond = true;
                                                    ?>
                                                    @if($cond)
                                                        <input class="single-checkbox" value="{{$category->id}}"
                                                               id="{{$category->id}}" type="checkbox" checked
                                                               name="tn_cat[]">
                                                        <label for="{{$category->id}}">{{$category->category_name}}</label>
                                                        <br>
                                                    @else
                                                        <input class="single-checkbox" value="{{$category->id}}"
                                                               id="{{$category->id}}" type="checkbox" name="tn_cat[]">
                                                        <label for="{{$category->id}}">{{$category->category_name}}</label>
                                                        <br>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-md-4">
                                                @foreach($categories2 as $category)
                                                    <?php
                                                    $cond = false;
                                                    foreach ($profile_cat as $cat)
                                                        if ($cat == $category->id)
                                                            $cond = true;
                                                    ?>
                                                    @if($cond)
                                                        <input class="single-checkbox" value="{{$category->id}}"
                                                               id="{{$category->id}}" type="checkbox" checked
                                                               name="tn_cat[]">
                                                        <label for="{{$category->id}}">{{$category->category_name}}</label>
                                                        <br>
                                                    @else
                                                        <input class="single-checkbox" value="{{$category->id}}"
                                                               id="{{$category->id}}" type="checkbox" name="tn_cat[]">
                                                        <label for="{{$category->id}}">{{$category->category_name}}</label>
                                                        <br>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-md-4">
                                                @foreach($categories3 as $category)
                                                    <?php
                                                    $cond = false;
                                                    foreach ($profile_cat as $cat)
                                                        if ($cat == $category->id)
                                                            $cond = true;
                                                    ?>
                                                    @if($cond)
                                                        <input class="single-checkbox" value="{{$category->id}}"
                                                               id="{{$category->id}}" type="checkbox" checked
                                                               name="tn_cat[]">
                                                        <label for="{{$category->id}}">{{$category->category_name}}</label>
                                                        <br>
                                                    @else
                                                        <input class="single-checkbox" value="{{$category->id}}"
                                                               id="{{$category->id}}" type="checkbox" name="tn_cat[]">
                                                        <label for="{{$category->id}}">{{$category->category_name}}</label>
                                                        <br>
                                                    @endif
                                                @endforeach
                                            </div>

                                        </div>

                                    </div>
                                    <!-- Checkboxes / End -->
                                </div>

{{--                                <!-- Type -->--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <h5>Keywords <i class="tip" data-tip-content="Maximum of 15 keywords related with your business"></i></h5>--}}
{{--                                    <input name="keywords" type="text" value="{{$profile->keywords}} " placeholder="Keywords should be separated by commas">--}}
{{--                                </div>--}}

                            </div>
                            <!-- Row / End -->

                        </div>
                        <!-- Section / End -->

                        <!-- Section -->
                        <div class="add-listing-section margin-top-45">
                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-docs"></i>Payment Method</h3>
                            </div>
                            <!-- Description -->
                            @if($profile->stripe_user_id)
                                <p class="alert alert-success">Payment method specified. Connected with <strong>stripe</strong>.</p>
                            @else
                                <a target="_blank" href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id={{ env('STRIPE_CLIENT_ID') }}&scope=read_write" class="btn btn-lg btn-success" style="margin: 0 auto;" >Connect with Stripe</a>
                            @endif
                        </div>
                        <!-- Section / End -->

                        <!-- Section -->
                        <div class="add-listing-section margin-top-45">

                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-location"></i> Location</h3>
                            </div>

                            <div class="submit-section">

                                <!-- Row -->
                                <div class="row with-forms">
                                    <div class="row" id="__my-profile">
                                        <div class="col-md-12">
                                            <div v-if="success" class="alert alert-success" role="alert" v-text="success"></div>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div id="location_update">
                                                        <div class="form-group">
                                                            <label class="control-label">My Location</label>
                                                            <input type="text" id="autocomplete" v-model="user.location" class="form-control" placeholder="Enter Location" required>
                                                            <p class="text-danger" v-if="errors.location" v-text="errors.location[0]"></p>
                                                        </div>
                                                        <div id="map_view" style="width: 100%; height: 400px;"></div>
                                                        <br>
                                                        <button type="button" @click="updateForm" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- City -->
                                    <div class="col-md-6">
                                        <h5>City</h5>
                                        <select class="chosen-select-no-single" name="city_id">
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}" {{ $profile->city == $city->id ? 'selected="selected"' : '' }}>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-6">
                                        <h5>Address</h5>
                                        <input type="text" value="{{$profile->address}}"
                                               placeholder="e.g. 964 School Street" name="address">
                                    </div>

                                    <!-- City -->
                                    <div class="col-md-6">
                                        <h5>State</h5>
                                        <input type="text" value="{{$profile->state}}" name="state">
                                    </div>

                                    <!-- Zip-Code -->
                                    <div class="col-md-6">
                                        <h5>Zip-Code</h5>
                                        <input type="text" value="{{$profile->zip}}" name="zip">
                                    </div>

                                    <!-- Location -->
                                    <div class="col-md-12">
                                        <h5>Training Area</h5>
                                        <select class="chosen-select-no-single" name="location_preference">
                                            <option value="NULL" {{$profile->location_preference == '' ? 'selected="selected"' : ''}}>
                                                Select an option
                                            </option>
                                            <option value="MyLocation" {{$profile->location_preference == 'MyLocation' ? 'selected="selected"' : ''}}>
                                                I will go to the clients destination
                                            </option>
                                            <option value="trainer" {{$profile->location_preference == 'trainer' ? 'selected="selected"' : ''}}>
                                                I will have a facility to train clients at
                                            </option>

                                        </select>
                                    </div>

                                    <!-- Radium -->
                                    <div id="radius" class="col-md-12">
                                        <h5>Distance Preference</h5>
                                        <select class="chosen-select-no-single" name="distance_preference">
                                            <option value="NULL" {{$profile->distance_preference == '' ? 'selected="selected"' : ''}}>
                                                Select an option
                                            </option>
                                            <option value="5" {{$profile->distance_preference == '5' ? 'selected="selected"' : ''}}>
                                                Up to 5 miles
                                            </option>
                                            <option value="10" {{$profile->distance_preference == '10' ? 'selected="selected"' : ''}}>
                                                Up to 10 miles
                                            </option>
                                            <option value="15" {{$profile->distance_preference == '15' ? 'selected="selected"' : ''}}>
                                                Up to 15 miles
                                            </option>
                                            <option value="20" {{$profile->distance_preference == '20' ? 'selected="selected"' : ''}}>
                                                Up to 20+ miles
                                            </option>

                                        </select>
                                    </div>

                                </div>
                                <!-- Row / End -->

                            </div>
                        </div>
                        <!-- Section / End -->

                        <!-- Section -->
                        <div class="add-listing-section margin-top-45" style="padding-bottom: 0px">

                            <!-- Headline -->
                            <div class="add-listing-headline" style="margin-bottom: 0px;">
                                <h3><i class="sl sl-icon-credit-card"></i> Membership Required? <span style="font-size: 14px">(Will your trainees require a membership(Gym, Center etc.) to train with you?)</span></h3>
                                <!-- Switcher -->
                                @if($profile->membership)
                                    <label class="switch"><input type="checkbox" name="membership" checked><span
                                            class="slider round"></span></label>
                                @else
                                    <label class="switch"><input type="checkbox" name="membership"><span
                                            class="slider round"></span></label>
                                @endif
                            </div>

                        </div>
                        <!-- Section / End --> <!-- Section -->


                        <!-- Section -->
                        <div class="add-listing-section margin-top-45">

                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-docs"></i>Details</h3>
                            </div>

                            <!-- Description -->
                            <div class="form">
                                <h5>Tell them about yourself!</h5>
                                <textarea name="description" class="WYSIWYG" name="summary" cols="40" rows="3"
                                          id="summary" spellcheck="true">{{$profile->description}}</textarea>
                            </div>

                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <h5>Phone <span>(optional)</span></h5>
                                    <input type="text" name="phone" value="{{$profile->phone}}">
                                </div>

                            </div>
                            <!-- Row / End -->


                        </div>
                        <!-- Section / End -->

                        <!-- Section -->
                        <div class="add-listing-section margin-top-45" style="padding-bottom: 0px">

                            <!-- Headline -->
                            <div class="add-listing-headline" style="margin-bottom: 0px;">
                                <h3><i class="sl sl-icon-book-open"></i> CPR Certified?</h3>
                                <!-- Switcher -->
                                @if($profile->cpr)
                                    <label class="switch"><input type="checkbox" name="cpr" checked><span
                                                class="slider round"></span></label>
                                @else
                                    <label class="switch"><input type="checkbox" name="cpr"><span
                                                class="slider round"></span></label>
                                @endif
                            </div>

                        </div>
                        <!-- Section / End --> <!-- Section -->

                        <!-- Section -->
                        <div class="add-listing-section margin-top-45">

                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-book-open"></i> Additional Certification</h3>
                            </div>

                            <div class="submit-section">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="pricing-list-container">

                                            @if(count($cprs)>=1)
                                                @foreach($cprs as $cpr)
                                                    <tr class="pricing-list-item pattern1">
                                                        <td>
                                                            <div class="fm-move"><i class="sl sl-icon-cursor-move"></i>
                                                            </div>
                                                            <div class="fm-input pricing-name"><input type="text"
                                                                                                      name="cpr_title[]"
                                                                                                      placeholder="Title"
                                                                                                      value="{{$cpr->name}}"/>
                                                            </div>
                                                            <div class="fm-input pricing-ingredients"><input type="text"
                                                                                                             name="cpr_description[]"
                                                                                                             placeholder="Description"
                                                                                                             value="{{$cpr->description}}"/>
                                                            </div>
                                                            <div class="fm-close"><a class="delete" href="#"><i
                                                                        class="fa fa-remove"></i></a></div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="pricing-list-item pattern1">
                                                    <td>
                                                        <div class="fm-move"><i class="sl sl-icon-cursor-move"></i>
                                                        </div>
                                                        <div class="fm-input pricing-name"><input type="text"
                                                                                                  name="cpr_title[]"
                                                                                                  placeholder="Title"
                                                                                                  value=""/></div>
                                                        <div class="fm-input pricing-ingredients"><input type="text"
                                                                                                         name="cpr_description[]"
                                                                                                         placeholder="Description"
                                                                                                         value=""/>
                                                        </div>
                                                        <div class="fm-close"><a class="delete" href="#"><i
                                                                    class="fa fa-remove"></i></a></div>
                                                    </td>
                                                </tr>
                                            @endif


                                        </table>
                                        <a href="#" class="button cpr-pricing-list-item">Add Item</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Section / End -->


                    </div>
                </div>

            </div>

            <div class="row">

                <!-- Profile -->
                <div class="col-lg-12 col-md-12">
                    <div class="dashboard-list-box ">
                        <h4 class="gray">Profile Details</h4>
                        <div class="dashboard-list-box-static">
                        <?php $img = "images/Avatars/" . $profile->picture?>
                        <!-- Avatar -->
                            <div class="edit-profile-photo">
                                <div>
                                    <div>
                                        <a href="#" style="max-width: 100px;
                                        max-height: 100px;
    overflow: hidden;
    border-radius: 50%;
    position: absolute;
    /* right: 0; */
    top: -8px;
    image-rendering: -webkit-optimize-contrast;
"><img src="{{asset($img)}}" alt=""></a>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input type="file" name="avatar"/>
                                    </div>
                                </div>
                            </div>

                            <a href="{{route('DashboardGallery', ['id' => Auth::id()])}}">Add additional images</a>

                            <!-- Details -->
                            <div class="my-profile">

{{--                                <label>Your Name</label>--}}
{{--                                <input name="name" value="{{Auth::User()->name}}" type="text">--}}
                                <label>Keywords <i class="tip" data-tip-content="Maximum of 15 keywords related with your business"></i></label>
                                <input name="keywords" type="text" value="{{$profile->keywords}} " placeholder="Keywords should be separated by commas">


                                <label>Please state your terms of service <i class="tip" data-tip-content="Terms: expiration date, cancellation policy, etc"></i></label>
                                <textarea name="tos" class="WYSIWYG" name="summary" cols="40" rows="3"
                                          id="summary" spellcheck="true">{{$profile->tos}}</textarea>

                                <label><i class="fa fa-twitter"></i> Twitter</label>
                                <input name="twitter" placeholder="https://www.twitter.com/" type="text"
                                       value="{{$profile->twitter}}">

                                <label><i class="fa fa-facebook-square"></i> Facebook</label>
                                <input name="facebook" placeholder="https://www.facebook.com/" type="text"
                                       value="{{$profile->facebook}}">

                                <label><i class="fa fa-instagram"></i> Instagram</label>
                                <input name="instagram" placeholder="https://www.instagram.com/" type="text"
                                       value="{{$profile->instagram}}">
                            </div>

                            <button type="submit" class="button margin-top-15">Save Changes</button>

                        </div>
                    </div>
                </div>




                <!-- Copyrights -->
                <div class="col-md-12">
                    <div class="copyrights">© 2019 Pumping Hearts. All Rights Reserved.</div>
                </div>

            </div>

        </form>

    </div>
    <!-- Content / End -->


@stop


@section('script')

    <script type="text/javascript">
        var limit = 3;
        $('input.single-checkbox').on('change', function (evt) {
            if ($("input[name='tn_cat\[\]']:checked").length > limit) {
                this.checked = false;
            }
        });

        new Vue({
            el: '#__my-profile',
            data: {
                auth: window.auth,
                map: null,
                userId: null,
                user: {
                    name: "",
                    location: "",
                    lat: "",
                    long: ""
                },
                errors: [],
                success: '',
                autocomplete: null
            },
            methods: {
                generateAutoComplete: function () {
                    let _this = this;
                    this.autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'), {types: ['geocode']});
                    this.autocomplete.addListener('place_changed', function () {
                        let place = _this.autocomplete.getPlace();
                        _this.user.location = place.formatted_address;
                        _this.user.lat = place.geometry.location.lat();
                        _this.user.long = place.geometry.location.lng();
                    })
                },
                updateForm() {
                    var app = this;
                    var user = app.user;
                    user['_token'] = "{{ csrf_token() }}";
                    $.ajax({
                        type: 'POST',
                        url: base_url + '/userLocationUpdate',
                        data: user,
                        success: function (response) {
                            app.user = response;
                            app.success = 'Your location updated successfully.';
                            setTimeout(function () {
                                $('.alert').hide();
                            }, 3000);
                            app.getUserData();
                        }
                    });
                },
                getUserData: function () {
                    let app = this;
                    $.ajax({
                        type: 'GET',
                        url: base_url + '/user/' + this.auth.id + '/dashboard/profile-details',
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
                                    title: app.auth.name
                                });
                                google.maps.event.addListener(marker, 'click', function () {
                                    infowindow.open(app.map, marker);
                                });
                                google.maps.event.trigger(marker, 'click');
                            } else {
                                app.map = new google.maps.Map(document.getElementById('map_view'), {
                                    center: {lat: 36.778259, lng: -119.417931},
                                    radius: 500,
                                    zoom: 10
                                });
                            }
                        }
                    });
                }
            },
            mounted() {
                this.generateAutoComplete();
                let app = this;
                app.getUserData();
            }
        });
    </script>

@stop

