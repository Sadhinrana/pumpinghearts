@extends('layouts.dashboard')

@section('head')
    <title>Pumping Hearts | {{Auth::User()->name}}</title>


@stop


@section('body')

    <script>
        document.getElementById("wallet-menu").classList.add('active');
    </script>
    <!-- Content
	================================================== -->
    <div class="dashboard-content">

        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>My Payments</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="{{route('ProfileUpdate', ['id' => Auth::id()])}}">Dashboard</a></li>
                            <li>My Payments</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <form action="{{route('IDUpdate')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-12">

                    <div id="add-listing">

                        <!-- Section -->
                        <div class="add-listing-section">

                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-doc"></i> PayPal Information</h3>
                            </div>

                            <!-- Title -->
                            <div class="row with-forms">
                                <div class="col-md-12">
                                    <h5> PayPal ID <i class="tip" data-tip-content="Your PayPal ID to receive Payments"></i></h5>
                                    <input name="email" class="search-field" type="email" value="{{$info->email}}"/>
                                </div>
                            </div>

                        </div>
                        <!-- Section / End -->

                        <button type="submit" class="button margin-top-15">Save Changes</button>

                    </div>
                </div>

            </div>

        </form>

    </div>
    <!-- Content / End -->


@stop


@section('script')
@stop

