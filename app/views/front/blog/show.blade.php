@extends('front.partials.nothome')

@section('styles')
<style type="text/css">
    .img-blog{
        background-size:cover; 
        background-position:center center; 
        background-repeat:no-repeat;
    }
    .img-blog.img-header{
        width: 770px;
        height: 300px; 
    }
    .img-blog.img-thumb{
        width: 70px;
        height: 70px; 
    }
</style>
@stop

@section('content')
<div class="row"><!--Container row-->

    <!-- Blog Full Post
    ================================================== --> 
    <div class="span8 blog">

        <!-- Blog Post 1 -->
        <article>
            <h3 class="title-bg"><a >{{$blog->title}}</a></h3>
            <div class="post-content">
                <a href="#">

                    @if($blog->islocal =='Y')
                    <?php $imgpath = URL::to($constval['img_blog_path'] . $blog->img_cover); ?>
                    @else
                    <?php $imgpath = $blog->img_cover; ?>
                    @endif
                    <img class="img-blog img-header" style="background-image: url('{{$imgpath}}')">
                </a>

                <div class="post-body">
                    {{$blog->content}}
                </div>

                <div class="post-summary-footer">
                    <ul class="post-data">
                        <li><i class="icon-calendar"></i> {{date_format(new DateTime($blog->created_at),'m/d/Y')}}</li>
                        <li><i class="icon-user"></i> <a href="#">Admin</a></li>
                        <li><i class="icon-comment"></i> <a >{{$blog->comments}} Comments</a></li>
                        <li><i class="icon-tags"></i> <a href="front/blog/by-kategori/{{$blog->category_id}}">{{$blog->kategori}}</a></li>
                    </ul>
                </div>
            </div>
        </article>

        <!-- Post Comments
        ================================================== --> 

        <section class="comments">
            @if($blog->comments > 0)
            <h4 class="title-bg"><a name="comments"></a>{{$blog->comments}} Comments so far</h4>
            <ul>  
                @foreach($comments as $cmt)
                <li id="comment-item-{{$cmt->id}}">
                    <img src="frontend/img/user-avatar.jpg" alt="Image" />
                    <span class="comment-name">{{$cmt->name}}</span>
                    <span class="comment-date">{{date_format(new datetime($cmt->created_at),'M d, Y')}}</span>
                    <div class="comment-content">
                        {{$cmt->content}}
                    </div>
                </li>
                @endforeach
            </ul>
            @endif

            <!-- Comment Form -->
            <div class="comment-form-container" id="comment-here">
                <h6>Leave a Comment</h6>
                <div class="alert alert-success" id="commentSuccessAlert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{$constval['blog_comment_success_message']}}
                </div>
                <form action="front/blog/add-comment" method="POST" id="comment-form">
                    {{Form::hidden('blogid',$blog->id)}}
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input class="span4" id="prependedInput" size="16" type="text" placeholder="Name" name="name" required>
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input class="span4" id="prependedInput" size="16" type="email" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-globe"></i></span>
                        <input name="url" class="span4" id="prependedInput" size="16" type="url" placeholder="Website URL">
                    </div>
                    <textarea class="span6" required name="message" ></textarea>
                    <div class="row">
                        <div class="span2">
                            <input type="submit" class="btn btn-inverse" value="Post My Comment" >
                        </div>
                    </div>
                </form>
            </div>
        </section><!-- Close comments section-->

    </div><!--Close container row-->

    <!-- Blog Sidebar
    ================================================== --> 
    <div class="span4 sidebar">

        <!--Search-->
        <section>
            <div class="input-append">
                <form action="#">
                    <input id="appendedInputButton" size="16" type="text" placeholder="Search"><button class="btn" type="button"><i class="icon-search"></i></button>
                </form>
            </div>
        </section>

        <!--Categories-->
        <h5 class="title-bg">Categories</h5>
        <ul class="post-category-list">
            @foreach($kategoris as $kat)
            <li><a href="front/blog/by-kategori/{{$kat->id}}"><i class="icon-plus-sign"></i>{{$kat->name}}</a></li>
            @endforeach
        </ul>

        <!--Popular Posts-->
        <h5 class="title-bg">Others in {{$blog->kategori}}</h5>
        <ul class="popular-posts">
            @foreach($othersin as $oth)
            @if($oth->islocal == 'Y')
            <?php $imgpath = URL::to($constval['img_blog_path'] . $oth->img_cover); ?>
            @else
            <?php $imgpath = $oth->img_cover; ?>
            @endif

            <li>
                <a href="#">
                    <img class="img-blog img-thumb" style="background-image: url('{{$imgpath}}')" />
                </a>
                <h6><a href="front/blog/show/{{$oth->id}}">{{$oth->title}}</a></h6>
                <em>Posted on {{date_format(new DateTime($oth->created_at),'m/d/Y')}}</em>
            </li>
            @endforeach
        </ul>

        <!--Popular Posts-->
        <h5 class="title-bg">Popular Posts</h5>
        <ul class="popular-posts">
            @foreach($popularposts as $pop)
            <li>
                <a href="front/blog/show/{{$pop->id}}">
                    @if($pop->islocal == 'Y')
                    <?php $imgpath = URL::to($constval['img_blog_path'] . $pop->img_cover); ?>
                    @else
                    <?php $imgpath = $pop->img_cover; ?>
                    @endif
                    <img class="img-blog img-thumb" style="background-image: url('{{$imgpath}}')" />
                </a>
                <h6><a href="front/blog/show/{{$pop->id}}">{{$pop->title}}</a></h6>
                <em>Posted on {{date_format(new DateTime($pop->created_at),'m/d/Y')}}</em>
            </li>
            @endforeach
        </ul>
    </div>

</div>
@stop

@section('scripts')
<script src="backend/plugins/jqueryform/jquery.form.min.js" type="text/javascript"></script>
<script src="backend/plugins/jqloader/jquery.loading-overlay.min.js" type="text/javascript"></script>
<script>
    $('#commentSuccessAlert').hide();
    $(document).ready(function () {
        $('#comment-form').submit(function (e) {
            //loader
            $('#comment-form').loader('show');
            $('#comment-form').ajaxSubmit(function (res) {
                //clear input
                $('#comment-form input[type=text]').val(null);
                $('#comment-form input[type=email]').val(null);
                $('#comment-form input[type=url]').val(null);
                $('#comment-form textarea').val(null);
                $('#comment-form').loader('hide');
                $('#commentSuccessAlert').fadeIn(100, function () {
                    setTimeout(function () {
                        $('#commentSuccessAlert').fadeOut(500);
                    }, 5000);
                });


            });
            return false;
        });
    });
</script>
@stop