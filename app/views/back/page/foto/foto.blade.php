@extends('back.partials.master')

@section('styles')
<link href="backend/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Galeri Foto</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upload Foto</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="form-upload" action="admin/page/foto/upload" method="POST" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="col-md-6">
                                            <label>Sumber</label>
                                            <select name="isexternal" class="form-control">
                                                <option value="N">Lokal</option>
                                                <option value="Y">Eksternal/Link/URL</option>
                                            </select>
                                        </td>
                                        <td rowspan="3" class="col-md-6 text-center">
                                            <img style="max-width:100%;" id="img-preview" src="backend/dist/img/element/picture-logo.png"/>
                                        </td>
                                    </tr>
                                    <tr class="tr-img-link">
                                        <td>
                                            <label class="img-link-element">Link/URL</label>
                                            <input type="text" id="img-link" name="img-link" class="form-control img-link-element"/>
                                        </td>
                                    </tr>                                
                                    <tr class="tr-img-local">
                                        <td>
                                            <label class="img-link-element">Upload Image</label>
                                            <input type="file" id="img-uploader" name="img-uploader" />
                                        </td>

                                    </tr>                                
                                    <tr>
                                        <td>
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>270x220px</label>
                                        </td>
                                        <td  class="text-right">
                                            <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            @foreach($fotos as $ft)
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <span>{{$ft->title}}</span>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool btn-del-image" data-id="{{$ft->id}}" ><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        @if($ft->isexternal == 'N')

                        <a class="colorbox" href="{{URL::to($constval['img_gallery_path'].$ft->filename)}}" title="{{$ft->title}}">
                            <img src="{{$constval['img_gallery_path'].$ft->filename}}" width="100%">
                        </a>
                        @else
                        <a class="colorbox" href="{{URL::to($ft->filename)}}" title="{{$ft->title}}">
                            <img src="{{$ft->filename}}" width="100%">
                        </a>
                        @endif
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
            @endforeach

        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@stop

@section('scripts')
<script src="backend/plugins/jqueryform/jquery.form.min.js" type="text/javascript"></script>
<script src="backend/plugins/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        //preview image
        var _URL = window.URL || window.webkitURL;
        $('#img-uploader').on('change', function (ev) {
            var image, file;
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function () {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 270 || this.height < 220) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        $('input[name=img-uploader]').val(null);
                        $('#img-preview').attr('src', 'backend/dist/img/element/picture-logo.png');
                    } else {
                        //preview image
                        var f = ev.target.files[0];
                        var fr = new FileReader();

                        fr.onload = function (ev2) {
                            console.dir(ev2);
                            $('#img-preview').attr('src', ev2.target.result);
                        };

                        fr.readAsDataURL(f);
                    }
                };
                image.src = _URL.createObjectURL(file);
            }
        });
        //preview image from url
        $('input[name=img-link]').change(function () {
//            //cek dimensi image
            var tmpImg = new Image();
            var imgUrl = $(this).val();
            tmpImg.src = imgUrl; //or  document.images[i].src;


            $(tmpImg).on('load', function () {
//                alert(tmpImg.width );
                orgWidth = tmpImg.width;
                orgHeight = tmpImg.height;
                if (orgWidth < 270 || orgHeight < 220) {
                    alert('Dimensi image tidak sesuai.');
                    //set null
                    $('input[name=img-link]').val('');
                    $('input[name=keterangan]').val('');
                    $('#img-preview').attr('src', 'backend/dist/img/element/picture-logo.png');
                } else {
                    $('#img-preview').attr('src', imgUrl);
                }
            });
//            $('#img-preview').attr('src', $(this).val());
        });
        //submit upload foto
        $('#form-upload').ajaxForm(function (e) {
//            alert('Image uploaded');            
            //tampilkan ke list gambar
            var objimg = JSON.parse(e);
//            alert(objimg.filename);
            var imglink = "{{URL::to('/')}}/" + objimg.filename;
            var newbox = '<div class="col-md-3"><div class="box box-primary"><div class="box-header with-border"><span>' +
                    objimg.title + '</span><div class="box-tools pull-right"><button class="btn btn-box-tool btn-del-image" data-id="' + objimg.id + '" ><i class="fa fa-times">' +
                    '</i></button></div></div><div class="box-body">' +
                    '<a onClick="cbox_call()" class="colorbox" href="' + imglink + '" title="{{$ft->title}}">' +
                    '<img src="' + objimg.filename + '" width="100%"></a>' +
                    '</div><div class="box-footer"></div></div></div>';
            $('#box-upload').after(newbox);
            //set null to input upload
            $('input[name=img-link],input[name=img-uploader],input[name=keterangan]').val(null);
            $('#img-preview').attr('src', 'backend/dist/img/element/picture-logo.png');
//            alert(e);
        });
        //sembunyikan image link input
        $('.tr-img-link').hide();
        //url or lokal
        $('select[name=isexternal]').change(function () {
            //bersihkan preview dan input img
            $('input[name=img-link],input[name=img-uploader]').val(null);
            $('#img-preview').attr('src', 'backend/dist/img/element/picture-logo.png');

            if ($(this).val() == 'Y') {
                $('.tr-img-local').hide();
                $('.tr-img-link').fadeIn(150);

            } else {
                $('.tr-img-link').hide();
                $('.tr-img-local').fadeIn(150);
            }
        });
        //Delete image
        $(document).on('click', '.btn-del-image', function () {
            if (confirm('Hapus image ini?')) {
                var imgId = $(this).data('id');
                var obj = $(this);
                //delete from database
                var getUrl = "{{URL::to('admin/page/foto/delimage')}}" + "/" + imgId;
                $.get(getUrl, null, function (e) {
                    //setelah di delete..hapus dari page
//                    alert('Image deleted');
                    obj.parent('div').parent('div').parent('div').parent('div').fadeOut(250);
                });
            }
        });
//        colorbox
        $('.colorbox').colorbox({
            reposition: true,
            scaleVideos: true,
            width: '50%',
            close: '&times;'
        });

        

    });
</script>
@stop