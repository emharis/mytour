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
        <h2>Destination in {{$destinasi->kategori}}: {{$destinasi->nama}}</h2>
        <!-- Blog Post 1 -->
        <article>
            <!--            <h3 class="title-bg"><a></a></h3>-->
            <div class="post-content">
                <a href="front/dest/show/{{$destinasi->id}}">

                    @if($destinasi->islocal =='Y')
                    <?php $imgpath = URL::to($constval['destinasi_img_path'] . $destinasi->main_img); ?>
                    @else
                    <?php $imgpath = $destinasi->main_img; ?>
                    @endif
                    <img class="img-blog img-header" style="background-image: url('{{$imgpath}}')">
                </a>

                <div class="post-body">
                    {{$destinasi->desc}}
                </div>
            </div>
        </article>

    </div><!--Close container row-->

    <!-- Blog Sidebar
    ================================================== --> 
    <div class="span4 sidebar page-sidebar">
        <!--Search-->
        @if($constval['show_search_input']=='Y')
        @include('front.partials.search')
        @endif

        <!--Categories-->
        <h5 class="title-bg">Destinations</h5>
        <ul class="post-category-list">
            @foreach($kategoris as $kat)
            <li><a href="front/dest/kategori/{{$kat->id}}"><i class="icon-plus-sign"></i>{{$kat->nama}}</a></li>
            @endforeach
        </ul>

        <!--Popular Posts-->
        <h5 class="title-bg">Others in {{$destinasi->kategori}}</h5>
        <ul class="popular-posts">
            @foreach($destinasiIn as $dest)
                @if($dest->islocal =='Y')
                <?php $imgpath = URL::to($constval['destinasi_img_path'] . $dest->main_img); ?>
                @else
                <?php $imgpath = $dest->main_img; ?>
                @endif
            <li>
                <a href="#">
                    <img class="img-blog img-thumb" style="background-image: url('{{$imgpath}}');" />
                </a>
                <h6><a href="front/dest/show/{{$dest->id}}">{{$dest->nama}}</a></h6>
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