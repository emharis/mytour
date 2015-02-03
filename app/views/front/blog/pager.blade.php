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
@if($artikels->getCurrentPage() < $artikels->getLastPage())
<a class="jscroll-next"   href="{{URL::to('front/blog/pager')}}?page={{$artikels->getCurrentPage()+1}}" >Next</a>
@else
<a class="jscroll-next"   ></a>
@endif

