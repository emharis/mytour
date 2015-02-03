@extends('front.partials.master')

@section('main-content')
<div id="primary" class="sidebar-right">
    <div class="inner group">
        <!-- START CONTENT -->
        <div id="content-page" class="content group">
            <div class="clear"></div>
            <div class="posts">
                <div class="testimonial-post internal-post group">
                    <div class="post_content group">
                        <div class="testimonial-page">
                            <div class="testimonial-text-full testimonial-thumb">
                                <blockquote>
                                    <p>{{$testimoni->message}}</p>
                                </blockquote>
                                <div class="thumbnail">
                                    <img src="{{$testimoni->img}}" alt="{{$testimoni->img}}" title="{{$testimoni->img}}" />   
                                </div>
                            </div>
                            <div class="testimonial-name">
                                <p class="name">{{$testimoni->nama}}</p>
                                <a class="website" href="{{$testimoni->website}}">{{$testimoni->company}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
        <!-- START SIDEBAR -->
        <div id="sidebar-testimonials" class="sidebar group">
            <div class="widget-first widget testimonial-widget">
                <h3>Other testimonials&#8230;</h3>
                <div class="testimonial-text">
                    <ul>
                        @foreach($othertesti as $otst)
                        <li>
                            <blockquote>
                                <p>{{substr($otst->message,0,150)}}</p>
                                <a href="front/testimoni/show/{{$otst->id}}" class="more-link">[...]</a>
                                <div class="name-testimonial"><a class="name-testimonial" href="front/testimoni/show/{{$otst->id}}">{{$otst->nama}} </a></div>
                            </blockquote>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
                <script type="text/javascript" src="js/testimonials.js"></script>
            </div>
        </div>
        <!-- END SIDEBAR -->
    </div>
</div>
@stop