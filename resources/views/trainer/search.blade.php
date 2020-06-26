@extends('layouts.main')

@section('head')

    <title>Pumping Hearts | Trainers</title>

@stop


@section('body')
    <script type="text/javascript">
        document.getElementById("body").classList.remove('transparent-header');
        document.getElementById("main-logo").src="{{asset('images/Logo-red-200px.png')}}";
        document.getElementById("header-container").classList.add('fixed');
        document.getElementById("header-container").classList.add('fullwidth');
        document.getElementById("header").classList.add('not-sticky');
    </script>

    <!-- Content
    ================================================== -->
    <div class="fs-container">

        <div id="work" class="fs-inner-container content">
            <div class="fs-content" >
                <!-- Search -->
                <section class="search">

                    <div class="row">
                        <div class="col-md-12">

                            <!-- Row With Forms -->
                            <div class="row with-forms">

                                <!-- Main Search Input -->
                                <div class="col-fs-6">
                                    <div class="input-with-icon">
                                        <i class="sl sl-icon-magnifier"></i>
                                        <input type="text" placeholder="What are you looking for?" value=""/>
                                    </div>
                                </div>

                                <!-- Main Search Input -->
                                <div class="col-fs-6">
                                    <div class="input-with-icon location">
                                        <div id="autocomplete-container">
                                            <input id="autocomplete-input" type="text" placeholder="Location">
                                        </div>
                                        <a href="#"><i class="fa fa-map-marker"></i></a>
                                    </div>
                                </div>


                                <!-- Filters -->
                                <div class="col-fs-12">

                                    <!-- Panel Dropdown / End -->
                                    <div class="panel-dropdown">
                                        <a href="#">Categories</a>
                                        <div class="panel-dropdown-content checkboxes categories">

                                            <!-- Checkboxes -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input id="check-1" type="checkbox" name="check" checked class="all">
                                                    <label for="check-1">All Categories</label>
                                                </div>

                                                <div class="col-md-6">

                                                    <input id="check-5" type="checkbox" name="check">
                                                    <label for="check-5">Fitness</label>

                                                </div>
                                            </div>

                                            <!-- Buttons -->
                                            <div class="panel-buttons">
                                                <button class="panel-cancel">Cancel</button>
                                                <button class="panel-apply">Apply</button>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Panel Dropdown / End -->

                                    <!-- Panel Dropdown -->
                                    <div class="panel-dropdown wide">
                                        <a href="#">More Filters</a>
                                        <div class="panel-dropdown-content checkboxes">

                                            <!-- Checkboxes -->
                                            <div class="row">
                                                <div class="col-md-6">

                                                </div>

                                                <div class="col-md-6">
                                                    <input id="check-e" type="checkbox" name="check" >
                                                    <label for="check-e">Free parking on premises</label>

{{--                                                    <input id="check-f" type="checkbox" name="check" >--}}
{{--                                                    <label for="check-f">Free parking on street</label>--}}

{{--                                                    <input id="check-g" type="checkbox" name="check">--}}
{{--                                                    <label for="check-g">Smoking allowed</label>--}}

{{--                                                    <input id="check-h" type="checkbox" name="check">--}}
{{--                                                    <label for="check-h">Events</label>--}}
                                                </div>
                                            </div>

                                            <!-- Buttons -->
                                            <div class="panel-buttons">
                                                <button class="panel-cancel">Cancel</button>
                                                <button class="panel-apply">Apply</button>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Panel Dropdown / End -->

                                    <!-- Panel Dropdown -->
                                    <div class="panel-dropdown">
                                        <a href="#">Distance Radius</a>
                                        <div class="panel-dropdown-content">
                                            <input class="distance-radius" type="range" min="1" max="100" step="1" value="50" data-title="Radius around selected destination">
                                            <div class="panel-buttons">
                                                <button class="panel-cancel">Disable</button>
                                                <button class="panel-apply">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Panel Dropdown / End -->

                                </div>
                                <!-- Filters / End -->

                            </div>
                            <!-- Row With Forms / End -->

                        </div>
                    </div>

                </section>
                <!-- Search / End -->


                <section class="listings-container margin-top-30">
                    <!-- Sorting / Layout Switcher -->
                    <div class="row fs-switcher">

                        <div class="col-md-6">
                            <!-- Showing Results -->
                            <p class="showing-results">{{count($specialty_filter)}} Results Found </p>
                        </div>

                    </div>


                    <!-- Listings -->
                    <div class="row fs-listings">
                        <!-- Listing Item -->
                        @foreach($specialty_filter as $profile)
                            <?php

                            $images = \App\Gallery::where('profile_user_id', $profile->user_id)->first();
                            if($images)
                                $image = 'images/ProfileGallery/'.$images->name;
                            else
                                $image = 'images/listing-item-01.jpg';
                            $city = \App\City::find($profile->city);
                            $user = \App\User::find($profile->user_id);
                            ?>
                        <div class="col-lg-12 col-md-12">
                            <div class="listing-item-container list-layout" data-marker-id="2">
                                <a href="{{route('PublicProfile', ['id' => $user->id, 'name' => $user->name])}}" class="listing-item">

                                    <!-- Image -->
                                    <div class="listing-item-image">
                                        <img src="{{asset($image)}}" alt="">
                                        <span class="tag">{{$city->name}}</span>
                                    </div>

                                    <!-- Content -->
                                    <div class="listing-item-content">

                                        <div class="listing-item-inner">
                                            <h3>{{$profile->title}}</h3>
                                            <span>{{$profile->address}}</span>
                                            <div class="star-rating" data-rating="5.0">
                                                <div class="rating-counter">(117 reviews)</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- Listing Item / End -->

                        @endforeach
                    </div>
                    <!-- Listings Container / End -->


{{--                    <!-- Pagination Container -->--}}
{{--                    <div class="row fs-listings">--}}
{{--                        <div class="col-md-12">--}}

{{--                            <!-- Pagination -->--}}
{{--                            <div class="clearfix"></div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <!-- Pagination -->--}}
{{--                                    <div class="pagination-container margin-top-15 margin-bottom-40">--}}
{{--                                        <nav class="pagination">--}}
{{--                                            <ul>--}}
{{--                                                <li><a href="#" class="current-page">1</a></li>--}}
{{--                                                <li><a href="#">2</a></li>--}}
{{--                                                <li><a href="#">3</a></li>--}}
{{--                                                <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </nav>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                            <!-- Pagination / End -->--}}

{{--                            <!-- Copyrights -->--}}
{{--                            <div class="copyrights margin-top-0">© 2019 Pumping Hearts. All Rights Reserved.</div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- Pagination Container / End -->
                </section>

            </div>
        </div>
        <div class="fs-inner-container map-fixed">

            <!-- Map -->
            <div id="map-container">
                <div id="map_view" style="width: 100%;height: 100%;"></div>
                {{--<div id="map" data-map-zoom="9" data-map-scroll="true">
                    <!-- map goes here -->
                </div>--}}
            </div>

        </div>
    </div>


@stop


@section('script')


    <!-- Maps -->
    {{--<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>--}}
    <script type="text/javascript" src="{{asset('scripts/infobox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/markerclusterer.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/maps.js')}}"></script>

    <script type="text/javascript">
        var x = document.getElementById("footer");
        x.remove(x.selectedIndex);

        new Vue({
            el: '#map-container',
            data: {
                auth: window.auth,
                map: null,
                user: [],
            },
            methods: {
                getUserData: function () {
                    let _this = this;
                    $.ajax({
                        type: 'GET',
                        url: window.location.href,
                        success: function(resp){
                            _this.user = resp;

                            _this.map = new google.maps.Map(document.getElementById('map_view'), {
                                center: {lat: 23.7439732, lng: 90.3705565},
                                zoom: 14
                            });

                            for (let index = 0 ; index < _this.user.length; ++index) {
                                let lat = parseFloat(_this.user[index].lat);
                                let long = parseFloat(_this.user[index].long);
                                let name = _this.user[index].title;
                                let image = _this.user[index].picture;

                                var infowindow = new google.maps.InfoWindow({
                                    content: name
                                });
                                var marker = new google.maps.Marker({
                                    position: {lat: lat, lng: long},
                                    map: _this.map,
                                    icon: image,
                                    title: name
                                });
                                google.maps.event.addListener(marker, 'click', function() {
                                    infowindow.open(_this.map,marker);
                                });
                                google.maps.event.trigger(marker,'click');
                                var cityCircle = new google.maps.Circle({
                                    strokeColor: '#1e1aff',
                                    strokeOpacity: 0.8,
                                    strokeWeight: 2,
                                    fillColor: '#fa88ff',
                                    fillOpacity: 0.35,
                                    map: _this.map,
                                    center: {lat: lat, lng: long},
                                    radius: 0.1 * 100
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

{{--http://127.0.0.1:8000/search/gender/Male/location/%5B%22trainer%22%5D/specialties/%5B%22Bodybuilding%20Preparations%22,%22Fat%20Loss%22,%22Elderly%22%5D/days/%5B%22Wednesday%22%5D/timings/%5B%22Morning%22,%22Afternoon%22%5D/zip/54770--}}
