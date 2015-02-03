@extends('front.partials.master')

@section('main-content')
<div id="page-meta">
    <div class="inner group">
        <h3>{{$dest->nama}}</h3>
        <h4>{{$dest->subtitle}}</h4>
    </div>
</div>
<!-- END PAGE META -->
<!-- START PRIMARY -->
<div id="primary" class="sidebar-right">
    <div class="inner group">
        <!-- START CONTENT -->
        <div id="content-page" class="content group">
            <div class="page type-page status-publish group">
                {{str_replace('../', '', $dest->desc)}}
                <p>&nbsp;</p>
            </div>
            <!-- START COMMENTS -->
            <div id="comments">
            </div>
            <!-- END COMMENTS -->
        </div>
        <!-- END CONTENT -->

        <!-- START SIDEBAR -->
        <div class="sidebar group">

            <div class="widget-first widget recent-posts">
                <h3>Others in {{$dest->destkat->nama}}</h3>
                <div class="recent-post group">
                    @foreach($dests as $dst)
                    <div class="hentry-post group">
                        <div class="thumb-img">
                            <a href="front/destination/show/{{$dst->id}}">
                            <img src="{{$dst->img_path}}" width="55px" height="55px" alt="001" title="001" />
                            </a>
                        </div>
                        <div class="text">
                            <a href="front/destination/show/{{$dst->id}}" title="{{$dst->nama . ', ' . $dst->subtitle}}" class="title">{{$dst->nama }}</a>
                            <p class="post-date">{{$dst->subtitle}}</p>
                        </div>
                    </div>
                    @endforeach                    
                </div>
            </div>

            <div class="widget-last widget text-image">
                <h3>Others in {{$dest->kategori->nama}}</h3>
                @foreach($destsbykat as $dstk)
                <div class="text-image" style="text-align:left">
                    <a href="front/destination/show/{{$dstk->id}}">
                    <img src="{{$dstk->img_path}}" alt="{{$dstk->nama}}" width="87px" height="56px" />
                    </a>
                </div>
                <p>{{$dstk->nama .', ' . $dstk->subtitle}}</p>
                @endforeach
                
            </div>

        </div>
        <!-- END SIDEBAR -->
        <!-- START EXTRA CONTENT -->
        <!-- END EXTRA CONTENT -->
    </div>
</div>
@stop