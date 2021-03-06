@extends('back.partials.master')

@section('styles')
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Blog <i class="fa fa-angle-double-right" ></i> Tambah</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="pull-right">
                            <a class="btn btn-danger" href="admin/page/blog" >Cancel</a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="form-new-blog" action="admin/page/blog/new" method="POST" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Kategori</td>
                                        <td >
                                            <div class="row">
                                                <div class="col-md-8">
                                                    {{Form::select('kategori',$selectKategori,null,array('class'=>'form-control','required'))}}
                                                </div>
                                                <div class="col-md-4">
                                                    <a class="btn btn-primary btn-tambah-kategori"  title="Tambah kategori blog baru"><i class="fa fa-plus"></i></a>
                                                </div>
                                            </div>                                        
                                        </td>
                                        <td rowspan="5" class="col-md-4">
                                            <img id="imagePreview" style="width: 100%;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Judul</td>
                                        <td >
                                            <input type="text" class="form-control" name="title" required/>
                                        </td>
                                    </tr>                                
                                    <tr>
                                        <td rowspan="2" >Image Cover <br/> <b>570x222px</b></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-8" >
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
                                            <input type="file" name="imageUploader"  />
                                            <input type="type" name="imageUrl" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Publish</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <select class="form-control" name="publish">
                                                        <option value="Y">Publish</option>
                                                        <option value="N">Draft</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>                                                              
                                    <tr>
                                        <td>Minimal Content</td>
                                        <td >

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" >
                                            <textarea id="textarea-new" class="form-control" maxlength="500" name="min_content" ></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Content</td>
                                        <td >

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" >
                                            <textarea id="textarea-new" class="tinymce-full" name="content" ></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-primary" id="btn-save-blog" >Save</button>
                                            <a class="btn btn-danger" id="btn-cancel-blog">Cancel</a>
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
//                location.href = "admin/page/blog";
//            });
//            return false;
//        });


        //===========END OF SCRIPT=============
    });
</script>
@stop