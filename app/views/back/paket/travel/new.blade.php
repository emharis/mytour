@extends('back.partials.master')

@section('styles')
<link href="backend/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Tambah Paket Travel</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <!--<h3 class="box-title">Upload Foto</h3>-->
                        <a class="btn btn-danger pull-right" href="admin/paket/travel" >Cancel</a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="form-new-travel" action="admin/paket/travel/new" method="POST" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>
                                            <input autocomplete="off" type="text" class="form-control" name="nama" required/>
                                        </td>
                                        <td class="col-md-4" rowspan="7">
                                            <img style="width: 100%" id="img-new-travel-prev"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input autocomplete="off" type="text" class="form-control currency text-right" name="harga" />  
                                                </div>
                                                <div class="col-md-4" >
                                                    <select name="currency" class="form-control">
                                                        <option value="IDR">IDR</option>
                                                        <option value="USD">USD</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Day/Night</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-2"><input autocomplete="off" type="text" class="form-control text-right" name="day" /></div>
                                                <div class="col-md-2"><input autocomplete="off" type="text" class="form-control text-right" name="night" /></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" >Image Cover <br/> <i>min. 170x139px</i></td>
                                        <td>
                                            <div class="row" >
                                                <div class="col-md-4" >
                                                    <select name="islocal" class="form-control" >
                                                        <option value="Y" >LOCAL</option>
                                                        <option value="N" >URL</option>
                                                    </select>  
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="file" name="input-img-new-travel"/>
                                            <input type="text" name="imgUrl" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Publish</td>
                                        <td>
                                            <div class="row" >
                                                <div class="col-md-4" >
                                                    <select name="publish" class="form-control" >
                                                        <option value="Y" >PUBLISH</option>
                                                        <option value="N" >DRAFT</option>
                                                    </select>  
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <textarea name="desc" id="textarea-new-desc-travel" class="tinymce-full"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <button type="submit" class="btn btn-primary " id="btn-save-new-travel" >Save</button>
                                            <a  href="admin/paket/travel"  class="btn btn-danger btn-cancel-new-travel" data-dismiss="modal" >Cancel</a>
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
        //trigger save
        $('#btn-save-new-travel').click(function(e) {
            tinyMCE.triggerSave();
        });
        //save form
//        $('#form-new-travel').ajaxForm(function(){
//            //clear input
//            $('#form-new-travel input[type=text]').val(null);
//            $('#form-new-travel input[type=file]').val(null);
//            $('#form-new-travel img').removeAttr('src');
//            $('#form-new-travel select').val([]);
//            tinyMCE.get('textarea-new-desc-travel').setContent(''); 
////            tinyMCE.setContent(''); 
//        });
        //auto format currency
        $('.currency').blur(function() {
            $(this).formatCurrency({symbol: ''});
        });
        //Image cover upload
        //event upload imageon new hotel
        var _URL = window.URL && window.webkitURL;
        $('input[name=input-img-new-travel]').change(function(ev) {
            //cek dimensii image
            var image, file;
            var imgPrev = $('#img-new-travel-prev');
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function() {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 170 || this.height < 139) {
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

        //===========IMAGE UPLOAD CONTROL====================
        /////sembunyikan input url
        $('input[name=imgUrl]').hide();
        ////Select islocal change
        $('select[name=islocal]').change(function() {
            //clear input dan preview
            $('#img-new-travel-prev').removeAttr('src');
            $('input[name=imgUrl]').val(null);
            $('input[name=input-img-new-travel]').val(null);
            //set islocal value
            var islocal = $(this).val();
            if (islocal == 'Y') {
                $('input[name=imgUrl]').hide();
                $('input[name=input-img-new-travel]').show();
            } else {
                $('input[name=input-img-new-travel]').hide();
                $('input[name=imgUrl]').show();
            }
        });
        ////Input image url change
        $('input[name=imgUrl]').blur(function() {
            $('#img-new-travel-prev').attr('src', $(this).val());
        });
        //===================================================

    });
</script>

@stop