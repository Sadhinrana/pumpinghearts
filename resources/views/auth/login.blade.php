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
                                                    <input id="check-a" type="checkbox" name="check">
                                                    <label for="check-a">Elevator in building</label>

                                                    <input id="check-b" type="checkbox" name="check">
                                                    <label for="check-b">Friendly workspace</label>

                                                    <input id="check-c" type="checkbox" name="check">
                                                    <label for="check-c">Instant Book</label>

                                                    <input id="check-d" type="checkbox" name="check">
                                                    <label for="check-d">Wireless Internet</label>
                                                </div>

                                                <div class="col-md-6">
                                                    <input id="check-e" type="checkbox" name="check" >
                                                    <label for="check-e">Free parking on premises</label>

                                                    <input id="check-f" type="checkbox" name="check" >
                                                    <label for="check-f">Free parking on street</label>

                                                    <input id="check-g" type="checkbox" name="check">
                                                    <label for="check-g">Smoking allowed</label>

                                                    <input id="check-h" type="checkbox" name="check">
                                                    <label for="check-h">Events</label>
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
                            <p class="showing-results">2 Results Found </p>
                        </div>

                    </div>


                    <!-- Listings -->
                    <div class="row fs-listings">
                        <!-- Listing Item -->
                        <div class="col-lg-12 col-md-12">
                            <div class="listing-item-container list-layout" data-marker-id="2">
                                <a href="listings-single-page.html" class="listing-item">

                                    <!-- Image -->
                                    <div class="listing-item-image">
                                        <img src="{{asset('images/listing-item-02.jpg')}}" alt="">
                                        <span class="tag">Fitness</span>
                                    </div>

                                    <!-- Content -->
                                    <div class="listing-item-content">

                                        <div class="listing-item-inner">
                                            <h3>Armon B</h3>
                                            <span>Long Beach</span>
                                            <div class="star-rating" data-rating="5.0">
                                                <div class="rating-counter">(117 reviews)</div>
                                            </div>
                                        </div>

                                        <span class="like-icon"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- Listing Item / End -->

                        <!-- Listing Item -->
                        <div class="col-lg-12 col-md-12">
                            <div class="listing-item-container list-layout" data-marker-id="3">
                                <a href="listings-single-page.html" class="listing-item">

                                    <!-- Image -->
                                    <div class="listing-item-image">
                                        <img src="{{asset('images/listing-item-03.jpg')}}" alt="">
                                        <span class="tag">Body Building</span>
                                    </div>

                                    <!-- Content -->
                                    <div class="listing-item-content">

                                        <div class="listing-item-inner">
                                            <h3>Tawny M.</h3>
                                            <span>Lakewood, CA</span>
                                            <div class="star-rating" data-rating="4.8">
                                                <div class="rating-counter">(32 reviews)</div>
                                            </div>
                                        </div>

                                        <span class="like-icon"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- Listing Item / End -->
                    </div>
                    <!-- Listings Container / End -->


                    <!-- Pagination Container -->
                    <div class="row fs-listings">
                        <div class="col-md-12">

                            <!-- Pagination -->
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Pagination -->
                                    <div class="pagination-container margin-top-15 margin-bottom-40">
                                        <nav class="pagination">
                                            <ul>
                                                <li><a href="#" class="current-page">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <!-- Pagination / End -->

                            <!-- Copyrights -->
                            <div class="copyrights margin-top-0">© 2019 Pumping Hearts. All Rights Reserved.</div>

                        </div>
                    </div>
                    <!-- Pagination Container / End -->
                </section>

            </div>
        </div>
        <div class="fs-inner-container map-fixed">

            <!-- Map -->
            <div id="map-container">
                <div id="map" data-map-zoom="9" data-map-scroll="true">
                    <!-- map goes here -->
                </div>
            </div>

        </div>
    </div>


@stop


@section('script')


    <!-- Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>
    <script type="text/javascript" src="{{asset('scripts/infobox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/markerclusterer.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/maps.js')}}"></script>

    <script type="text/javascript">
        var x = document.getElementById("footer");
        x.remove(x.selectedIndex);

    </script>

@stop