@extends('layouts.dashboard')

@section('head')
    <title>Pumping Hearts | {{Auth::User()->name}}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

@stop


@section('body')

    <script>
        document.getElementById("profile-gallery-menu").classList.add('active');
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

        <div class="row">
            <div class="col-lg-12">

                <div id="add-listing">


                    <!-- Section -->
                    <div class="add-listing-section margin-top-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-picture"></i> Gallery</h3>
                            <p>(pictures of your gym, client transformations, past achievements, etc.)
                            </p>
                        </div>

                        <form action="{{route('GalleryUpdate')}}"
                              class="dropzone"
                              id="my-awesome-dropzone">
                            @csrf
                        </form>

                    </div>
                    <!-- Section / End -->




                    {{--<a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a>--}}

                </div>
            </div>

        </div>



    </div>
    <!-- Content / End -->


@stop


@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

@stop

