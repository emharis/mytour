<div class='box-header with-border'>
    <h4 class='box-title'>{{$destinasi->nama}}</h4>
    <a class="btn btn-danger pull-right" href="admin/page/destinasi"  ><i class="fa fa-angle-double-left"></i> Back</a>
</div>
<form id="form-edit-destinasi" action="admin/page/destinasi/edit" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="destinasiId" value="{{$destinasi->id}}"/>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Publish</td>
                <td>
                    <div class="row">
                        <div class="col-md-6" >
                            <select name="publish" class="form-control">
                                <option {{$destinasi->publish == 'Y' ? 'selected':''}} value="Y" >PUBLISH</option>
                                <option {{$destinasi->publish == 'N' ? 'selected':''}} value="N" >DRAFT</option>
                            </select>
                        </div>
                    </div>
                </td>
                <td class="col-md-4" rowspan="4">
                    @if(isset($cover))
                        @if($cover->islocal == 'Y')
                        <img id="img-prev-image-destinasi" src="{{$img_path.$cover->filename}}" style="width:100%;"/>
                        @else
                        <img id="img-prev-image-destinasi" src="{{$cover->filename}}" style="width:100%;"/>
                        @endif
                        @else
                        <img id="img-prev-image-destinasi"  style="width:100%;"/>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <div class="row">
                        <div class="col-md-6" >
                            {{Form::select('kategori',$selectKategori,$destinasi->destinasi_kategori_id,array('class'=>'form-control','required'))}}
                        </div>
                        <div class="col-md-2" >
                            <a class="btn btn-primary btn-tambah-kategori"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    <input autocomplete="off" type="text" class="form-control" name="nama" value="{{$destinasi->nama}}" required/>
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>

                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <textarea name="desc" id="textarea-edit-desc-destinasi" class="tinymce-full" >{{$destinasi->desc}}</textarea>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit" class="btn btn-primary " id="btn-save-new-destinasi" >Save</button>
                    <a  class="btn btn-danger btn-cancel-edit-destinasi" data-dismiss="modal" >Cancel</a>
                </td>
            </tr>
        </tbody>
    </table>
</form>