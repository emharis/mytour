<?php $idx = 1; ?>
@foreach($destkats as $dst)
<li class="{{($idx==1 ? 'first':'')}} one-third {{($idx==3 ? 'group last':'')}}">
    <div class="overlay_a">
        <div class="overlay_wrapper">
            <img src="{{$dst->img_path}}" style="width: 364px;height: 162px;" alt="{{$dst->nama}}" title="{{$dst->nama}}" />										
            <div class="overlay">
                <a class="overlay_project" href="front/destination/kategori/{{$dst->id}}" style="width: 100%;background-position-x: center;" ></a>
                <span class="overlay_title">{{$dst->nama}}</span>
            </div>
        </div>
    </div>
    <h4><a href="front/destination/kategori/{{$dst->id}}">{{$dst->nama}}</a></h4>                      
</li>

<?php $idx++; ?>
@if($idx > 3)
<?php $idx = 1; ?>
@endif
@endforeach

<br/>
@if($destkats->getCurrentPage() < $destkats->getLastPage())
<a class="jscroll-next"   href="{{URL::to('front/destination/pager')}}?page={{$destkats->getCurrentPage()+1}}" >Next</a>
@else
<a class="jscroll-next"   ></a>
@endif
