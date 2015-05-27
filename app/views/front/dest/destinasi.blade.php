@extends('front.partials.nothome')

@section('styles')
<style type="text/css">
    .img-blog{
        background-size:cover; 
        background-position:center center; 
        background-repeat:no-repeat;
    }
    .img-blog.img-dest{
        width: 270px;
        height: 220px; 
    }
</style>
@stop

@section('content')
<div class="row">

        <!-- Gallery Items
        ================================================== --> 
        <div class="span9 gallery">
                <h2>Destination on {{$kategori->nama}}</h2>
            <div class="row clearfix">
                <ul class="gallery-post-grid holder">
                    @foreach($destinasi as $dest)
                    <?php $image; ?>
                    @if($dest->islocal == 'Y')
                    <?php $image=$constval['destinasi_img_path'].$dest->main_img;?>
                    @else
                    <?php $image=$dest->main_img;?>
                    @endif
                    
                    <!-- Gallery Item 1 -->
                    <li  class="span3 gallery-item" data-id="id-{{$dest->id}}" data-type="illustration">
                        <span class="gallery-hover-4col hidden-phone hidden-tablet">
                            <span class="gallery-icons">
                                <a href="{{$image}}" class="item-zoom-link lightbox" title="Custom Illustration" data-rel="prettyPhoto"></a>
                                <a href="front/dest/show/{{$dest->id}}" class="item-details-link"></a>
                            </span>
                        </span>
                        <a href="gallery-single.htm">
                            <img class="img-blog img-dest" style="background-image: url('{{$image}}');"  >
                        </a>
                        <span class="project-details"><a href="front/dest/show/{{$dest->id}}">{{$dest->nama}}</a></span>
                    </li>
                    @endforeach
                </ul>
            </div>
            
        </div><!-- End gallery list-->
        
        <div class="span3 sidebar page-sidebar">
        <!--Search-->
        @if($constval['show_search_input']=='Y')
        @include('front.partials.search')
        @endif

        <!--Categories-->
        <h5 class="title-bg">Destinations</h5>
        <ul class="post-category-list">
            @foreach($kategoris as $kat)
            <li><a href="front/dest/kategori/{{$kat->id}}"><i class="icon-plus-sign"></i>{{$kat->nama}}</a></li>
            @endforeach
        </ul>

        
    </div>

    </div><!-- End container row -->
@stop

@section('scripts')
<script src="js/jquery.quicksand.js"></script>
@stop