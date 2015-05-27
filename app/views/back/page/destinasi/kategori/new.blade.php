@extends('back.partials.master')

@section('styles')
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="page-index">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Destinasi <i class="fa fa-angle-double-right" ></i> Tambah</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <!--<h3 class="box-title">Upload Foto</h3>-->
                        <a class="btn btn-danger pull-right btn-cancel-edit-destinasi" href="admin/page/destinasi#tab_2" ><i class="fa fa-angle-double-left"></i> Cancel</a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="form-new-destinasi" action="admin/page/destinasi/new-kategori" method="POST" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>
                                            <input autocomplete="off" type="text" class="form-control" name="nama" required/>
                                        </td>
                                        <td rowspan="3" class="col-md-4" >
                                            <img id="imgPreview" style="width: 270px;height: 220px;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >Image Cover <br/> Min. 270x220px</td>
                                        <td>
                                            <input type="file" name="imageUploader" required />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <button type="submit" class="btn btn-primary " id="btn-save-new-destinasi" >Save</button>
                                            <a href="admin/page/destinasi#tab_2"  class="btn btn-danger " data-dismiss="modal" >Cancel</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->

</div><!-- /.content-wrapper -->
@stop

@section('scripts')
@include('back.partials.tablescript')
@include('back.partials.editorscript')
<script>
    $(document).ready(function(){
        //image upload
        var _URL = window.URL && window.webkitURL;
        $('input[name=imageUploader]').change(function(ev) {
            //cek dimensii image
            var image, file;
            var imgPrev = $('#imgPreview');
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function() {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 270 || this.height < 220) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        $(this).val(null);
                        imgPrev.removeAttr('src');
                    } else {
                        var f = ev.target.files[0];
                        var fr = new FileReader();
                        fr.onload = function(ev2) {
                            console.dir(ev2);
                            imgPrev.attr('src', ev2.target.result);
                        };
                        fr.readAsDataURL(f);
                    }
                };
                image.src = _URL.createObjectURL(file);
            }
        });
    })
</script>
@stop