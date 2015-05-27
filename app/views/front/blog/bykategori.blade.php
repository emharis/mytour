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

        <h2>Blogs on {{$category->name}}</h2>
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
                    <img class="img-blog img-thumb" style="background-image: url('{{$imgpath}}')" >
                </a>
                <h6><a href="front/blog/show/{{$pop->id}}">{{$pop->title}}</a></h6>
                <em>Posted on {{date_format(new DateTime($pop->created_at),'m/d/Y')}}</em>
            </li>
            @endforeach
        </ul>

        <!--Tabbed Content-->
        <h5 class="title-bg">More Info</h5>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#comments" data-toggle="tab">Comments</a></li>
            <li><a href="#tweets" data-toggle="tab">Tweets</a></li>
            <li><a href="#about" data-toggle="tab">About</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="comments">
                <ul>
                    <li><i class="icon-comment"></i>admin on <a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li><i class="icon-comment"></i>admin on <a href="#">Consectetur adipiscing elit</a></li>
                    <li><i class="icon-comment"></i>admin on <a href="#">Ipsum dolor sit amet consectetur</a></li>
                    <li><i class="icon-comment"></i>admin on <a href="#">Aadipiscing elit varius elementum</a></li>
                    <li><i class="icon-comment"></i>admin on <a href="#">ulla iaculis mattis lorem</a></li>
                </ul>
            </div>
            <div class="tab-pane" id="tweets">
                <ul>
                    <li><a href="#"><i class="icon-share-alt"></i>@room122</a> Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna.</li>
                    <li><a href="#"> <i class="icon-share-alt"></i>@room122</a> Nulla faucibus ligula eget ante varius ac euismod odio placerat.</li>
                    <li><a href="#"> <i class="icon-share-alt"></i>@room122</a> Pellentesque iaculis lacinia leo. Donec suscipit, lectus et hendrerit posuere, dui nisi porta risus, eget adipiscing</li>
                    <li><a href="#"> <i class="icon-share-alt"></i>@room122</a> Vivamus augue nulla, vestibulum ac ultrices posuere, vehicula ac arcu.</li>
                    <li><a href="#"> <i class="icon-share-alt"></i>@room122</a> Sed ac neque nec leo condimentum rhoncus. Nunc dapibus odio et lacus.</li>
                </ul>
            </div>
            <div class="tab-pane" id="about">
                <p>Enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.</p>

                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
            </div>
        </div>

        <!--Video Widget-->
        <h5 class="title-bg">Video Widget</h5>
        <iframe src="http://player.vimeo.com/video/24496773" width="370" height="208"></iframe>
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