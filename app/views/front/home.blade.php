@extends('front.partials.homemaster')

@section('styles')
@stop

@section('content')
<div class="row headline"><!-- Begin Headline -->

    <style>
        @media only screen and (min-width: 959px) {
            .slides img {
                max-width: 770px;
                max-height: 354px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                background: none;

            }
            .flexslider{
                border: solid 7px whitesmoke;
                -moz-box-shadow: 1px 1px 5px #999; -webkit-box-shadow: 1px 1px 5px #999; box-shadow: 1px 1px 5px #999;
            }
        }

        .img-blog-slider{
            width: 370px;
            height: 220px; 
            background-size:cover; 
            background-position:center center; 
            background-repeat:no-repeat;
        }
    </style>

    <!-- Slider Carousel
    ================================================== -->
    <div class="span8">
        <div class="flexslider">
            <ul class="slides">
                @foreach($sliders as $sld)
                <li><a href="#"><img src="{{$constval['img_slider_path'].$sld->filename}}" alt="slider" /></a></li>
                @endforeach

            </ul>
        </div>
    </div>

    <!-- Headline Text
    ================================================== -->
    <div class="span4">
        <h3>{{$homepage['welcome_title']['big_value']}}</h3>
        <p class="lead">{{$homepage['welcome_subtitle']['big_value']}}</p>
    </div>
</div><!-- End Headline -->

<div class="row">
    <div class="span8" >

        @if($homepage['show_fav_dest']['value']=='Y')
        <h5 class="title-bg">Favourite Travel Packs
            <small></small>
            <button class="btn btn-mini btn-inverse hidden-phone" type="button">more travel packs</button>
        </h5>
        <!-- Destination Thumbnails
        ================================================== -->
        <div class="row clearfix no-margin">
            <ul class="gallery-post-grid holder">

                <!-- Gallery Item 1 -->
                @foreach($favtrav as $ft)
                <li  class="span2 gallery-item" data-id="id-1" data-type="illustration">
                    <span class="gallery-hover-6col hidden-phone hidden-tablet">
                        <span class="gallery-icons">
                            @if($ft->islocal == 'Y')
                            <a href="{{$constval['travelpack_img_path'].$ft->filename}}" class="item-zoom-link lightbox" title="{{$ft->nama}}" data-rel="prettyPhoto"></a>
                            @else
                            <a href="{{$ft->filename}}" class="item-zoom-link lightbox" title="{{$ft->nama}}" data-rel="prettyPhoto"></a>
                            @endif
                            <a href="gallery-single.htm" class="item-details-link"></a>
                        </span>
                    </span>
                    <a href="gallery-single.htm" >
                        @if($ft->islocal == 'Y')
                        <img src="{{$constval['travelpack_img_path'].$ft->filename}}" alt="Gallery">
                        @else
                        <img style="width: 170px;height: 139px; background-size:cover; background-position:center center; background-repeat:no-repeat; background-image:url('{{$ft->filename}}');" >
                        @endif
                    </a>
                    <span class="project-details"><a href="gallery-single.htm">{{$ft->nama}}</a>
                        @if($ft->currency == $constval['default_currency'])
                        {{$ft->currency}}  {{$ft->harga}}
                        @else
                        <a class="label" style="text-align: right;padding: 5px;">{{$constval['default_currency']}}  {{number_format($ft->harga * $constval['to_'.$constval['default_currency']], 2, '.', ',')}}</a>
                        @endif
                    </span>
                </li>
                @endforeach

            </ul>
        </div>
        @endif

        @if($homepage['show_hotel']['value']=='Y')
        <h5 class="title-bg">Best deal hotels
            <small></small>
            <button class="btn btn-mini btn-inverse hidden-phone" type="button">more hotels</button>
        </h5>
        <!-- Hotel Thumbnails
        ================================================== -->
        <div class="row clearfix no-margin">
            <ul class="gallery-post-grid holder">
                <!-- Gallery Item 1 -->
                @foreach($hotels as $htl)
                <li  class="span2 gallery-item" data-id="id-1" data-type="illustration">
                    <span class="gallery-hover-6col hidden-phone hidden-tablet">
                        <span class="gallery-icons">
                            @if($htl->islocal == 'Y')
                            <a href="{{$constval['hotel_img_path'].$htl->filename}}" class="item-zoom-link lightbox" title="{{$htl->nama}}" data-rel="prettyPhoto"></a>
                            @else
                            <a href="{{$htl->filename}}" class="item-zoom-link lightbox" title="{{$htl->nama}}" data-rel="prettyPhoto"></a>
                            @endif
                            <a href="gallery-single.htm" class="item-details-link"></a>
                        </span>
                    </span>
                    <a href="gallery-single.htm">
                        @if($htl->islocal == 'Y')
                        <img src="{{$constval['hotel_img_path'].$htl->filename}}" alt="Gallery">
                        @else                        
                        <img style="width: 170px;height: 139px; background-size:cover; background-position:center center; background-repeat:no-repeat; background-image:url('{{$htl->filename}}');" >
                        @endif
                    </a>
                    <span class="project-details"><a href="gallery-single.htm">{{$htl->nama  }}</a></span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif


        @if($homepage['show_car']['value']=='Y')
        <h5 class="title-bg">Best deal car rental
            <small></small>
            <button class="btn btn-mini btn-inverse hidden-phone" type="button">more cars</button>
        </h5>        
        <!-- Car Rental Thumbnails
        ================================================== -->
        <div class="row clearfix no-margin">
            <ul class="gallery-post-grid holder">
                <!-- Gallery Item 1 -->
                @foreach($rentals as $rntl)
                <li  class="span2 gallery-item" data-id="id-1" data-type="illustration">
                    <span class="gallery-hover-6col hidden-phone hidden-tablet">
                        <span class="gallery-icons">
                            @if($rntl->islocal =='Y')
                            <a href="{{$constval['rental_img_path'].$rntl->filename}}" class="item-zoom-link lightbox" title="Custom Illustration" data-rel="prettyPhoto"></a>
                            @else
                            <a href="{{$rntl->filename}}" class="item-zoom-link lightbox" title="Custom Illustration" data-rel="prettyPhoto"></a>
                            @endif
                            <a href="gallery-single.htm" class="item-details-link"></a>
                        </span>
                    </span>
                    <a href="gallery-single.htm">
                        @if($rntl->islocal =='Y')
                        <img src="{{$constval['rental_img_path'].$rntl->filename}}" alt="Gallery">
                        @else
                        <img style="width: 170px;height: 139px; background-size:cover; background-position:center center; background-repeat:no-repeat; background-image:url('{{$rntl->filename}}');" >
                        @endif
                    </a>
                    <span class="project-details"><a href="gallery-single.htm">{{$rntl->nama}}</a>

                    </span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        @if($constval['show_main_banner']=='Y')
        <div class="row clearfix ">
            <div class="span12 ">
                <img src="images/banner/hosting.gif"/>
            </div>
        </div>
        @endif
    </div>

    <div class="span4 sidebar page-sidebar"><!-- Begin sidebar column -->
       
        @if($constval['show_search_input']=='Y')
        @include('front.partials.search')
        @endif

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

        @if($homepage['show_sidenav']['value']=='Y')
        <!--        RIGHT NAVIGATION-->
        <h5 class="title-bg">Explore us</h5>        
        <ul class="popular-posts">
            <li>
                <a href="#"><img src="frontend/img/icon/find-dest.png" alt="Popular Post"></a>
                <h6><a href="#">{{$homepage['sidenav_find_destination']['value']}}</a></h6>
                <em>{{$homepage['sidenav_find_destination_subtitle']['value']}}</em>
            </li>
            <li>
                <a href="#"><img src="frontend/img/icon/news.png" alt="Popular Post"></a>
                <h6><a href="#">{{$homepage['sidenav_read_news']['value']}}</a></h6>
                <em>{{$homepage['sidenav_read_news_subtitle']['value']}}</em>
            <li>
                <a href="#"><img src="frontend/img/icon/ticket.png" alt="Popular Post"></a>
                <h6><a href="#">{{$homepage['sidenav_buy_travel']['value']}}</a></h6>
                <em>{{$homepage['sidenav_buy_travel_subtitle']['value']}}</em>
            </li>
            <li>
                <a href="#"><img src="frontend/img/icon/what-they-say.png" alt="Popular Post"></a>
                <h6><a href="#">{{$homepage['sidenav_wts']['value']}}</a></h6>
                <em>{{$homepage['sidenav_wts_subtitle']['value']}}</em>
            </li>
        </ul>
        @endif

        @if($constval['show_side_banner']=='Y')
        <!--BAnner Ads-->
        <h5 class="title-bg">{{$constval['side_banner_title']}}</h5> 
        <address>
            <img src="images/banner/payment.jpg"/>
        </address>
        @endif

    </div><!-- End sidebar column -->

</div>

<div class="row"><!-- Begin Bottom Section -->

    <!-- Blog Preview
    ================================================== -->
    <div class="span6">

        @if($homepage['show_blog_slider']['value']=='Y')
        <h5 class="title-bg">From the Blog 
            <small>All the latest news</small>
            <button id="btn-blog-next" class="btn btn-inverse btn-mini" type="button">&raquo;</button>
            <button id="btn-blog-prev" class="btn btn-inverse btn-mini" type="button">&laquo;</button>
        </h5>

        <div id="blogCarousel" class="carousel slide ">
            <!-- Carousel items -->
            <div class="carousel-inner">
                <?php $idx=0; ?>
                @foreach($blogs as $blg)
                <!-- Blog Item 1 -->
                <div class="{{($idx==0?'active':'')}} item">
                    <a href="front/blog/show/{{$blg->id}}">
                        <?php $idx++; ?>
                        @if($blg->islocal == 'Y')
                        <?php $image = URL::to($constval['img_blog_path'] . $blg->img_cover); ?>
                        @else
                        <?php $image = $blg->img_cover; ?>
                        @endif
                        <img style="background-image: url('{{$image}}');"  class="align-left blog-thumb-preview img-blog-slider" />

                    </a>
                    <div class="post-info clearfix">
                        <h6 style="margin-top: 0;padding-top: 0;" ><a href="front/blog/show/{{$blg->id}}">{{$blg->title}}</a></h6>
                        <ul class="blog-details-preview">
                            <li><i class="icon-calendar"></i><strong>Posted on:</strong> <?php echo date('M d, Y', strtotime($blg->created_at)); ?> <li>
                            <li><i class="icon-user"></i><strong>Posted by:</strong> <a href="#" title="Link">{{$blg->username}}</a><li>
                            <li><i class="icon-comment"></i><strong>Comments:</strong> <a href="#" title="Link">12</a><li>
                            <li><i class="icon-tags"></i> <a href="front/blog/by-kategori/{{$blg->category_id}}">{{$blg->kategori}}</a>
                        </ul>
                    </div>
                    <p class="blog-summary">{{$blg->min_content}}<a href="#">Read more</a><p>
                </div>
                @endforeach
            </div>
        </div> 
        @endif
    </div>

    <!-- Client Area
    ================================================== -->
    <div class="span6">

        @if($homepage['show_testimony']['value']=='Y')
        <h5 class="title-bg">Recent Clients
            <small>That love us</small>
            <button id="btn-client-next" class="btn btn-inverse btn-mini" type="button">&raquo;</button>
            <button id="btn-client-prev" class="btn btn-inverse btn-mini" type="button">&laquo;</button>
        </h5>

        <!-- Client Testimonial Slider-->
        <div id="clientCarousel" class="carousel slide no-margin">
            <!-- Carousel items -->
            <div class="carousel-inner">
                <?php $tstidx = 0; ?>
                @foreach($testimoni as $tst)
                <div class="item {{$tstidx==0?'active':''}}">
                    <p class="quote-text">"{{$tst->message}}."<cite>- {{$tst->nama}}, {{$tst->country}}</cite></p>
                </div>
                <?php $tstidx++; ?>
                @endforeach
            </div>
        </div>
        @endif

    </div>

</div><!-- End Bottom Section -->
@stop

@section('scripts')
<script>
    $(document).ready(function(){
       
    });
</script>
@stop