<div>
<div>
    @foreach($images as $img)
    @if($img->islocal =='Y')
    <a data-id="{{$img->id}}" data-fullpath="{{$img->img_path . $img->filename}}" href="#" class="col-md-4 imgItemPilih" style="margin: 2px;background-image: url('{{$img->img_path . $img->filename}}');width: 200px;height: 100px;background-position: center;background-size: cover;" ></a>
    @else
    <a data-id="{{$img->id}}" data-fullpath="{{$img->filename}}" href="#" class="col-md-4 imgItemPilih" style="margin: 2px;background-image: url('{{$img->filename}}');width: 200px;height: 100px;background-position: center;background-size: cover;" ></a>
    @endif        
    @endforeach

</div>
<div class="clearfix"></div>
<a class="btn btn-danger btn-xs " id="btnCancelPilihImage">Cancel Pilih Image</a>
</div>

