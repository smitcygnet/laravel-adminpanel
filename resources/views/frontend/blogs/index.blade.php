@extends('frontend.layouts.frontend')
@section('content')
    <div class="row">

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="" id='blogSearchForm'>
                      <input type="textbox" name="search">
                      <input type="Button"
                        onclick="document.getElementById('blogSearchForm').submit();"
                       id='blogSearch' value="Search">
                    </form>
                </div>
            </div>
        </div>
    </div>


<div class="col-12 col-lg-8">


    <?php foreach ($blogs as $blog) {
        $blogCategories = $blogTags = [];
      foreach($blog->categories as $blogCat){
                $blogCategories[] = $blogCat->name;
            }
    foreach($blog->tags as $blogtag){
                $blogTags[] = $blogtag->name;
            }
        $blogCat = count($blogCategories) > 0 ? implode(', ', $blogCategories) : '';
        $blogTag = count($blogTags) > 0 ? implode(',', $blogTags) : '';

                                ?>
                    <div class="news-content">
                        <a href="#"><img src="images/1.jpg" alt=""></a>
                        <header class="entry-header d-flex flex-wrap justify-content-between align-items-center">
                            <div class="header-elements">
                                <div class="posted-date">March 12, 2018</div>
                                <h2 class="entry-title"><a href="blogs/{{ $blog->id }}"> {{ $blog->name }} </a></h2>
                                <div class="post-metas d-flex flex-wrap align-items-center">
                                    <span class="cat-links">in <a href="#">Causes</a></span>
                                    <span class="post-author">by <a href="#">Tom Phillips</a></span>
                                    <span class="post-comments"><a href="#">3 Comments</a></span>
                                </div>
                            </div>
                            <div class="donate-icon">
                                <!-- <a href="#"><img src="images/donate-icon.png" alt=""></a> -->
                            </div>
                        </header>

                        <div class="entry-content">
                            <p> <b> Categories :</b> {{$blogCat}} </p>
                                                <p> <b> Tags : </b>{{$blogTag}} </p>
                                                <h4>{{ $blog->content }} </h4>
                                                <p> User : {{ $blog->created_by }}| Date : {{ $blog->created_at->format('d/m/Y h:i A') }}</p>
                        </div>

                        <footer class="entry-footer">
                            <a href="#" class="btn gradient-bg">Read More</a>
                        </footer>
                    </div>
<?php } ?>

                    <ul class="pagination d-flex flex-wrap align-items-center p-0">
                        <li class="active"><a href="#">01</a></li>
                        <li><a href="#">02</a></li>
                        <li><a href="#">03</a></li>
                    </ul>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="sidebar">
                        <div class="search-widget">
                            <form class="flex flex-wrap align-items-center">
                                <input type="search" placeholder="Search...">
                                <button type="submit" class="flex justify-content-center align-items-center">GO</button>
                            </form><!-- .flex -->
                        </div><!-- .search-widget -->

                        <div class="popular-posts">
                            <h2>Popular Posts</h2>
                            <ul class="p-0">
                                <li class="d-flex flex-wrap justify-content-between align-items-center">
                                    <figure><a href="#"><img src="images/p-1.jpg" alt=""></a></figure>

                                    <div class="entry-content">
                                        <h3 class="entry-title"><a href="#">A new cause to help</a></h3>

                                        <div class="posted-date">MArch 12, 2018</div>
                                    </div>
                                </li>

                                <li class="d-flex flex-wrap justify-content-between align-items-center">
                                    <figure><a href="#"><img src="images/p-2.jpg" alt=""></a></figure>

                                    <div class="entry-content">
                                        <h3 class="entry-title"><a href="#">We love to help people</a></h3>

                                        <div class="posted-date">MArch 10, 2018</div>
                                    </div>
                                </li>

                                <li class="d-flex flex-wrap justify-content-between align-items-center">
                                    <figure><a href="#"><img src="images/p-3.jpg" alt=""></a></figure>

                                    <div class="entry-content">
                                        <h3 class="entry-title"><a href="#">The new ideas for helping</a></h3>

                                        <div class="posted-date">MArch 09, 2018</div>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- .cat-links -->

                        <div class="upcoming-events">
                            <h2>Upcoming Events</h2>

                            <ul class="p-0">
                                <li class="d-flex flex-wrap justify-content-between align-items-center">
                                    <figure><a href="#"><img src="images/u-1.jpg" alt=""></a></figure>

                                    <div class="entry-content">
                                        <h3 class="entry-title"><a href="#">Fundraiser for Kids</a></h3>

                                        <div class="post-metas d-flex flex-wrap align-items-center">
                                            <span class="posted-date"><a href="#">Aug 25, 2018</a></span>
                                            <span class="event-location"><a href="#">Ball Room New York</a></span>
                                        </div>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </li>

                                <li class="d-flex flex-wrap justify-content-between align-items-center">
                                    <figure><a href="#"><img src="images/u-2.jpg" alt=""></a></figure>

                                    <div class="entry-content">
                                        <h3 class="entry-title"><a href="#">The childrens</a></h3>

                                        <div class="post-metas d-flex flex-wrap align-items-center">
                                            <span class="posted-date"><a href="#">Aug 25, 2018</a></span>
                                            <span class="event-location"><a href="#">Ball Room New York</a></span>
                                        </div>

                                        <p>Consectetur adipiscing elit. Mauris tempus vestib ulum.</p>
                                    </div>
                                </li>

                                <li class="d-flex flex-wrap justify-content-between align-items-center">
                                    <figure><a href="#"><img src="images/u-3.jpg" alt=""></a></figure>

                                    <div class="entry-content">
                                        <h3 class="entry-title"><a href="#">Bring water </a></h3>

                                        <div class="post-metas d-flex flex-wrap align-items-center">
                                            <span class="posted-date"><a href="#">Aug 25, 2018</a></span>
                                            <span class="event-location"><a href="#">Ball Room New York</a></span>
                                        </div>

                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- .cat-links -->
                    </div><!-- .sidebar -->
                </div><!-- .col -->
</div><!-- row -->

@endsection