@extends('front.partials.nothome')

@section('styles')
@stop

@section('content')
<div class="row"><!--Container row-->

    <!-- Title Header -->
    <div class="span8">

        <h2>About us</h2>
        {{$about['content']['big_value']}}
        
        @if($constval['show_main_banner']=='Y')
        <div class="row clearfix ">
            <div class="span12 ">
                <img src="images/banner/hosting.gif"/>
            </div>
        </div>
        @endif
        
    </div> <!--End page content column-->

    <!-- Blog Sidebar
    ================================================== --> 
    <div class="span4 sidebar page-sidebar"><!-- Begin sidebar column -->
        
        @if($constval['show_search_input']=='Y')
        <h5 class="title-bg">Search</h5>        
        <section>
            <div class="input-append">
                <form action="#">
                    <input size="16" type="text" placeholder="Search"><button class="btn" type="button"><i class="icon-search"></i></button>
                </form>
            </div>
        </section>
        @endif
        
        @if($constval['show_customer_support']=='Y')
        <!--        CUSTOMER SERVICE -->
        <h5 class="title-bg">Customer Support</h5>        
        <address style="position: relative;">
            <img   src="frontend/img/ctcus.png" />
            <h2 style="position: absolute;left:10px;top:50%;">{{$constval['phone']}}</h2>
        </address>    
        <br/>
        @if($constval['ym_show']=='Y')
        <address style="text-align: center;">
            <a href="ymsgr:SendIM?yahuuy">
                <img border="0" src="http://opi.yahoo.com/online?u={{$constval['ym']}}&amp;m=g&amp;t=14" />
            </a>
<!--            <strong>Jimmy Doe</strong><br>
        <a href="mailto:#">first.last@gmail.com</a>-->
        </address>
        @endif
        @endif
        
        @if($constval['show_side_banner']=='Y')
        <!--BAnner Ads-->
        <h5 class="title-bg">{{$constval['side_banner_title']}}</h5> 
        <address>
            <img src="images/banner/payment.jpg"/>
        </address>
        @endif

    </div><!-- End sidebar column -->

</div><!-- End container row -->
@stop

@section('scripts')
@stop