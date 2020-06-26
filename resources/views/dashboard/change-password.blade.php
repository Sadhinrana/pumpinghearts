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
                    <h2>Change Password</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Change Password</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <!-- Change Password -->
                <div class="col-lg-12 col-md-12">
                    <div class="dashboard-list-box ">
                        <h4 class="gray">Change Password</h4>
                        <div class="dashboard-list-box-static">

                            <!-- Change Password -->
                            <div class="my-profile">
                                <label class="margin-top-0">Current Password</label>
                                <input type="password">

                                <label>New Password</label>
                                <input type="password">

                                <label>Confirm New Password</label>
                                <input type="password">

                                <button class="button margin-top-15">Change Password</button>
                            </div>

                        </div>
                    </div>
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
