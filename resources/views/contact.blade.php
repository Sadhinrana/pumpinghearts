@extends('layouts.main')

@section('head')

    <title>Pumping Hearts | Contact</title>

@stop


@section('body')
    <script type="text/javascript">
        document.getElementById("body").classList.remove('transparent-header');
        document.getElementById("main-logo").src="{{asset('images/Logo-red-200px.png')}}";
        // document.getElementById("header-container").classList.add('fixed');
        // document.getElementById("header-container").classList.add('fullwidth');
        // document.getElementById("header").classList.add('not-sticky');
    </script>


    <div class="clearfix"></div>
    <!-- Header Container / End -->


    <!-- Titlebar
    ================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Contact Us</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Contact</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <div class="clearfix"></div>
    <!-- Map Container / End -->


    <!-- Container / Start -->
    <div class="container" style="margin-bottom: 50px;">

        <div class="row">

            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif

            <!-- Contact Details -->
            <div class="col-md-4">

                <h4 class="headline margin-bottom-30">Find Us Here</h4>

                <!-- Contact Details -->
                <div class="sidebar-textbox">
                    <p>Collaboratively administrate channels whereas virtual. Objectively seize scalable metrics whereas proactive e-services.</p>

                    <ul class="contact-details">
                        <li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong> <span>(123) 123-456 </span></li>
                        <li><i class="im im-icon-Fax"></i> <strong>Fax:</strong> <span>(123) 123-456 </span></li>
                        <li><i class="im im-icon-Globe"></i> <strong>Web:</strong> <span><a href="#">www.pumpinghearts.net.com</a></span></li>
                        <li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><a href="#">info@pumpinghearts.net</a></span></li>
                    </ul>
                </div>

            </div>

            <!-- Contact Form -->
            <div class="col-md-8">

                <section id="contact">
                    <h4 class="headline margin-bottom-35">Contact Form</h4>

                    <div id="contact-message"></div>

                    <form method="post" action="{{route('ContactUs')}}" id="contactform" autocomplete="on">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <input name="name" type="text" id="name" placeholder="Your Name" required="required" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <input name="email" type="email" id="email" placeholder="Email Address" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
                                </div>
                            </div>
                        </div>

                        <div>
                            <input name="subject" type="text" id="subject" placeholder="Subject" required="required" />
                        </div>

                        <div>
                            <textarea name="comments" cols="40" rows="3" id="comments" placeholder="Message" spellcheck="true" required="required"></textarea>
                        </div>

                        <input type="submit" class="submit button" id="submit" value="Submit Message" />

                    </form>
                </section>
            </div>
            <!-- Contact Form / End -->

        </div>

    </div>
    <!-- Container / End -->




@stop


@section('script')


    <!-- Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>
    <script type="text/javascript" src="{{asset('scripts/infobox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/markerclusterer.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/maps.js')}}"></script>


@stop
