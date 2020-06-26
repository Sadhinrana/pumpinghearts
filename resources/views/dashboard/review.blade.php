@extends('layouts.dashboard')

@section('head')
    <title>Pumping Hearts | {{Auth::User()->name}}</title>
@stop


@section('body')


    <script>
        document.getElementById("reviews-menu").classList.add('active');
    </script>
    <!-- Content
	================================================== -->
    <div class="dashboard-content">

        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Reviews</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Reviews</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Listings -->
            <div class="col-lg-6 col-md-12">

                <div class="dashboard-list-box margin-top-0">

                    <h4>Customer Reviews</h4>

                    <!-- Reply to review popup -->
                    <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                        <div class="small-dialog-header">
                            <h3>Reply to review</h3>
                        </div>
                        <div class="message-reply margin-top-0">
                            <textarea cols="40" rows="3"></textarea>
                            <button class="button">Reply</button>
                        </div>
                    </div>

                    <ul>

                        <li>
                            <div class="comments listing-reviews">
                                <ul>
                                    @foreach($cust_reviews as $review)
                                        <li>
                                            <div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
                                            <div class="comment-content"><div class="arrow-comment"></div>
                                                <div class="comment-by">{{$review->profile->user->name}} <div class="comment-by-listing">on <a href="#">{{$review->order->package->name}} Package</a></div> <span class="date">{{date('M j Y g:i A', strtotime($review->created_at))}}</span>
                                                    <?php $rating = ($review->service + $review->valueofmoney + $review->experience + $review->friendliness)/4?>
                                                    <div class="star-rating" data-rating="{{$rating}}"></div>
                                                </div>
                                                <p>{{$review->review}}</p>
                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

{{--                <!-- Pagination -->--}}
{{--                <div class="clearfix"></div>--}}
{{--                <div class="pagination-container margin-top-30 margin-bottom-0">--}}
{{--                    <nav class="pagination">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#" class="current-page">1</a></li>--}}
{{--                            <li><a href="#">2</a></li>--}}
{{--                            <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--                <!-- Pagination / End -->--}}

            </div>

            <!-- Listings -->
            <div class="col-lg-6 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <h4>Your Reviews</h4>
                    <ul>

                        <li>
                            <div class="comments listing-reviews">
                                <ul>
                                    @foreach($my_reviews as $review)
                                        <li>
                                            <div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
                                            <div class="comment-content"><div class="arrow-comment"></div>
                                                <div class="comment-by">{{$review->profile->user->name}} <div class="comment-by-listing">on <a href="#">{{$review->order->package->profile->user->name}}</a></div> <span class="date">{{date('M j Y g:i A', strtotime($review->created_at))}}</span>
                                                    <?php $rating = ($review->service + $review->valueofmoney + $review->experience + $review->friendliness)/4?>
                                                    <div class="star-rating" data-rating="{{$rating}}"></div>
                                                </div>
                                                <p>{{$review->review}}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>

                    </ul>
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
