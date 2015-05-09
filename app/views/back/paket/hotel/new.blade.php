@extends('back.partials.master')

@section('styles')
<link href="backend/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Tambah Hotel</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <!--<h3 class="box-title">Upload Foto</h3>-->
                        <a class="btn btn-danger pull-right" href="admin/paket/hotel" >Cancel</a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="form-new-hotel" action="admin/paket/hotel/new" method="POST" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>
                                            <input autocomplete="off" type="text" class="form-control" name="nama" required/>
                                        </td>
                                        <td class="col-md-4" rowspan="4">
                                            <img style="width: 100%" id="img-new-hotel-prev"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>
                                            <input autocomplete="off" type="text" class="form-control" name="alamat" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" >Image Cover <i>min. 170x139px</i></td>
                                        <td>
                                            <select name="islocal" class="form-control">
                                                <option value="Y" >Lokal</option>
                                                <option value="N" >Url</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="file" name="img-cover-new-hotel"/>
                                            <input type="text" name="img-cover-url" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <textarea name="desc" id="textarea-new-desc-hotel" class="tinymce-full"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <button type="submit" class="btn btn-primary " id="btn-save-new-hotel" >Save</button>
                                            <a  href="admin/paket/hotel"  class="btn btn-danger btn-cancel-new-hotel" data-dismiss="modal" >Cancel</a>
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
<script src="backend/plugins/jqueryform/jquery.form.min.js" type="text/javascript"></script>
<script src="backend/plugins/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
<script src="js/jquery.formatCurrency-1.4.0.min.js" type="text/javascript"></script>
<script src="js/jquery.formatCurrency.all.js" type="text/javascript"></script>
@include('back.partials.tablescript')
@include('back.partials.editorscript')
<script>
    $(document).ready(function() {
        var btnSaveNewHotel = $('#btn-save-new-hotel');
        var frmNewHotel = $('#form-new-hotel');
        var inpFileNewHotel = $('input[name=img-cover-new-hotel]');
        //event click btn save new hotel
        btnSaveNewHotel.click(function(e) {
//            tinyMCE.get('textarea-new-desc-hotel').triggerSave();
            tinyMCE.triggerSave();
        });
        //event upload imageon new hotel
        var _URL = window.URL && window.webkitURL;
        inpFileNewHotel.change(function(ev) {
            //cek dimensii image
            var image, file;
            var imgPrev = $('#img-new-hotel-prev');
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function() {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 170 || this.height < 139) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        inpFileNewHotel.val(null);
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

        //IMAGE COVER UPLOAD=================
        $('input[name=img-cover-url]').hide();
        //image sumber change
        $('select[name=islocal]').change(function(e) {
            //clear input
            $('#img-new-hotel-prev').removeAttr('src');
            $('input[name=img-cover-url]').val(null);
            $('input[name=img-cover-new-hotel]').val(null);
            //tampilkan input image yang sesuai
            if ($(this).val() == 'Y') {
                $('input[name=img-cover-url]').hide();
                $('input[name=img-cover-new-hotel]').show();
            } else {
                $('input[name=img-cover-new-hotel]').hide();
                $('input[name=img-cover-url]').show();
            }
        });
        //image cover url change
        $('input[name=img-cover-url]').change(function() {
            $('#img-new-hotel-prev').attr('src', $(this).val());
        });
        //END OF IMAGE COVER UPLOAD==========
    });
</script>

@stop