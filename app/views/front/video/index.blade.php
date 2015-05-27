@extends('front.partials.nothome')

@section('styles')
<style type="text/css">
    .img-blog{
        background-size:cover; 
        background-position:center center; 
        background-repeat:no-repeat;
    }
    .img-blog.img-dest{
        width: 270px;
        height: 220px; 
    }
</style>
@stop

@section('content')
<div class="row">

    <!-- Gallery Items
    ================================================== --> 
    <div class="span9 gallery">
        <h2>Photo Gallery</h2>
        <div class="row clearfix">
            <ul class="gallery-post-grid holder">
                @foreach($videos as $vid)
                <?php $image = 'http://img.youtube.com/vi/'.$vid->filename.'/0.jpg'; ?>
                <li  class="span3 gallery-item" data-id="id-{{$vid->id}}" data-type="illustration">
                    <a href="http://www.youtube.com/watch?v={{$vid->filename}}" rel="prettyPhoto" class="lightbox">
                        <img class="img-blog img-dest " style="background-image: url('{{$image}}');"  >
                    </a>
                    <span class="project-details"><a href="front/dest/show/{{$vid->id}}">{{$vid->title}}</a></span>
                </li>
                @endforeach
            </ul>
        </div>

    </div><!-- End gallery list-->

    <div class="span3 sidebar page-sidebar">
        <!--Search-->
        @if($constval['show_search_input']=='Y')
        @include('front.partials.search')
        @endif

        <!--CUSTOMER SUPPORT-->
        @if($constval['show_customer_support']=='Y')
        <!--        CUSTOMER SERVICE -->
        <h5 class="title-bg">Customer Support</h5>        
        <address style="position: relative;">
            <img   src="frontend/img/ctcus.png" />
            <h2 style="position: absolute;left:10px;top:50%;">{{$constval['phone']}}</h2>
        </address>    
        <br/>
        @if($constval['ym_show']=='Y')
        <address style="text-align: center;">
            <a href="ymsgr:SendIM?yahuuy">
                <img border="0" src="http://opi.yahoo.com/online?u={{$constval['ym']}}&amp;m=g&amp;t=14" />
            </a>
<!--            <strong>Jimmy Doe</strong><br>
        <a href="mailto:#">first.last@gmail.com</a>-->
        </address>
        @endif
        @endif
        
        <!--BANNER-->
         @if($constval['show_side_banner']=='Y')
        <!--BAnner Ads-->
        <h5 class="title-bg">{{$constval['side_banner_title']}}</h5> 
        <address>
            <img src="images/banner/payment.jpg"/>
        </address>
        @endif


    </div>

</div><!-- End container row -->
@stop

@section('scripts')
<script src="js/jquery.quicksand.js"></script>
@stop