@extends('front.partials.nothome')

@section('styles')
@stop

@section('content')
<div class="row">
    <div class="span8">
        <h4 class="title-bg">Search results for: <i>{{$key}}</i> </h4>     

        @if($result == 0)
        <div class="alert alert-block alert-danger">
            <h4>No Results Found</h4>
            We apologize for any inconvenience, please hit back on your browser or use the search form below.
        </div>
        @endif

        <section>
            <div class="input-append">
                <form action="front/search/by" method="POST">
                    <label>Type other search:</label>
                    <input size="16" type="text" placeholder="Search" required name="key">
                    <button class="btn" type="button"><i class="icon-search"></i></button>
                </form>
            </div>
        </section>

        @if(count($blogs)>0)
        <h5>on blogs</h5>            
        <div class="row">
            <div class="span12">
                @foreach($blogs as $blg)
                <blockquote>
                    <p><a href="front/blog/show/{{$blg->id}}" >{{$blg->title}}</a></p>
                    <small>{{'on ' . $blg->kategori . ', by Admin, at ' . date_format(new DateTime($blg->created_at),'m/d/Y')  }}</small>
                </blockquote>
                <!--<button class="btn btn-small btn-inverse" type="button">Find out more</button>-->
                @endforeach

            </div>
        </div>
        @endif
        <!--result on destinasi-->
        @if(count($destinasi)>0)
        <h5>on Destination</h5>            
        <div class="row">
            <div class="span12">

                @foreach($destinasi as $dest)
                <blockquote>
                    <p><a href="front/dest/show/{{$dest->id}}" >{{$dest->nama}}</a></p>
                    <small>{{'on ' . $dest->kategori }}</small>
                </blockquote>
                <!--<button class="btn btn-small btn-inverse" type="button">Find out more</button>-->
                @endforeach
            </div>
        </div>
        @endif
        <!--result on hotel-->
        @if(count($hotel)>0)
        <h5>on Hotel</h5>            
        <div class="row">
            <div class="span12">

                @foreach($hotel as $htl)
                <blockquote>
                    <p><a href="front/hotel/show/{{$htl->id}}" >{{$htl->nama}}</a></p>
                    <small>{{$htl->alamat}}</small>
                </blockquote>
                <!--<button class="btn btn-small btn-inverse" type="button">Find out more</button>-->
                @endforeach
            </div>
        </div>
        @endif

    </div> 

    <div class="span4 sidebar page-sidebar"><!-- Begin sidebar column -->

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

</div>
@stop

@section('scripts')
@stop