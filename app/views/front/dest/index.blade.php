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
        <div class="span12 gallery">
                <h2>Destination </h2>
            <div class="row clearfix">
                <ul class="gallery-post-grid holder">

                    @foreach($kategoris as $kat)
                    <!-- Gallery Item 1 -->
                    <li  class="span3 gallery-item" data-id="id-{{$kat->id}}" data-type="illustration">
                        <span class="gallery-hover-4col hidden-phone hidden-tablet">
                            <span class="gallery-icons">
                                <a href="{{$imgpath . $kat->filename}}" class="item-zoom-link lightbox" title="Custom Illustration" data-rel="prettyPhoto"></a>
                                <a href="front/dest/kategori/{{$kat->id}}" class="item-details-link"></a>
                            </span>
                        </span>
                        <a href="front/dest/kategori/{{$kat->id}}">
                            <img class="img-blog img-dest" style="background-image: url('{{$imgpath . $kat->filename}}');"  >
                        </a>
                        <span class="project-details"><a href="front/dest/kategori/{{$kat->id}}">{{$kat->nama}}</a></span>
                    </li>
                    @endforeach
                </ul>
            </div>
            
        </div><!-- End gallery list-->

    </div><!-- End container row -->
@stop

@section('scripts')
<script src="js/jquery.quicksand.js"></script>
@stop