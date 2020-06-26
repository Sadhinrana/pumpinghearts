@extends('layouts.main')

@section('head')

    <title>Pumping Hearts | Note From The Owner</title>

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

                    <h2>Owner's Note</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Owner's Note</li>
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

                <p> “It all started with one client...  </p>


                <p>I have been personal training for many years and have had the pleasure of helping 100's of people achieve their goals but it wasn't until I had to send a client away.</p>

                <p>I was assigned a new client and began working with them but something didn't feel right. Yes, it was the beginning of a new business but I kept thinking that this person could do so much better with someone else.</p>

                    <p>I'm confident in my coaching but we as trainers have different backgrounds, different specialties and different experiences we've all been through.</p>

                <p>I really love what I do and take my job very seriously but I wanted to help my client and serve their best interest. I felt the person I was working with could achieve their potential with someone else who was more relatable to their goals. I just wasn't comfortable accepting their money anymore.</p>

                <p>Just like dating we connect with people differently which is why I created this platform so clients can find an appropriate match. It didn’t make sense to work with people who have specific needs that I am not experienced with. We have doctors in different fields, so why not create the same for fitness?</p>

                <p>Maybe a client needs someone who specializes in pregnancy. Or maybe a client needs someone who has had experience with injuries or can come to their home instead. Whatever it is, we are all unique in our own way and I want to increase everyone's capability and longevity of fitness.</p>

                <p>From trainee to trainer, fitness has been and will stay a part of my everyday life. I learned the hard way by trial and error as a small kid in high school and only wish I learned the things I know now sooner. Bodybuilding became an interest of mine which eventually led to begin my career as a personal trainer at Gold's Gym Long Beach. Years later I managed to create amazing relationships with my clients while building awesome transformations. Witnessing people succeed became a treasure and I only hope your team will develop the same.”</p>




                <p><strong>To future trainees,</strong>
                        I wish you the best in your fitness journey and hope this platform was able to help you in anyway</p>

                <p><strong>To Trainers and Teachers,</strong>
                    I wish you a successful career with many opportunities to change people’s lives while being happy doing it.</p>


                    - Armon Behbahany


            </div>

        </div>

    </div>
    <!-- Container / End -->




@stop
