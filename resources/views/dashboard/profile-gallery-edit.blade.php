@extends('layouts.dashboard')

@section('head')
    <title>Pumping Hearts | {{Auth::User()->name}}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

@stop


@section('body')

    <style>
        div.container4 {
            height: 10em;
            position: relative }
        div.container4 button {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%) }

    </style>
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
                    <div class="add-listing-section margin-top-45 margin-bottom-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-picture"></i> Gallery</h3>
                        </div>

                    @foreach($images as $image)
                        <!-- Row -->
                        <div class="row with-forms">



                            <form action="{{route('GalleryUpdateEdit')}}" method="post">
                            @csrf
                            <!-- Phone -->
                            <div class="col-md-10">
                                <?php $name = 'images/ProfileGallery/'.$image->name?>
                                <img style=" /* or any custom size */
    height: 100%;
    object-fit: contain;" src="{{asset($name)}}">
                            </div>

                                <input type="text" value="{{$image->id}}" name="image_id" style="display: none;">
                            <!-- Website -->
                            <div class="col-md-2 container4">
                                <button type="submit" class="button"> Delete </button>
                            </div>
                            </form>


                        </div>
                        <!-- Row / End -->
                            <hr>
                    @endforeach

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

