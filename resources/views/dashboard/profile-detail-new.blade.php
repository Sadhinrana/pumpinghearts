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
                                    <h5> Title <i class="tip" data-tip-content="Name of your business"></i></h5>
                                    <input name="title" class="search-field" type="text" value="{{$profile->title}}"/>
                                </div>
                            </div>

                        {{--                                <select class="chosen-select-no-single" name="category_id" >--}}
                        {{--                                @foreach($categories as $category)--}}
                        {{--                                        <option value="{{ $category->id }}" {{ $profile->category == $category->id ? 'selected="selected"' : '' }}>{{ $category->category_name }}</option>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </select>--}}

                        <!-- Row -->
                            <div class="row with-forms">

                                <!-- Status -->
                                <div class="col-md-12">
                                    <h5>Category <i class="tip" data-tip-content="Maximum of 3 Categories based on your expertise"></i></h5>
                                    <div class="checkboxes in-row margin-bottom-20">
                                        @foreach($categories as $category)
                                            <?php
                                            $cond = false;
                                            $profile_cat = ['1', '2'];
                                            foreach ($profile_cat as $cat)
                                                if ($cat == $category->id)
                                                    $cond = true;
                                            ?>
                                            @if($cond)
                                                <input id="{{$category->id}}" type="checkbox" checked name="tn_check">
                                                <label for="{{$category->id}}">{{$category->category_name}}</label>
                                            @else
                                                <input id="{{$category->id}}" type="checkbox" name="tn_check">
                                                <label for="{{$category->id}}">{{$category->category_name}}</label>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- Checkboxes / End -->
                                </div>

                                <!-- Type -->
                                <div class="col-md-12">
                                    <h5>Keywords <i class="tip" data-tip-content="Maximum of 15 keywords related with your business"></i></h5>
                                    <input name="keywords" type="text" value="{{$profile->keywords}} " placeholder="Keywords should be separated by commas">
                                </div>

                            </div>
                            <!-- Row / End -->

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

                                    <!-- City -->
                                    <div class="col-md-6">
                                        <h5>City</h5>
                                        <select class="chosen-select-no-single" name="city_id" >
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}" {{ $profile->city == $city->id ? 'selected="selected"' : '' }}>{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-6">
                                        <h5>Address</h5>
                                        <input type="text" value="{{$profile->address}}" placeholder="e.g. 964 School Street" name="address">
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

                                    <!-- Zip-Code -->
                                    <div class="col-md-12">
                                        <h5>Training Area</h5>
                                        <input type="text" value="{{$profile->zip}}" name="zip">
                                    </div>

                                    <!-- Zip-Code -->
                                    <div id="radius" class="col-md-12">
                                        <h5>Distance Preference</h5>
                                        <input type="text" value="{{$profile->zip}}" name="zip">
                                    </div>

                                </div>
                                <!-- Row / End -->

                            </div>
                        </div>
                        <!-- Section / End -->


                        <!-- Section -->
                        <div class="add-listing-section margin-top-45">

                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-docs"></i>Details</h3>
                            </div>

                            <!-- Description -->
                            <div class="form">
                                <h5>Description</h5>
                                <textarea name="description" class="WYSIWYG" name="summary" cols="40" rows="3" id="summary" spellcheck="true">{{$profile->description}}</textarea>
                            </div>

                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <h5>Phone <span>(optional)</span></h5>
                                    <input type="text" name="phone" value="{{$profile->phone}}">
                                </div>

                                <!-- Website -->
                                <div class="col-md-6">
                                    <h5>Website <span>(optional)</span></h5>
                                    <input type="text" name="website" value="{{$profile->website}}">
                                </div>
                            </div>
                            <!-- Row / End -->


                        </div>
                        <!-- Section / End -->

                        {{--<a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a>--}}

                    </div>
                </div>

            </div>

            <div class="row">

                <!-- Profile -->
                <div class="col-lg-12 col-md-12">
                    <div class="dashboard-list-box ">
                        <h4 class="gray">Profile Details</h4>
                        <div class="dashboard-list-box-static">

                            <!-- Avatar -->
                            <div class="edit-profile-photo">
                                <div>
                                    <div>
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input type="file" name="avatar" />
                                    </div>
                                </div>
                            </div>

                            <!-- Details -->
                            <div class="my-profile">

                                <label>Your Name</label>
                                <input name="name" value="{{Auth::User()->name}}" type="text">

                                <label><i class="fa fa-twitter"></i> Twitter</label>
                                <input name="twitter" placeholder="https://www.twitter.com/" type="text" value="{{$profile->twitter}}">

                                <label><i class="fa fa-facebook-square"></i> Facebook</label>
                                <input name="facebook" placeholder="https://www.facebook.com/" type="text" value="{{$profile->facebook}}">

                                <label><i class="fa fa-instagram"></i> Instagram</label>
                                <input name="instagram" placeholder="https://www.instagram.com/" type="text" value="{{$profile->instagram}}">
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
@stop

