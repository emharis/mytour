@extends('back.partials.master')

@section('styles')
@stop

@section('content')
<div class="content-wrapper" id="page-tambah">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Tambah Destinasi</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <!--<h3 class="box-title">Upload Foto</h3>-->
                        <a class="btn btn-danger pull-right btn-cancel-edit-destinasi" href="admin/page/destinasi" ><i class="fa fa-angle-double-left"></i> Cancel</a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="form-new-destinasi" action="admin/page/destinasi/new" method="POST" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6" >
                                                    {{Form::select('kategori',$selectKategori,null,array('class'=>'form-control','required'))}}
                                                </div>
                                                <div class="col-md-2" >
                                                    <a class="btn btn-primary btn-tambah-kategori"><i class="fa fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-md-4" rowspan="5">
                                            <img id="img-prev-image-destinasi" style="width:100%;"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>
                                            <input autocomplete="off" type="text" class="form-control" name="nama" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" >Image Cover <br/> Min. 270x220px</td>
                                        <td>
                                            <div class="row" >
                                                <div class="col-md-4" >
                                                    <select class="form-control" name="islocal" >
                                                        <option value="Y" >Lokal</option>
                                                        <option value="N" >URL</option>
                                                    </select>  
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="file" name="img-upload-image-destinasi" />
                                            <input type="text" class="form-control" name="image-url" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <textarea name="desc" id="textarea-new-desc-destinasi" class="tinymce-full"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <button type="submit" class="btn btn-primary " id="btn-save-new-destinasi" >Save</button>
                                            <a href="admin/page/destinasi"  class="btn btn-danger " data-dismiss="modal" >Cancel</a>
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
</div>

<!--modal tambah kategori-->
<div class="modal" id="modal-tambah-kategori" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kategori Destinasi</h4>
            </div>
            <div class="modal-body">
                <form id="form-tambah-kategori-destinasi" action="admin/page/destinasi/new-kategori" method="POST" enctype="multipart/form-data">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>
                                    <input type="text" name="nama" class="form-control" required/>
                                </td>
                                <td rowspan="3" class="col-md-4">
                                    <img id="img-prev-image-kategori" style="width: 100%;"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Image Cover</td>
                                <td>
                                    <input type="file" name="img-upl-image-kategori" required/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a class="btn btn-danger" id="btn-cancel-tambah-kategori" data-dismiss="modal" >Cancel</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop

@section('scripts')
@include('back.partials.tablescript')
@include('back.partials.editorscript')
<script>
    $(document).ready(function() {
        //==================MANAGE IMAGE===============================
        var _URL = window.URL && window.webkitURL;
        //sembunyikan dulu image url input
        $('input[name=image-url]').hide();
        //image type change
        $('select[name=islocal]').change(function(e) {
            //clear input
            $('input[type=file],input[name=image-url]').val(null);
            $('#img-prev-image-destinasi').removeAttr('src');
            //get value
            var islocal = $(this).val();
            if (islocal == 'Y') {
                $('input[type=file]').show();
                $('input[name=image-url]').hide();
            } else {
                $('input[type=file]').hide();
                $('input[name=image-url]').show();
            }
        });
        //image gile upload change
        $('#form-new-destinasi input[type=file]').change(function(ev) {
            //cek dimensii image
            var image, file;
            var imgPrev = $('#img-prev-image-destinasi');
            var imgInput = $(this);
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function() {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 270 || this.height < 220) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        imgInput.val(null);
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
        //url change
        $('input[name=image-url]').change(function(e) {
            $('#img-prev-image-destinasi').attr('src', $(this).val());
        });
        //==================END OF MANAGE IMGAE===============================
        //
        //===========TAMBAH KATEGORI===============================
        //new kategori
        $('.btn-tambah-kategori').click(function(e) {
            $('.modal-dialog').css('width', '50%');
            $('#modal-tambah-kategori').modal('show');
        });
        //image tambah kategori upload
        $('#form-tambah-kategori-destinasi input[type=file]').change(function(ev) {
            //cek dimensii image
            var image, file;
            var imgPrev = $('#img-prev-image-kategori');
            var imgInput = $(this);
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function() {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 270 || this.height < 220) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        imgInput.val(null);
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
        //cancel tambah kategori
        $('#btn-cancel-tambah-kategori').click(function(e) {
            //clear input
            $('#form-tambah-kategori-destinasi input').val(null);
            $('#form-tambah-kategori-destinasi img').removeAttr('src');
        });
        //submit new kategori
        $('#form-tambah-kategori-destinasi').submit(function(e) {
            $('#form-tambah-kategori-destinasi').ajaxSubmit({
                beforeSubmit: function(bs) {
                    $('#form-tambah-kategori-destinasi').loader('show');
                },
                success: function(sc) {
                    $('#form-tambah-kategori-destinasi').loader('hide');
                    //close modal
                    $('#btn-cancel-tambah-kategori').click();
                    var kategori = JSON.parse(sc);
                    //tampilkan ke select kategori
                    var o = new Option(kategori.nama, kategori.id);
                    $(o).html(kategori.nama);
                    $("select[name=kategori]").append(o);
                    //tampilkan ke select option kategori
                }
            });

            return false;
        });
        //================END OF TAMBAH KATEGORI DESTINASI=========
        //
        //=============SUBMIT NEW DESTINASI========================
        $('#form-new-destinasi').submit(function(e) {
            tinyMCE.triggerSave();
            $('#form-new-destinasi').ajaxSubmit(function(as) {
                alert('Data Saved');
                //.clear input image
                $('input[type=file],input[name=image-url]').val(null);
                $('#img-prev-image-destinasi').removeAttr('src');
                //clear input
                $('input').val(null);
                $('select').val([]);
                tinyMCE.get('textarea-new-desc-destinasi').setContent('');
                $('select[name=kategori]').focus();
            });
            return false;
        });
        //=============END OF SUBMIT NEW DESTINASI=================
    });
</script>
@stop