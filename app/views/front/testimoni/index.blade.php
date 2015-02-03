@extends('front.partials.master')

@section('main-content')
<div id="page-meta">
    <div class="inner group">
        <h3>Our customers say...</h3>
        <h4>we made great things</h4>
    </div>
</div>
<!-- END PAGE META -->
<!-- START PRIMARY -->
<div id="primary" class="sidebar-no">
    <div class="inner group">
        <!-- START CONTENT -->
        <div id="content-page" class="content group">
            <div class="hentry group">
                <?php $idx = 1; ?>
                @foreach($testimonials as $tst)
                <div class="testimonial two-fourth {{($idx==2 ? 'last':'')}}">
                    <div class="thumbnail">
                        <img src="{{$tst->img}}" alt="{{$tst->img}}" title="{{$tst->img}}" />   
                    </div>
                    <div class="testimonial-text">
                        <p>{{substr($tst->message,0,205)}}[...]</p>
                    </div>
                    <div class="testimonial-name"><a href="front/testimoni/show/{{$tst->id}}" class="name">{{$tst->nama}}</a><a class="website" href="{{$tst->website}}">{{$tst->company}}</a></div>
                </div>
                <?php $idx++; ?>
                @if($idx > 2)
                <?php $idx = 1; ?>
                @endif
                @endforeach
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
@stop