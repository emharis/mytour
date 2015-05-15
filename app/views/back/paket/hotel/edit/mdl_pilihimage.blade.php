<div class="modal" id="modalPilihImage" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Image Room</h4><i></i>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach($images as $img)
                    <div class="col-md-3" style="width: 200px;height: 150px;">
                        <a class="btnPilihImage" data-id="{{$img->id}}">
                            @if($img->islocal =='Y')
                            <img  class="col-md-12" src="{{$img_path  . $img->filename}}" />
                            @else
                            <img class="col-md-12" src="{{$img->filename}}" />
                            @endif
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>

</script>