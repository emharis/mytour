@extends('front.partials.master')

@section('main-content')

@if(isset($bykategori))
@if($bykategori)
<!--tampikan daftar blog by kategori-->
<!-- START PAGE META -->
<div id="page-meta">
    <div class="inner group">
        <h3>Blogs in {{ strtoupper($kategori->nama)}}</h3>
    </div>
</div>
<!-- END PAGE META -->
@endif
@endif

<div id="primary" class="sidebar-right">
    <div class="inner group">
        <!-- START CONTENT -->
        <div id="content-blog" class="content group infinite-scroll">

            @foreach($artikels as $art)
            <div class="sticky hentry hentry-post blog-big group ">
                <!-- post featured & title -->
                <div class="thumbnail">
                    <!-- post title -->
                    <h2 class="post-title"><a href="front/blog/show/{{$art->id}}">{{$art->judul}}</a></h2>
                    <!-- post featured -->
                    <div class="image-wrap">
                        <img src="{{$art->imageurl}}" width="816px" height="282px" />        
                    </div>
                    <p class="date">
                        <span class="month">{{date('M',strtotime($art->created_at))}}</span>
                        <span class="day">{{date('d',strtotime($art->created_at))}}</span>
                    </p>
                </div>
                <!-- post meta -->
                <div class="meta group">
                    <p class="author"><span>by <a href="#" title="Posts by Nicola Mustone" rel="author">Nicola Mustone</a></span></p>
                    <p class="categories"><span>In: <a href="front/blog/bykategori/{{$art->kategori->id}}" title="View all posts in Happyness" rel="category tag">{{$art->kategori->nama}}</a></span></p>
                    <p class="comments"><span><a href="front/blog/show/{{$art->id}}#comments" title="Comment on Section shortcodes &amp; sticky posts!">{{(count($art->comments()->where('confirmed','Y')->get() )>0?count($art->comments) . ' comments':'No comments')}}</a></span></p>
                </div>
                <!-- post content -->
                <div class="the-content group">
                    {{$art->sub_konten}}
                </div>
                <div class="clear"></div>
            </div>
            @endforeach

            <br/>
            <a id="jsnext" class="jscroll-next" href="{{URL::to('front/blog/pager?page=2')}}" >Next</a>

        </div>
        <!-- END CONTENT -->

        <!-- START SIDEBAR -->
        <div id="sidebar-blog-sidebar" class="sidebar group">

            <div class="widget-first widget recent-posts">
                <h3>From Posts</h3>
                <div class="recent-post group">
                    @foreach($frompost as $frp)
                    <div class="hentry-post group">
                        <div class="thumb-img">
                            <a href="front/blog/show/{{$frp->id}}">
                            <img width="55px" height="55px" src="{{($frp->thumb55 != '' ? $frp->thumb55 : 'images/blog/blog-thumb.png')}}" />
                            </a>
                        </div>
                        <div class="text">
                            <a href="front/blog/show/{{$frp->id}}" title="{{$frp->judul}}" class="title">{{$frp->judul}}</a>
                            <p>{{substr($frp->sub_konten,0,75)}} </p>
                            <a class="read-more" href="article.html">&rarr; Read More</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="widget-last widget recent-comments">
                <h3>Categories</h3>
                <div class="recent-post recent-comments group">
                    @foreach($kategoris as $kat)
                    <div class="the-post group">
                        <a class="title" href="front/blog/bykategori/{{$kat->id}}">{{ $kat->nama}} ({{count($kat->artikels)}})</a>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
        <!-- END SIDEBAR -->

    </div>
</div>

<script>
    jQuery(document).ready(function () {
        $('.infinite-scroll').jscroll({
            loadingHtml: '<img src="loading.gif" alt="Loading" /> Loading...',
            nextSelector: '.jscroll-next',
            autoTrigger:true,
            padding:20
        });
    });
</script>
@stop