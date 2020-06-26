@extends('layouts.dashboard')

@section('head')
    <title>Pumping Hearts | {{Auth::User()->name}}</title>
@stop


@section('body')

    <!-- Content
	================================================== -->
    <div class="dashboard-content">

        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Packages</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Add Packages</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div id="add-listing">


                    <!-- Section -->
                    <div class="add-listing-section margin-top-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-book-open"></i> Pricing</h3>
                            <!-- Switcher -->
                            <label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
                        </div>

                        <!-- Switcher ON-OFF Content -->
                        <div class="switcher-content">

                            <div class="row">
                                <div class="col-md-12">
                                    <table id="pricing-list-container">
                                        <tr class="pricing-list-item pattern">
                                            <td>
                                                <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                                <div class="fm-input pricing-name"><input type="text" placeholder="Title" /></div>
                                                <div class="fm-input pricing-ingredients"><input type="text" placeholder="Description" /></div>
                                                <div class="fm-input pricing-price"><input type="text" placeholder="Price" data-unit="USD" /></div>
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


                    <a href="#" class="button preview">Save <i class="fa fa-arrow-circle-right"></i></a>

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
