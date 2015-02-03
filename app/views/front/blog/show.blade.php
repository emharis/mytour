@extends('front.partials.master')

@section('main-content')
<div id="primary" class="sidebar-right">
    <div class="inner group">
        <!-- START CONTENT -->
        <div id="content-single" class="content group">
            <div class=" hentry-post blog-big group ">
                <!-- post featured & title -->
                <div class="thumbnail">
                    <!-- post title -->
                    <h1 class="post-title"><a href="{{URL::current()}}">{{$artikel->judul}}</a></h1>
                    <!-- post featured -->
                    <div class="image-wrap">
                        <img src="{{$artikel->imageurl}}" width="816px" height="282px" />        
                    </div>
                    <p class="date">
                        <span class="month">{{date('M',strtotime($artikel->created_at))}}</span>
                        <span class="day">{{date('d',strtotime($artikel->created_at))}}</span>
                    </p>
                </div>
                <!-- post meta -->
                <div class="meta group">
                    <p class="author"><span>by <a href="blog-big-image.html" title="Posts by Nicola Mustone" rel="author">Nicola Mustone</a></span></p>
                    <p class="categories"><span>In: <a href="blog-big-image.html" title="View all posts in Design" rel="category tag">{{$artikel->kategori->nama}}</a></p>
                    <p class="comments"><span><a href="front/blog/show/{{$artikel->id}}#comments" title="Comment on Section shortcodes &amp; sticky posts!">{{(count($comments)>0?count($comments) . ' comments':'No comments')}}</a></span></p>
                </div>
                <!-- post content -->
                <div class="the-content single group">
                    <!--tambahkan replace untuk gambar yang diambil dari local menggunakan roxyfilman-->
                    {{str_replace('../', '', $artikel->konten)}}
                </div>
                <!--<p class="tags">Tags: <a href="#" rel="tag">book</a>, <a href="#" rel="tag">css</a>, <a href="#" rel="tag">design</a>, <a href="#" rel="tag">inspiration</a></p>-->
                <div class="clear"></div>
            </div>
            <!-- START COMMENTS -->
            <div id="comments">
                <h3 id="comments-title">
                    @if(count($comments)>0)
                    <span>{{count($artikel->comments)}}</span> comments    
                    @else
                    <span>no</span> comments
                    @endif

                </h3>
                <ol class="commentlist group">
                    <?php $cmtnum = 1; ?>
                    @foreach($comments as $cmt)
                    <li class="comment {{($cmtnum&1? 'odd':'even')}} {{($cmt->isreply =='Y' ? 'bypostauthor':'')}} depth-1">
                        <div class="comment-container">
                            <div class="comment-author vcard" >
                                <img alt="" {{($cmt->isreply =='Y' ? 'src="frnt/images/avatar/admin.png"':'src="frnt/images/avatar/comments.png"')}} class="avatar" height="75" width="75" style="border: none;" />
                                <cite class="fn">{{$cmt->name}}</cite>                 
                            </div>
                            <!-- .comment-author .vcard -->
                            <div class="comment-meta commentmetadata">
                                <div class="intro">
                                    <div class="commentDate">
                                        <a >
                                            {{$cmt->created_at}}</a>                        
                                    </div>
                                    <div class="commentNumber">#&nbsp;{{$cmtnum++}}</div>
                                </div>
                                <div class="comment-body">
                                    <p>{{$cmt->message}}</p>
                                </div>
                                <div class="reply group">
                                    <a class="comment-reply-link" href="front/blog/show/{{$artikel->id}}#respond" onclick="return addComment.moveForm( & quot; comment - 2 & quot; , & quot; 2 & quot; , & quot; respond & quot; , & quot; 41 & quot; )">Reply</a>                    
                                </div>
                                <!-- .reply -->
                            </div>
                            <!-- .comment-meta .commentmetadata -->
                        </div>
                        <!-- #comment-##  -->
                    </li>
                    @endforeach

                    <!--                    <li class="comment bypostauthor odd">
                                            <div class="comment-container">
                                                <div class="comment-author vcard">
                                                    <img alt="" src="images/avatar/nicola.jpeg" class="avatar" height="75" width="75" />
                                                    <cite class="fn">nicola</cite>                 
                                                </div>
                                                 .comment-author .vcard 
                                                <div class="comment-meta commentmetadata">
                                                    <div class="intro">
                                                        <div class="commentDate">
                                                            <a href="#">
                                                                September 24, 2012 at 1:32 pm</a>                        
                                                        </div>
                                                        <div class="commentNumber">#&nbsp;2</div>
                                                    </div>
                                                    <div class="comment-body">
                                                        <p>While i’m the author of the post. My comment template is different, something like a “sticky comment”!</p>
                                                    </div>
                                                    <div class="reply group">
                                                        <a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm( & quot; comment - 3 & quot; , & quot; 3 & quot; , & quot; respond & quot; , & quot; 41 & quot; )">Reply</a>                    
                                                    </div>
                                                     .reply 
                                                </div>
                                                 .comment-meta .commentmetadata 
                                            </div>
                                             #comment-##  
                                        </li>-->
                </ol>

                <!--                 START TRACKBACK & PINGBACK 
                                <h2 id="trackbacks">Trackbacks and pingbacks</h2>
                                <ol class="trackbacklist"></ol>
                                <p><em>No trackback or pingback available for this article.</em></p>
                
                                 END TRACKBACK & PINGBACK 								-->
                <div id="respond">
                    <h3 id="reply-title">Leave a <span>Reply</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h3>
                    <form action="front/blog/comment" method="post" id="commentform">
                        {{Form::hidden('artikelId',$artikel->id)}}
                        <p class="comment-form-author"><label for="author">Name</label> <input id="author" name="author" type="text" value="" size="30" aria-required="true" /></p>
                        <p class="comment-form-email"><label for="email">Email</label> <input id="email" name="email" type="text" value="" size="30" aria-required="true" /></p>
                        <p class="comment-form-url"><label for="url">Website</label><input id="url" name="url" type="text" value="" size="30" /></p>
                        <p class="comment-form-comment"><label for="comment">Your comment</label><textarea id="comment" name="comment" cols="45" rows="8"></textarea></p>
                        <div class="clear"></div>
                        <p class="form-submit">
                            <input name="submit" type="submit" id="submit" value="Post Comment" />
                        </p>
                    </form>
                </div>
                <!-- #respond -->
            </div>
            <!-- END COMMENTS -->
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

            <!--            <div id="last-tweets-2" class="widget last-tweets">
                            <h3>Last Tweets</h3>
                            <div class="list-tweets"></div>
                            <script type="text/javascript">
                                jQuery(function ($) {
                                    $('#last-tweets-2 .list-tweets').tweetable({
                                        listClass: 'tweets-widget',
                                        username: 'YIW',
                                        time: true,
                                        limit: 3,
                                        replies: true
                                    });
                                });
                            </script>
                        </div>-->

            <!--            <div class="widget-last widget recent-comments">
                            <h3>Recent Comments</h3>
                            <div class="recent-post recent-comments group">
            
                                <div class="the-post group">
                                    <div class="avatar">
                                        <img alt="" src="frnt/images/avatar/unknow55.png" class="avatar" />   
                                    </div>
                                    <span class="author"><strong><a href="mailto:no-email@i-am-anonymous.not">eduard</a></strong> in</span> 
                                    <a class="title" href="article.html">Nice &amp; Clean. The best for your blog!</a>
                                    <p class="comment">
                                        hi <a class="goto" href="article.html">&#187;</a>
                                    </p>
                                </div>
            
                                <div class="the-post group">
                                    <div class="avatar">
                                        <img alt="" src="frnt/images/avatar/nicola55.jpeg" class="avatar" />   
                                    </div>
                                    <span class="author"><strong><a href="mailto:nicola@yopmail.com">nicola</a></strong> in</span> 
                                    <a class="title" href="article.html">This is the title of the first article. Enjoy it.</a>
                                    <p class="comment">
                                        While i’m the author of the post. My comment template is different,... <a class="goto" href="article.html">&#187;</a>
                                    </p>
                                </div>
            
                                <div class="the-post group">
                                    <div class="avatar">
                                        <img alt="" src="frnt/images/avatar/unknow55.png" class="avatar" />   
                                    </div>
                                    <span class="author"><strong><a href="mailto:no-email@i-am-anonymous.not">Anonymous</a></strong> in</span> 
                                    <a class="title" href="article.html">This is the title of the first article. Enjoy it.</a>
                                    <p class="comment">
                                        Hi all, i’m a guest and this is the guest’s awesome comments... <a class="goto" href="article.html">&#187;</a>
                                    </p>
                                </div>
                            </div>
                        </div>-->

            <div class="widget-last widget recent-comments">
                <h3>Categories</h3>
                <div class="recent-post recent-comments group">
                    @foreach($kategoris as $kat)
                    <div class="the-post group">
                        <a class="title" href="front/blog/bykategori/{{$kat->id}}">{{ $kat->nama}}</a>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
        <!-- END SIDEBAR -->
    </div>
</div>
<?php if(Session::has('reply_success')): ?>
<script type="text/javascript">
    
       alert("{{Session::get('reply_success')}}");
    
</script>
<?php endif ?>
@stop