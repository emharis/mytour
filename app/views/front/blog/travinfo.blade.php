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
<div class="row">

    <!-- Blog Posts
    ================================================== --> 
    <div class="span8 blog">
        <br/>
        <!-- Blog Post 1 -->
        @foreach($blogs as $blg)
        <article>
            <h4 class="title-bg"><a href="front/blog/show/{{$blg->id}}">{{$blg->title}}</a></h4>
            <div class="post-summary">
                <a href="front/blog/show/{{$blg->id}}">
                    @if($blg->islocal == 'Y')
                    <?php $imgpath = URL::to($constval['img_blog_path'] . $blg->img_cover); ?>
                    @else
                    <?php $imgpath = $blg->img_cover; ?>
                    @endif
                    <img class="img-blog img-header" style="background-image: url('{{$imgpath}}')" >
                </a>
                <p>{{$blg->min_content}}</p>
                <div class="post-summary-footer">
                    <a href="front/blog/show/{{$blg->id}}" class="btn btn-small btn-inverse" type="button">Read more</a>
                    <ul class="post-data">
                        <li><i class="icon-calendar"></i> {{date_format(new DateTime($blg->created_at),'m/d/Y')}}</li>
                        <li><i class="icon-user"></i> <a href="front/blog/by-author/{{$blg->category_id}}">Admin</a></li>
                        <li><i class="icon-comment"></i> <a href="front/blog/show/{{$blg->id}}#comment-here">{{$blg->comments}} Comments</a></li>
                        <li><i class="icon-tags"></i> <a href="front/blog/by-kategori/{{$blg->category_id}}">{{$blg->kategori}}</a></li>
                    </ul>
                </div>
            </div>
        </article>
        @endforeach

        <!-- Pagination -->
        <div class="pagination">
            {{ $blogs->links() }}
        </div>
        <div class="clearfix" ></div>
        <br/>
    </div>

    <!-- Blog Sidebar
    ================================================== --> 
    <div class="span4 page-sidebar sidebar">
        @if($constval['show_search_input']=='Y')
        @include('front.partials.search')
        @endif

        <!--Categories-->
        <h5 class="title-bg">Categories</h5>
        <ul class="post-category-list">
            @foreach($categories as $cat)
            <li><a href="front/blog/by-kategori/{{$cat->id}}"><i class="icon-plus-sign"></i>{{$cat->name}}</a></li>
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
<script>
    $(document).ready(function () {
        //rubah » jadi next
        $('.pagination ul li:first a').text('Prev');
        $('.pagination ul li:first.disabled span').text('Prev');
        $('.pagination ul li:last a').text('Next');
        $('.pagination ul li:last.disabled span').text('Next');
    });
</script>
@stop