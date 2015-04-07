<div class="menu classic" >
    <ul id="nav" class="menu" >
        @foreach($topmenu as $menu)
        @if($menu->type == '1')
        <li class="{{(Request::is('front/home') ? 'active':'')}}" >
            <a href="front/home" >{{strtoupper($menu->nama)}}</a>
            
        </li>
        @elseif($menu->type == '2')
        <li class="{{(Request::is('front/statpage') ? 'active':'')}}" >
            <a href="front/statpage/index/{{$menu->statpage_id}}" >{{strtoupper($menu->nama)}}</a>
        </li>
        @elseif($menu->type == '3')
        <li class="{{(Request::is('front/blog') ? 'active':'')}}" >
            <a href="front/blog" >{{strtoupper($menu->nama)}}</a>
        </li>
        @elseif($menu->type == '4')
        <li class="{{(Request::is('front/contact') ? 'active':'')}}" >
            <a href="front/contact" >{{strtoupper($menu->nama)}}</a>
        </li>
        @elseif($menu->type == '5')
        <li class="{{(Request::is('front/gallery') ? 'active':'')}}" >
            <a href="#" >{{strtoupper($menu->nama)}}</a>
            <ul class="sub-menu">
                <li><a href="front/gallery/photo" >Photos</a></li>
                <li><a href="front/gallery/video" >Videos</a></li>
            </ul>
        </li>
        @elseif($menu->type == '6')
        <li class="{{(Request::is('front/destination') ? 'active':'')}}" >
            <a href="front/destination" >{{strtoupper($menu->nama)}}</a>
        </li>
        @elseif($menu->type == '7')
        <li class="{{(Request::is('front/book') ? 'active':'')}}" >
            <a href="front/book" >{{strtoupper($menu->nama)}}</a>
        </li>
        @elseif($menu->type == '8')
        <li class="{{(Request::is('front/testimoni') ? 'active':'')}}" >
            <a href="front/testimoni" >{{strtoupper($menu->nama)}}</a>
        </li>
        @endif
        
        <!--<a href="{{($menu->type == '2' ? 'front/statpage/index/'.$menu->statpage_id :($menu->type == '3' ? 'front/blog' : '' ) )}}" >{{strtoupper($menu->nama)}}</a>-->
        @endforeach
        
        <li class="{{(Request::is('front/user/login') ? 'active':'')}}" >
            <a id="btn-login" href="front/user/login" >LOGIN</a>
        </li>

    </ul>
</div>
