@extends('front.partials.master')

@section('main-content')
<div id="page-meta">
    <div class="inner group">
        <h3>{{$destkat->nama}}</h3>
        <h4>{{$destkat->subtitle}}</h4>
    </div>
</div>
<div id="primary" class="sidebar-no">
    <div class="inner group">
        <!-- START CONTENT -->
        <div id="content-page" class="content group">
            <div class="hentry group">
                <div id="portfolio" class="portfolio-filterable">
                    <div id="portfolio-gallery" class="internal_page_items internal_page_gallery">
                            <ul id="portfolio" class="three-columns infinite-scroll">
                            <?php $idx=1; ?>
                             @foreach($dests as $dst)
                             <li class="{{($idx==1 ? 'first':'')}} one-third {{($idx==3 ? 'group last':'')}}">
                                <div class="overlay_a">
                                    <div class="overlay_wrapper">
                                        <img src="{{$dst->img_path}}" style="width: 364px;height: 162px;" alt="{{$dst->nama}}" title="{{$dst->nama}}" />										
                                        <div class="overlay">
                                            <a class="overlay_project" href="front/destination/show/{{$dst->id}}" style="width: 100%;background-position-x: center;" ></a>
                                            <span class="overlay_title">{{$dst->nama}}</span>
                                        </div>
                                    </div>
                                </div>
                                <h4><a href="front/destination/show/{{$dst->id}}">{{$dst->nama}}</a></h4>                      
                            </li>
                            <?php $idx++; ?>
                            @endforeach
                            
                            
                            <a class="jscroll-next" href="{{URL::to('front/destination/kategoripager' )}}/{{$destkat->id}}?page=2" >Next</a>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <!-- START COMMENTS -->
            <div id="comments">
            </div>
            <!-- END COMMENTS -->
        </div>
        <!-- END CONTENT -->
        <!-- START EXTRA CONTENT -->
        <!-- END EXTRA CONTENT -->
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        $('.infinite-scroll').jscroll({
            loadingHtml: '<img src="loading.gif" alt="Loading" /> Loading...',
            nextSelector: '.jscroll-next',
            autoTrigger:true,
            padding:20
        });
    });
</script>
@stop