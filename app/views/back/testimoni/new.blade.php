@extends('back.partials.master')

@section('styles')
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Testimonial <i class="fa fa-angle-double-right" ></i> Tambah</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="pull-right">
                            <a class="btn btn-danger" href="admin/testimoni/testimoni" >Cancel</a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="form-new-testimoni" action="admin/testimoni/new" method="POST" enctype="multipart/form-data" onsubmit="btnSubmit.disabled=true;return true;"  >
                            <table class="table table-bordered datatable">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td><input required type="type" name="nama" class="form-control" required /></td>
                                    </tr>
                                    <tr>
                                        <td>Negara</td>
                                        <td>
                                            {{Form::select('country',$countries,null,array('class'=>'form-control','required'))}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Message</td>
                                        <td>
                                            <textarea name="message" class="form-control" ></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Publish</td>
                                        <td>
                                            <select name="publish" class="form-control" >
                                                <option value="Y" >PUBLISH</option>
                                                <option value="N" >DRAFT</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-primary" id="btnSubmit" >Save</button>
                                            <a class="btn btn-danger" id="btn-cancel-testimoni">Cancel</a>
                                        </td>
                                        </td>
                                        <td colspan="2">

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
@include('back.partials.editorscript')
<script>
    $(document).ready(function() {
        //autosize textarea
        autosize($('textarea'));
        //sembunyikan image url
        $('input[name=imageUrl]').hide();
        //islocal change
        $('select[name=islocal]').change(function() {
            //clear input
            $('input[name=imageUploader]').val(null);
            $('input[name=imageUrl]').val(null);
            $('img#imagePreview').removeAttr('src');
            //tampilkan input
            if ($(this).val() == 'Y') {
                $('input[name=imageUrl]').hide();
                $('input[name=imageUploader]').show();
            } else {
                $('input[name=imageUploader]').hide();
                $('input[name=imageUrl]').show();
            }
        });

        //image uploader change
        var _URL = window.URL && window.webkitURL;
        $('input[name=imageUploader]').change(function(ev) {
            var image, file;
            var f = ev.target.files[0];
            var fr = new FileReader();
            var imgprev = $('img#imagePreview');
            //.alert('uploading...;');
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function() {
                    //alert('check size...;');
                    //alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 570 || this.height < 222) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        $('input[name=imageUploader]').val(null);
                    } else {
                        //tampilkan preview image
                        fr.onload = function(ev2) {
                            console.dir(ev2);
                            imgprev.attr('src', ev2.target.result);
                        };
                        fr.readAsDataURL(f);
                    }
                };
                image.src = _URL.createObjectURL(file);
            }
        });
        //image url change
        $('input[name=imageUrl]').change(function() {
            $('img#imagePreview').attr('src', $(this).val());
        });
        //submit form
//        $('form').submit(function(e) {
//            tinyMCE.triggerSave();
//            $('form').ajaxSubmit(function() {
//                location.href = "admin/page/testimoni";
//            });
//            return false;
//        });


        //===========END OF SCRIPT=============
    });
</script>
@stop