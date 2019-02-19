@extends('frontend.layouts.frontend')
@section('content')
    <div class="row">
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
                <header class="entry-header d-flex flex-wrap justify-content-between align-items-center">
                    <div class="header-elements">
                        <div class="posted-date">{{ $blog->created_at->format('F d, Y') }}</div>
                        <h2 class="entry-title"><a href="blogs/{{ $blog->id }}"> {{ $blog->name }} </a></h2>
                        <div class="post-metas d-flex flex-wrap align-items-center">
                            <span class="cat-links">in <a href="#">Causes</a></span>
                            <span class="post-author">by <a href="#">{{ $blog->owner->first_name." ".$blog->owner->last_name }}</a></span>
                            <span class="post-comments"><a href="#">3 Comments</a></span>
                        </div>
                    </div>
                </header>
                <div class="entry-content">
                    <p> <b> Categories :</b> {{$blogCat}} </p>
                    <p> <b> Tags : </b>{{$blogTag}} </p>
                    <h4>{{ $blog->content }} </h4>
                    <p> Date : </p>
                </div>
                <footer class="entry-footer">
                    <a href="blogs/{{ $blog->id }}" class="btn gradient-bg">Read More</a>
                </footer>
            </div>
            <?php } ?>

           <?php
            /*
            {{ $blogs->links() }}
            {{ $blogs->onEachSide(2)->fragment('foo')->appends(['search' =>$search])->links() }} */ ?>
            <!-- <ul class="pagination d-flex flex-wrap align-items-center p-0">
                <li class="active"><a href="#">01</a></li>
                <li><a href="#">02</a></li>
                <li><a href="#">03</a></li>
            </ul> -->
        </div>
        <div class="col-12 col-lg-4">
            <div class="sidebar">
                <div class="search-widget">
                <form action="" class="flex flex-wrap align-items-center" id='blogSearchForm'>
                        <input type="search" value="{{$search}}" name="search" placeholder="Search...">
                        <button type="submit" class="flex justify-content-center align-items-center" onclick="document.getElementById('blogSearchForm').submit();"
               id='blogSearch'>GO</button>
               </form>
               <form action="" class="flex flex-wrap align-items-center" id='onlyMeSearchForm'>
                @if ($logged_in_user)
                    <input type="hidden" value="{{$logged_in_user->id}}" id="user" name="user">
                   <button type="submit" class="flex justify-content-center align-items-center "
                   <?php if($user != '') { ?> style="background-color:blue" <?php } ?>
                   onclick="onlymeFitler()"
                    id='onlyMeSearch'>Me</button>
                    @endif

                    </form><!-- .flex -->
                </div><!-- .search-widget -->
                 @include('frontend.includes.popularposts')
                 @include('frontend.includes.upcomingevents')
            </div><!-- .sidebar -->
        </div><!-- .col -->
    </div><!-- row -->
@endsection
<script>
function onlymeFitler(){
    var backgroundColor = document.getElementById('onlyMeSearch').style.backgroundColor;
    if(backgroundColor){
        document.getElementById('user').value = '';
    }
    document.getElementById('onlyMeSearchForm').submit();
}

</script>