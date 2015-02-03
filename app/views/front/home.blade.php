@extends('front.partials.master')

@section('main-content')
<!-- BEGIN #slider -->
<div id="slider-elastic" class="slider elastic ei-slider" style="width: 100%; height: 400px;">
    <div class="ei-slider-loading">Loading</div>
    <ul class="ei-slider-large">
        <?php $sldnum = 0; ?>
        <?php $sldcount = count($sliders); ?>
        @foreach($sliders as $sld)
        <li class="{{'count_'.$sldcount}} {{($sldnum++ == 1 ? 'first': ($sldnum == $sldcount ? 'last':''))}} {{'num_'.$sldnum}} slide-{{$sldnum}} slide">
            <a href="{{$sld->link}}" target="_blank"><img src="images/slider/{{$sld->img_name}}" alt="sci11" title="sci11" /></a>
            <div class="ei-title">
                <h2 style="color: white;"><a style="color: white;" href="{$sld->link}}" target="_blank">{{$sld->title}}</a></h2>
                <h3 style="color: white;" >{{$sld->subtitle}}</h3>
            </div>
        </li>
        @endforeach
    </ul>
    <!-- ei-slider-large -->
    <ul class="ei-slider-thumbs">
        <li class="ei-slider-element">Current</li>
        @foreach($sliders as $sld)
        <li><a href="frnt/#">{{$sld->subtitle}} </a><img src="images/slider/{{$sld->img_name}}" alt=" - " /></li>
        @endforeach
    </ul>
    <!-- ei-slider-thumbs -->    
    <div class="shadow"></div>
</div>
<!-- ei-slider -->    
<!-- END #slider -->
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#slider-elastic.elastic').eislideshow({
            easing: 'easeOutExpo',
            titleeasing: 'easeOutExpo',
            titlespeed: 1200,
            autoplay: true,
            slideshow_interval: 3000,
            speed: 800,
            animation: 'sides'
        });
    });
</script>

<!-- START PRIMARY -->
<div id="primary" class="sidebar-right">
    <div class="inner group">
        <!-- START CONTENT -->
        <div id="content-home" class="content group">
            <div class="page type-page status-publish hentry group">
                {{str_replace('../', '', $homepage->welcome_say)}}
                <div class="border-line"></div>	      
            </div>
            <!-- START COMMENTS -->
            <div class="page type-page status-publish hentry group">
                <h2>Favourite Destination</h2>

                <div class="one-fourth ">
                    <p><a   href="images/home-vi/dd2.jpg"><img style="width: 186px; height: 123px;" src="frnt/images/home-vi/dd2.jpg" alt="" /></a></p>
                    <h3>Open Trip, Tour Kawah Ijen Bluefire 2D1N</h3>
                    <p>Nunc felis urna, mattis non blandit vitae, porttitor ac enim. Nunc scelerisque sagittis sollicitudin nam gravida blandir optesimer.</p>
                </div>

                <div class="one-fourth ">

                    <p><a href="images/home-vi/00213.jpg"><img style="width: 186px; height: 123px;" src="frnt/images/home-vi/00213.jpg" alt="" /></a></p>
                    <h3>Open Trip, Tour Kawah Ijen Bluefire 2D1N</h3>   
                    <p>Nunc felis urna, mattis non blandit vitae, porttitor ac enim. Nunc scelerisque sagittis sollicitudin nam gravida blandir optesimer.</p>
                </div>

                <div class="one-fourth ">
                    <p><a href="images/home-vi/00315.jpg"><img style="width: 186px; height: 123px;" src="frnt/images/home-vi/00315.jpg" alt="" /></a></p>
                    <h3>Open Trip, Tour Kawah Ijen Bluefire 2D1N</h3>
                    <p>Nunc felis urna, mattis non blandit vitae, porttitor ac enim. Nunc scelerisque sagittis sollicitudin nam gravida blandir optesimer.</p>
                </div>

                <div class="one-fourth last">
                    <p><a href="images/home-vi/0048.jpg"><img style="width: 186px; height: 123px;" src="frnt/images/home-vi/0048.jpg" alt="" /></a></p>
                    <h3>Open Trip, Tour Kawah Ijen Bluefire 2D1N</h3>
                    <p>Nunc felis urna, mattis non blandit vitae, porttitor ac enim. Nunc scelerisque sagittis sollicitudin nam gravida blandir optesimer.</p>
                </div>

            </div>
            <div class="border-line"></div>	
            <div class="page type-page status-publish hentry group">
                <h2>Best Deal Hotels</h2>

                <div class="one-fourth ">
                    <p><a href="images/home-vi/dd2.jpg"><img style="width: 186px; height: 123px;" src="http://nusantaratrip.com/wp-content/uploads/2013/09/Kamar_cozzy1.jpg" alt="" /></a></p>
                    <h3>Open Trip, Tour Kawah Ijen Bluefire 2D1N</h3>
                    <p>Nunc felis urna, mattis non blandit vitae, porttitor ac enim. Nunc scelerisque sagittis sollicitudin nam gravida blandir optesimer.</p>
                </div>

                <div class="one-fourth ">

                    <p><a href="images/home-vi/00213.jpg"><img style="width: 186px; height: 123px;" src="http://nusantaratrip.com/wp-content/uploads/2013/09/media-2012-03-31-deluxe-714-440x294.jpg" alt="" /></a></p>
                    <h3>Open Trip, Tour Kawah Ijen Bluefire 2D1N</h3>   
                    <p>Nunc felis urna, mattis non blandit vitae, porttitor ac enim. Nunc scelerisque sagittis sollicitudin nam gravida blandir optesimer.</p>
                </div>

                <div class="one-fourth ">
                    <p><a href="images/home-vi/00315.jpg"><img style="width: 186px; height: 123px;" src="http://nusantaratrip.com/wp-content/uploads/2013/09/det_4_Suite-Room-1_20120204092958-440x279.jpg" alt="" /></a></p>
                    <h3>Open Trip, Tour Kawah Ijen Bluefire 2D1N</h3>
                    <p>Nunc felis urna, mattis non blandit vitae, porttitor ac enim. Nunc scelerisque sagittis sollicitudin nam gravida blandir optesimer.</p>
                </div>

                <div class="one-fourth last">
                    <p><a href="images/home-vi/0048.jpg"><img style="width: 186px; height: 123px;" src="http://nusantaratrip.com/wp-content/uploads/2013/09/facility-3-440x293.jpg" alt="" /></a></p>
                    <h3>Open Trip, Tour Kawah Ijen Bluefire 2D1N</h3>
                    <p>Nunc felis urna, mattis non blandit vitae, porttitor ac enim. Nunc scelerisque sagittis sollicitudin nam gravida blandir optesimer.</p>
                </div>

            </div>
            <div class="border-line"></div>	
            <!-- END COMMENTS -->
            <div class="page type-page status-publish hentry group">
                <h2>Our customers say..</h2>
                <div class="testimonials-slider">
                    <ul class="testimonials group">
                        @foreach($testimonis as $tst)
                        <li>
                            <blockquote>
                                <p><a href="front/testimoni/show/{{$tst->id}}">&rdquo;<?php echo substr($tst->message, 0, 100) ?>[...]&rdquo;</a></p>
                            </blockquote>
                            <p class="meta"><strong><a href="frnt/testimonial.html" class="name">{{$tst->nama}}</a></strong>  - <a href="{{$tst->website}}">{{$tst->company}}</a></p>
                        </li>
                        @endforeach
                    </ul>
                    <div class="prev"></div>
                    <div class="next"></div>
                </div>
                <script type="text/javascript">
                    jQuery(function ($) {
                        $('.testimonials-slider ul').cycle({
                            fx: 'scrollHorz',
                            speed: 500,
                            timeout: 5000,
                            next: '.testimonials-slider .next',
                            prev: '.testimonials-slider .prev'
                        });
                    });
                </script>
            </div>
        </div>
        <!-- END CONTENT -->
        <!-- START SIDEBAR -->
        <div class="sidebar group">

            <div class="widget-first widget popular-posts">
                <h3>Explore us</h3>
            </div>

            @if($homepage->find_a_dest_show=='Y')
            <div class="widget widget-icon-text group">
                <a href="front/destination" ><img class="icon-img" src="frnt/images/icons/find-dest.png" alt="" /></a>
                <a href="front/destination" ><h3>{{$homepage->find_a_dest_head}}</h3></a>
                <p>{{$homepage->find_a_dest_desc}}</p>
            </div>
            @endif
            @if($homepage->read_news_show=='Y')
            <div class="widget widget-icon-text group">
                <a href="front/blog"><img class="icon-img" src="frnt/images/icons/news.png" alt="" /></a>
                <a href="front/blog"><h3>{{$homepage->read_news_head}}</h3></a>
                <p>{{$homepage->read_news_desc}}</p>
            </div>
            @endif
            @if($homepage->buy_travel_guide_show=='Y')
            <div class="widget widget-icon-text group">
                <a href="front/book"><img class="icon-img" src="frnt/images/icons/ticket.png" alt="" /></a>
                <a href="front/book"><h3>{{$homepage->buy_travel_guide_head}}</h3></a>
                <p>{{$homepage->buy_travel_guide_desc}}</p>
            </div>
            @endif
            @if($homepage->what_they_say_show=='Y')
            <div class="widget widget-icon-text group">
                <a href="front/testimoni"><img class="icon-img" src="frnt/images/icons/what-they-say.png" alt="" /></a>
                <a href="front/testimoni"><h3>{{$homepage->what_they_say_head}}</h3></a>
                <p>{{$homepage->what_they_say_desc}}</p>
            </div>
            @endif

            <div class="border-line"></div>	
            <div class="widget-first widget popular-posts">
                <h3>Contact Us</h3>
            </div>
                <!--<div class="text-image" style="text-align:left"><img src="frnt/images/callus.gif" alt="Customer Support" /></div>-->

            @if($contactpage->ym_visible == 'Y')
            <div class="text-image" style="text-align:center">
                <a href="ymsgr:SendIM?{{$contactpage->ym}}">
                    <img border=0 src="http://opi.yahoo.com/online?u={{$contactpage->ym}}&m=g&t=14"></a>
            </div>
            @endif
            <div class="clear"></div>
            <p>{{$contactpage->customer_support_desc}} </p>
            
            <div class="sidebar-nav">
                    <ul>
                        <li>
                            <i class="icon-info-sign" style="color:#979797;font-size:20pxpx"></i> Phone: 0823156431
                        </li>
                        <li>
                            <i class="icon-print" style="color:#979797;font-size:20pxpx"></i> Fax: 031653465
                        </li>
                        <li>
                            <i class="icon-envelope" style="color:#979797;font-size:20pxpx"></i> Email: info@telusurindonesia.com
                        </li>
                    </ul>
                </div>
        </div>
        <!-- END SIDEBAR -->
        <!-- START EXTRA CONTENT -->
        <!-- END EXTRA CONTENT -->
    </div>
</div>
<!-- END PRIMARY -->
@stop