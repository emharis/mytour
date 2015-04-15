@extends('back.partials.master')

@section('styles')
<link href="backend/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Galeri Youtube Video</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upload Video</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="form-upload" action="admin/page/video/upload" method="POST" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>

                                    </tr>
                                    <tr >
                                        <td>
                                            <label class="img-link-element">Youtube Video ID <i title="Youtube ID adalah sebuah kode yang dapat dilihat pada link URL video, terletak di bagian paing belakang ilnk video. Contoh link : https://www.youtube.com/watch?v=d6dW6TuQw-g , maka Youtube ID adalah d6dW6TuQw-g">?</i> </label>
                                            <input type="text" id="img-link" name="img-link" class="form-control img-link-element" required/>
                                        </td>
                                        <td rowspan="2" class="col-md-6 text-center">
                                            <img style="max-width:100%;" id="img-preview" src="backend/dist/img/element/youtube.png"/>
                                        </td>
                                    </tr>                                
                                    <tr>
                                        <td>
                                            <label>Judul/Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

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
            @foreach($videos as $vd)
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <span>{{$vd->title}}</span>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool btn-del-image" data-id="{{$vd->id}}" ><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <a class="colorbox" href="http://www.youtube.com/embed/{{$vd->filename}}" title="{{$vd->title}}">
                            <img width="200"  src="http://img.youtube.com/vi/{{$vd->filename}}/0.jpg">
                        </a>
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
//        var _URL = window.URL || window.webkitURL;
//        $('#img-uploader').on('change', function (ev) {
//            var image, file;
//            if ((file = this.files[0])) {
//                image = new Image();
//                image.onload = function () {
////                    alert("The image width is " + this.width + " and image height is " + this.height);                    
//                    //cek dimension jika tidak sesuai sembunyikan tombol submit
////                    if (this.width < 270 && this.height < 220) {
////                        alert('Dimensi image tidak sesuai.');
////                        //set null image upload
////                        $('input[name=img-uploader]').val(null);
////                        $('#img-preview').attr('src', 'backend/dist/img/element/youtube.png');
////                    } else {
//                        //preview image
//                        var f = ev.target.files[0];
//                        var fr = new FileReader();
//
//                        fr.onload = function (ev2) {
//                            console.dir(ev2);
//                            $('#img-preview').attr('src', '' ev2.target.result);
//                        };
//
//                        fr.readAsDataURL(f);
////                    }
//                };
//                image.src = _URL.createObjectURL(file);
//            }
//        });
//        //preview image from url
        $('input[name=img-link]').change(function () {
            var tmpImg = new Image();
            var youtubeId = $(this).val();
            tmpImg.src = 'http://img.youtube.com/vi/' + youtubeId; //or  document.images[i].src;
            $(tmpImg).on('load', function () {
                $('#img-preview').attr('src', 'http://img.youtube.com/vi/' + youtubeId + "/0.jpg");
            });
        });
        //submit upload video
        $('#form-upload').ajaxForm(function (e) {
            alert('Image uploaded');
            //tampilkan ke list gambar
            var objimg = JSON.parse(e);
//            alert(objimg.filename);
            var newbox = '<div class="col-md-3"><div class="box box-primary"><div class="box-header with-border"><span>' +
                    objimg.title + '</span><div class="box-tools pull-right"><button class="btn btn-box-tool btn-del-image" data-id="' + objimg.id + '" ><i class="fa fa-times">' +
                    '</i></button></div></div><div class="box-body">' +
                    '<a class="colorbox" href="http://www.youtube.com/embed/' + objimg.filename + '" title="{{$vd->title}}">' +
                    '<img width="200"  src="http://img.youtube.com/vi/' + objimg.filename + '/0.jpg"></a>'
            '</div><div class="box-footer"></div></div></div>';
            $('#box-upload').after(newbox);
            //set null to input upload
            $('input[name=img-link],input[name=img-uploader],input[name=keterangan]').val(null);
            $('#img-preview').attr('src', 'backend/dist/img/element/youtube.png');
//            alert(e);
        });
        //colorbox
        $('.colorbox').colorbox({
            iframe: true,
            reposition: true,
            scaleVideos: true,
            innerWidth: $(document).width() * 50 / 100,
            innerHeight: $(document).height() * 50 / 100,
            close: '&times;'
        });
        
        //sembunyikan image link input
//        $('.tr-img-link').hide();
        //url or lokal
//        $('select[name=isexternal]').change(function () {
//            //bersihkan preview dan input img
//            $('input[name=img-link],input[name=img-uploader]').val(null);
//            $('#img-preview').attr('src', 'backend/dist/img/element/youtube.png');
//
//            if ($(this).val() == 'Y') {
//                $('.tr-img-local').hide();
//                $('.tr-img-link').fadeIn(150);
//
//            } else {
//                $('.tr-img-link').hide();
//                $('.tr-img-local').fadeIn(150);
//            }
//        });
        //Delete image
        $(document).on('click', '.btn-del-image', function () {
            if (confirm('Hapus image ini?')) {
                var imgId = $(this).data('id');
                var obj = $(this);
                //delete from database
                var getUrl = "{{URL::to('admin/page/video/delimage')}}" + "/" + imgId;
                $.get(getUrl, null, function (e) {
                    //setelah di delete..hapus dari page
//                    alert('Image deleted');
                    obj.parent('div').parent('div').parent('div').parent('div').fadeOut(250);
                });
            }
        });
    });
</script>
@stop