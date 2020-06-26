<!-- Footer
 ================================================== -->
<div id="footer" class="sticky-footer">
    <!-- Main -->
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-6">
                <img class="footer-logo" src="{{asset('images/Logo-red-200px.png')}}" alt="">
                <br><br>
                <p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
            </div>

            <div class="col-md-4 col-sm-6 ">
                <h4>Resources</h4>
                <ul class="footer-links">
                    @guest
                    <li><a onclick="LaunchUserModal()" href="#">Login</a></li>
                    <li><a onclick="LaunchUserModal()" href="#">Sign Up</a></li>
                    @endguest
                    @auth
                            <li><a href="{{route('Dashboard', ['id' => Auth::id()])}}"> Dashboard</a></li>
                            <li><a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                ></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form></li>

                        @endauth
                    <li><a href="{{route('TOS')}}">Terms of Service</a></li>
                    <li><a href="{{route('Privacy')}}">Privacy Policy</a></li>
                </ul>

                <ul class="footer-links">
                    <li><a href="{{route('FAQ')}}">FAQ</a></li>
                    <li><a href="{{route('MeetTheCreator')}}">Meet The Creator</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="{{route('contact')}}">Contact</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="col-md-3  col-sm-12">
                <h4>Contact Us</h4>
                <div class="text-widget">
                    <span>12345 Little Lonsdale St, Melbourne</span> <br>
                    Phone: <span>(123) 123-456 </span><br>
                    E-Mail:<span> <a href="#">info@pumpinghearts.net</a> </span><br>
                </div>

                <ul class="social-icons margin-top-20">
                    <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                    <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                    <li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
                </ul>

            </div>

        </div>

        <!-- Copyright -->
        <div class="row">
            <div class="col-md-12">
                <div class="copyrights">© 2019 Pumping Hearts. All Rights Reserved.</div>
            </div>
        </div>

    </div>

</div>
<!-- Footer / End -->
