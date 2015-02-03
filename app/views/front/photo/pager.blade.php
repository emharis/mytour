<?php $idx = 1; ?>
@foreach($photos as $pht)
<li class="{{($idx==1?'first':'')}} {{($idx==3?'last group':'')}} one-third">
    <div class="overlay_a">
        <div class="overlay_wrapper">
            <img src="{{$pht->img_path}}" data-src="{{$pht->img_path}}" alt="0082" title="0082" />										

            <div class="overlay">
                <a class="overlay_img" href="{{$pht->img_path}}" rel="lightbox" title="" style="width: 100%;background-position-x: center;"></a>
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
@if($photos->getCurrentPage() < $photos->getLastPage())
<a class="jscroll-next"   href="{{URL::to('front/gallery/photo/pager')}}?page={{$photos->getCurrentPage()+1}}" >Next</a>
@else
<a class="jscroll-next"   ></a>
@endif
