@extends('layouts.main')

@section('head')

    <title>Pumping Hearts | Privacy Policy</title>

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

                    <h2>Privacy Policy</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Privacy Policy</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <div class="clearfix"></div>
    <!-- Map Container / End -->


    <!-- Container / Start -->
    <div class="container" style="margin-bottom: 75px;">

        <div class="row">

            <div class="col-md-12">

                <p>Last updated: 15th June 2019 PumpingHearts (“us”, “we”, or “our”) operates the PumpingHearts website (the “Service”).</p>
                <p>This page informs you of our policies regarding the collection, use and disclosure of Personal Information when you use our Service.</p>
                <p>We will not use or share your information with anyone except as described in this Privacy Policy.</p>
                <p>We use your Personal Information for providing and improving the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible at http://PumpingHearts.net</p>
                <h2>Information Collection And Use</h2>
                <p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally identifiable information (“Personal Information”) may include, but is not limited to:</p>
                <ul>
                    <li>Name</li>
                    <li>Email address</li>
                    <li>Telephone number</li>
                    <li>Address</li>
                </ul>
                <h2>Log Data</h2>
                <p>We collect information that your browser sends whenever you visit our Service (“Log Data”). This Log Data may include information such as your computer’s Internet Protocol (“IP”) address, browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages and other statistics.</p>
                <h2>Google AdSense &amp; DoubleClick Cookie</h2>
                <p>Google, as a third party vendor, uses cookies to serve ads on our Service.</p>
                <h2>Cookies</h2>
                <p>Cookies are files with small amount of data, which may include an anonymous unique identifier. Cookies are sent to your browser from a web site and stored on your computer’s hard drive.</p>
                <p>We use “cookies” to collect information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>
                <h2>Service Providers</h2>
                <p>We may employ third party companies and individuals to facilitate our Service, to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.</p>
                <p>These third parties have access to your Personal Information only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>
                <h2>Security</h2>
                <p>The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</p>
                <h2>Links To Other Sites</h2>
                <p>Our Service may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party’s site. We strongly advise you to review the Privacy Policy of every site you visit.</p>
                <p>We have no control over, and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>
                <h2>Children’s Privacy</h2>
                <p>Our Service does not address anyone under the age of 18 (“Children”).</p>
                <p>We do not knowingly collect personally identifiable information from children under 18. If you are a parent or guardian and you are aware that your child has provided us with Personal Information, please contact us. If we discover that a child under 18 has provided us with Personal Information, we will delete such information from our servers immediately.</p>
                <h2>Compliance With Laws</h2>
                <p>We will disclose your Personal Information where required to do so by law or subpoena.</p>
                <h2>Changes To This Privacy Policy</h2>
                <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>
                <p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>
                <h2>Contact Us</h2>
                <p>If you have any questions about this Privacy Policy, please contact us</p>
            </div>

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
