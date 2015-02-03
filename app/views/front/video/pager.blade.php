<?php $idx = 1; ?>
@foreach($videos as $pht)
<li class="{{($idx==1?'first':'')}} {{($idx==3?'last group':'')}} one-third">
    <div class="overlay_a">
        <div class="overlay_wrapper">
            <img  alt="0082" title="0082"  src="http://img.youtube.com/vi/{{$pht->img_path}}/0.jpg">
            <div class="overlay">
                <a class="overlay_video example6" href="http://www.youtube.com/embed/{{$pht->img_path}}" rel="lightbox" title="" style="width: 100%;background-position-x: center;"></a>
                <span class="overlay_title">{{$pht->desc}} </span>
            </div>
        </div>
    </div>
    <h4><a >{{$pht->desc}} </a></h4>
</li>
<?php $idx++; ?>
@if($idx>3)
<?php $idx = 1; ?>
@endif
@endforeach

<br/>
@if($videos->getCurrentPage() < $videos->getLastPage())
<a class="jscroll-next"   href="{{URL::to('front/gallery/video/pager')}}?page={{$videos->getCurrentPage()+1}}" >Next</a>
@else
<a class="jscroll-next"   ></a>
@endif
