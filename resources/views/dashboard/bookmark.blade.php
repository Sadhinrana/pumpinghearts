@extends('layouts.dashboard')

@section('head')
    <title>Pumping Hearts | {{Auth::User()->name}}</title>
@stop


@section('body')

    <script>
        document.getElementById("bookmarks-menu").classList.add('active');
    </script>
    <!-- Content
            ================================================== -->
    <div class="dashboard-content">

        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Bookmarks</h2>
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li>Bookmarks</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>



        <!-- Content -->
        <div class="row">
            <!-- Listings -->
            <div class="col-lg-12 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <h4>Bookmarked Trainers</h4>
                    <ul>

                        @foreach($bookmarks as $bookmark)
                        <?php $Bookprofile = \App\Profile::find($bookmark->bookmark_id);
                            $images = \App\Gallery::where('profile_user_id', $Bookprofile->user_id)->first();
                            if($images)
                                $image = 'images/ProfileGallery/'.$images->name;
                            else
                                $image = 'images/listing-item-01.jpg';
                            $user = \App\User::find($Bookprofile->user_id);
                            ?>
                            <li>
                                <div class="list-box-listing">
                                    <div class="list-box-listing-img"><a href="{{route('PublicProfile', ['id' => $user->id, 'name' => $user->name])}}"><img src="{{asset($image)}}" alt=""></a></div>
                                    <div class="list-box-listing-content">
                                        <div class="inner">
                                            <h3>{{$Bookprofile->title}}</h3>
                                            <span>{{$Bookprofile->address}}</span>
                                            <div class="star-rating" data-rating="5.0">
                                                <div class="rating-counter">(23 reviews)</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{route('BookmarkDelete')}}" method="post">
                                    @csrf
                                    <input type="text" value="{{$bookmark->id}}" name="book_id" style="display: none;">

                                <div class="buttons-to-right">
                                    <button type="submit" class="button gray"><i class="sl sl-icon-close"></i> Delete</button>
                                </div>
                                </form>
                            </li>



                        @endforeach


                    </ul>
                </div>
            </div>


            <!-- Copyrights -->
            <div class="col-md-12">
                <div class="copyrights">© 2019 Pumping Heart. All Rights Reserved.</div>
            </div>
        </div>


    </div>
    <!-- Content / End -->

@stop
