<div class="footer-container"><!-- Begin Footer -->
    <div class="container">
        <div class="row footer-row">
            <div class="span3 footer-col">
                <h5>About Us</h5>
                <img src="frontend/img/{{$constval['footer_logo']}}" alt="{{$constval['web_title']}}" /><br /><br />
                <address>
                    <strong>Office</strong><br />
                    {{$constval['address']}}<br />
                    {{$constval['phone']}}<br />
                    {{$constval['email']}}<br />
                </address>
                <ul class="social-icons">
                    @if($constval['fb_show']=='Y')
                    <li><a target="_blank" href="http://www.facebook.com/{{$constval['fb']}}" class="social-icon facebook"></a></li>
                    @endif
                    @if($constval['twitter_show']=='Y')
                    <li><a href="http://www.twitter.com/{{$constval['twitter']}}" class="social-icon twitter"></a></li>
                    @endif
                    <!--                            <li><a href="#" class="social-icon dribble"></a></li>
                                                <li><a href="#" class="social-icon rss"></a></li>
                                                <li><a href="#" class="social-icon forrst"></a></li>-->
                </ul>
            </div>
            <div class="span3 footer-col">
                <h5>Latest Comments</h5>
                <ul>
                    <li><a href="#">@udin_sedunia</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                    <li><a href="#">@layla_majnun</a> In interdum felis fermentum ipsum molestie sed porttitor ligula rutrum. Morbi blandit ultricies ultrices.</li>
                    <li><a href="#">@roket_rocketerz</a> Vivamus nec lectus sed orci molestie molestie. Etiam mattis neque eu orci rutrum aliquam.</li>
                </ul>
                <!--                        <h5>Latest Tweets</h5>
                                        <ul>
                                            <li><a href="#">@room122</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                            <li><a href="#">@room122</a> In interdum felis fermentum ipsum molestie sed porttitor ligula rutrum. Morbi blandit ultricies ultrices.</li>
                                            <li><a href="#">@room122</a> Vivamus nec lectus sed orci molestie molestie. Etiam mattis neque eu orci rutrum aliquam.</li>
                                        </ul>-->
            </div>
            <div class="span3 footer-col">
                <h5>Latest Posts</h5>
                <ul class="post-list">
                    @foreach($lastposts as $lp)
                    <li><a href="#">{{$lp->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            <style>
                .with-bg-size
                {
                    background-image:url();
                    width: 60px;
                    height: 60px;
                    background-position: center;
                    background-size: cover;
                }
            </style>
            <div class="span3 footer-col">
                <h5>Gallery</h5>
                <ul class="img-feed">
                    @foreach($randgals as $gal)
                    @if($gal->isexternal == 'Y')
                    <li><a href="{{$gal->filename}}" data-rel="prettyPhoto" class="photozoom" title="{{$gal->title}}">
                            <div class="with-bg-size" rel="{{$gal->filename}}"></div>
                        </a></li>                            
                    @else
                    @if($gal->type =='I')
                    <!--image item-->
                    <li>
                        <a href="{{URL::to('/') . '/' . $constval['img_gallery_path'].$gal->filename}}" data-rel="prettyPhoto" class="photozoom" title="{{$gal->title}}">
                            <div class="with-bg-size" rel="{{URL::to('/') . '/' . $constval['img_gallery_path'].$gal->filename}}"></div>
                        </a>
                    </li>                            
                    @else
                    <!--video item-->
                    <!--<li><a href="#" class="lightbox" data-rel="prettyPhoto" ><img src="{{$constval['video_gallery_path'].$gal->filename}}" alt="Image Feed"></a></li>-->                            
                    @endif                            
                    @endif                            
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row"><!-- Begin Sub Footer -->
            <div class="span12 footer-col footer-sub">
                <div class="row no-margin">
                    <div class="span6"><span class="left">Copyright 2012 Piccolo Theme. All rights reserved.</span></div>
                    <div class="span6">
                        <span class="right">
                            @for($i=0;$i<count($menus);$i++)
                                @if($menus[$i]['position']=='B' || $menus[$i]['position']=='A' )
                                <a href="{{$menus[$i]['link']}}">{{$menus[$i]['nama']}}</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                @endif
                                @endfor
                        </span>
                    </div>
                </div>
            </div>
        </div><!-- End Sub Footer -->
    </div>
</div><!-- End Footer --> 