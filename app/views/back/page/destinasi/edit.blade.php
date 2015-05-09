@extends('back.partials.master')

@section('styles')
<link href="backend/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="page-index">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Destinasi</h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Destinasi</a></li>
                <li><a href="#tab_2" data-toggle="tab">Images</a></li>
                <li><a href="#tab_3" data-toggle="tab">Youtube</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    @include('back.page.destinasi.inc_edit')
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    @include('back.page.destinasi.inc_images')
                </div>
                <div class="tab-pane" id="tab_3">
                    @include('back.page.destinasi.inc_youtube')
                </div><!-- /.tab-pane -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->

    </section><!-- /.content -->

</div><!-- /.content-wrapper -->

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

<script src="backend/plugins/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        //================TAMBAH KATEGORI============================================
        var _URL = window.URL && window.webkitURL;
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
                    //tampilkan ke select option kategori
                    var o = new Option(kategori.nama, kategori.id);
                    $(o).html(kategori.nama);
                    $("select[name=kategori]").append(o);

                }
            });

            return false;
        });
        //===================================================================

        //===========EDIT DATA===============================================
        //tambah destinasi image upload
        $('#form-edit-destinasi input[type=file]').change(function(ev) {
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
        //tambah image
        $('#form-tambah-image').hide();
        $('#btn-tambah-image').click(function(e) {
            $('#form-tambah-image').slideDown(250);
        });
        //cancel tambah image
        $('#btn-cancel-tambah-image').click(function() {
            //clear input 
            $('#form-tambah-image select').val(null);
            $('#form-tambah-image input[type=file]').val(null);
            $('#form-tambah-image input[name=filename]').val(null);
            $('#form-tambah-image img').removeAttr('src');
            //hide form
            $('#form-tambah-image').slideUp(250);
        });
        //change type image local atau url
        ////sembunyikan dulu input url
        $('#form-tambah-image input[name=filename]').hide();
        $('select[name=islocal]').change(function(e) {
            //clear input
            $('#form-tambah-image input[type=file]').val(null);
            $('#form-tambah-image input[name=filename]').val(null);
            $('#form-tambah-image img').removeAttr('src');

            if ($(this).val() == 'Y') {
                $('#form-tambah-image input[name=filename]').parent('td').prev().text('Image');
                $('#form-tambah-image input[name=filename]').hide();
                $('#form-tambah-image input[type=file]').show();
            } else {
                $('#form-tambah-image input[name=filename]').parent('td').prev().text('URL');
                $('#form-tambah-image input[type=file]').hide();
                $('#form-tambah-image input[name=filename]').show();
            }
        });

        //upload image
        $('#form-tambah-image input[type=file]').change(function(ev) {
            //cek dimensii image
            var image, file;
            var imgPrev = $('#form-tambah-image img');
            var imgInput = $(this);
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function() {
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
        //url input change
        $('#form-tambah-image input[name=filename]').change(function(e) {
            $('#form-tambah-image img').attr('src', $(this).val());
        });
        //submit tambah image
        $('#form-tambah-image').submit(function(e) {
            //cek apakah gambar sudah terisi atau belum
            var srcImg = $('#form-tambah-image img').attr('src');
            if (srcImg != '') {
                $('#form-tambah-image').ajaxSubmit(function(res) {
                    //clear input
                    $('#form-tambah-image select').val(null);
                    $('#form-tambah-image input[type=file]').val(null);
                    $('#form-tambah-image input[name=filename]').val(null);
                    $('#form-tambah-image img').removeAttr('src');
                    //hide input form
                    $('#btn-cancel-tambah-image').click();
                    //tampilkan ke table
                    var newimg = JSON.parse(res);

                    var imgprev = '<img class="col-md-12" src="' + newimg.img_path + newimg.filename + '" />';
                    if (newimg.islocal == 'N') {
                        imgprev = '<img class="col-md-12" src="' + newimg.filename + '" />';
//                        imgprev = '<img style="width:inherit;" src="' + newimg.filename + '" />';
                    }

                    $('#table-daftar-image').dataTable().fnAddData([
                        null,
                        newimg.filename,
                        null,
                        imgprev,
                        '<a class="btn btn-danger btn-del-image btn-xs" data-id="' + newimg.id + '" ><i class="fa fa-trash-o"></i></a>' +
                                '<a class="btn btn-primary btn-set-cover btn-xs" data-id="' + newimg.id + '" >Set Image Cover</a>'
                    ]);
                });
            } else {
                alert('Tidak ada gambar yang ditambahkan.');
            }
            return false;
        });
        //set image cover
        $(document).on('click', '.btn-set-cover', function(e) {
            if (confirm('Jadikan image ini sebagai image cover?')) {

                var imgId = $(this).data('id');
                var getUrl = "{{URL::to('admin/page/destinasi/set-cover')}}" + "/" + imgId;
                var btn = $(this);
                $.get(getUrl, null, function(e) {
                    var img = JSON.parse(e);
                    //hilangkan label mainimage/cover
                    $('.label-image-cover').remove();
                    btn.parent('td').prev().prev().html('<label class="label label-success label-image-cover" ><i class="fa fa-check"></i></label>');
                    //change display image cover
                    if (img.islocal == 'Y') {
                        $('#img-prev-image-destinasi').attr('src', img.img_path + img.filename);
                    } else {
                        $('#img-prev-image-destinasi').attr('src', img.filename);
                    }
                });
            }
        });
        //delete image
        $(document).on('click', '.btn-del-image', function(e) {
            var btnDel = $(this);
            if (confirm('Hapus data image ini?')) {

                var imgId = $(this).data('id');
                var getUrl = "{{URL::to('admin/page/destinasi/delete-image')}}" + "/" + imgId;
                $.get(getUrl, null, function(de) {
                    //get mainimage/first row image
                    var mainimg = JSON.parse(de);
                    //remove table                    
                    btnDel.parent('td').parent('tr').hide(250, function() {
                        var row = btnDel.closest('tr');
                        var nRow = row[0];
                        $('#table-daftar-image').dataTable().fnDeleteRow(nRow);

                        if (mainimg.main_img == 'Y') {
                            //jadikan main image row yang pertama
                            $('#table-daftar-image').children('tbody').first().children('tr').first().children('td').first().next().next().html('<label class="label label-success label-image-cover" ><i class="fa fa-check"></i></label>');
                            if (mainimg.islocal == 'Y') {
                                $('#img-prev-image-destinasi').attr('src', mainimg.img_path + mainimg.filename);
                            } else {
                                $('#img-prev-image-destinasi').attr('src', mainimg.filename);
                            }
                        }

                    });
                });
            }
        });

        //MANAGE VIDEO
        ////tambah youtube
        $('#form-tambah-youtube').hide();
        $('#btn-tambah-youtube').click(function(e) {
            $('#form-tambah-youtube').slideDown(250);
        });
        //cancel tambah youtube
        $('#btn-cancel-tambah-youtube').click(function() {
            //clear input 
            $('#form-tambah-youtube select').val(null);
            $('#form-tambah-youtube input[type=file]').val(null);
            $('#form-tambah-youtube input[name=youtubeid]').val(null);
            $('#form-tambah-youtube img').removeAttr('src');
            //hide form
            $('#form-tambah-youtube').slideUp(250);
        });
        //change type youtube local atau url
        ////sembunyikan dulu input url
        $('#form-tambah-youtube input[name=filename]').hide();
//        $('select[name=islocal]').change(function(e) {
//            //clear input
//            $('#form-tambah-youtube input[type=file]').val(null);
//            $('#form-tambah-youtube input[name=filename]').val(null);
//            $('#form-tambah-youtube img').removeAttr('src');
//
//            if ($(this).val() == 'Y') {
//                $('#form-tambah-youtube input[name=filename]').parent('td').prev().text('Image');
//                $('#form-tambah-youtube input[name=filename]').hide();
//                $('#form-tambah-youtube input[type=file]').show();
//            } else {
//                $('#form-tambah-youtube input[name=filename]').parent('td').prev().text('URL');
//                $('#form-tambah-youtube input[type=file]').hide();
//                $('#form-tambah-youtube input[name=filename]').show();
//            }
//        });

        //upload youtube
//        $('#form-tambah-youtube input[type=file]').change(function(ev) {
//            //cek dimensii youtube
//            var youtube, file;
//            var imgPrev = $('#form-tambah-youtube img');
//            var imgInput = $(this);
//            if ((file = this.files[0])) {
//                youtube = new Image();
//                youtube.onload = function() {
//                    //cek dimension jika tidak sesuai sembunyikan tombol submit
//                    if (this.width < 270 || this.height < 220) {
//                        alert('Dimensi youtube tidak sesuai.');
//                        //set null youtube upload
//                        imgInput.val(null);
//                        imgPrev.removeAttr('src');
//                    } else {
//                        var f = ev.target.files[0];
//                        var fr = new FileReader();
//                        fr.onload = function(ev2) {
//                            console.dir(ev2);
//                            imgPrev.attr('src', ev2.target.result);
//                        };
//                        fr.readAsDataURL(f);
//                    }
//                };
//                youtube.src = _URL.createObjectURL(file);
//            }
//        });
        //youtubeid input change
        $('#form-tambah-youtube input[name=youtubeid]').change(function(e) {
            loadVideoThumb(0);
        });
        function loadVideoThumb(thumbnum) {
            var youtubeUrl = $('#form-tambah-youtube input[name=youtubeid]').val();
            var postUrl = "{{URL::to('admin/page/destinasi/youtube-id')}}";
            $('#form-tambah-youtube img').parent('td').loader('show');
            $.post(postUrl, {
                'url': youtubeUrl
            }, function(res) {
                $('#form-tambah-youtube img').parent('td').loader('hide');
                $('#form-tambah-youtube img').attr('src', 'http://img.youtube.com/vi/' + res + '/' + thumbnum + '.jpg');
            });
        }
        //image thumbnail select change
        $('#form-tambah-youtube select[name=youtube_prev_option]').change(function(e) {
//            $('#form-tambah-youtube img').attr('src', 'http://img.youtube.com/vi/' + $('#form-tambah-youtube input[name=youtubeid]').val() + '/' + $(this).val() + '.jpg');
            loadVideoThumb($(this).val());
        });
        //submit tambah youtube
        $('#form-tambah-youtube').submit(function(e) {
            //cek apakah gambar sudah terisi atau belum
            $('#form-tambah-youtube').ajaxSubmit(function(res) {
                //clear input
                $('#form-tambah-youtube select').val(null);
                $('#form-tambah-youtube input[type=file]').val(null);
                $('#form-tambah-youtube input[name=youtubeid]').val(null);
                $('#form-tambah-youtube img').removeAttr('src');
                //hide input form
                $('#btn-cancel-tambah-youtube').click();
                //tampilkan ke table
                var newyoutube = JSON.parse(res);

//                var youtubeprev = 'http://img.youtube.com/vi/' + newyoutube.filename + '/' + newyoutube.vidthumb + '.jpg';                
                var youtubeprev = '<a class="colorbox" href="http://www.youtube.com/embed/' + newyoutube.filename + '" title="' + newyoutube.filename + '">'+
                    '<img style="width: 100%;"  src="http://img.youtube.com/vi/' + newyoutube.filename + '/' +  newyoutube.vidthumb + '.jpg">' +
                '</a>';
                //tambah youtube ke table
                $('#table-daftar-youtube').dataTable().fnAddData([
                    null,
                    'https://www.youtube.com/watch?v=' + newyoutube.filename,
                    youtubeprev,
                    '<a class="btn btn-danger btn-del-youtube btn-xs" data-id="' + newyoutube.id + '" ><i class="fa fa-trash-o"></i></a>'
                ]);
                //init colorbox
                setColorbox();
            });
            return false;
        });
        //set youtube cover
//        $(document).on('click', '.btn-set-cover', function(e) {
//            if (confirm('Jadikan youtube ini sebagai youtube cover?')) {
//
//                var imgId = $(this).data('id');
//                var getUrl = "{{URL::to('admin/page/destinasi/set-cover')}}" + "/" + imgId;
//                var btn = $(this);
//                $.get(getUrl, null, function(e) {
//                    var img = JSON.parse(e);
//                    //hilangkan label mainyoutube/cover
//                    $('.label-youtube-cover').remove();
//                    btn.parent('td').prev().prev().html('<label class="label label-success label-youtube-cover" ><i class="fa fa-check"></i></label>');
//                    //change display youtube cover
//                    if (img.islocal == 'Y') {
//                        $('#img-prev-youtube-destinasi').attr('src', img.img_path + img.filename);
//                    } else {
//                        $('#img-prev-youtube-destinasi').attr('src', img.filename);
//                    }
//                });
//            }
//        });
        //delete youtube
        $(document).on('click', '.btn-del-youtube', function(e) {
            var btnDel = $(this);
            if (confirm('Hapus data youtube ini?')) {

                var imgId = $(this).data('id');
                var getUrl = "{{URL::to('admin/page/destinasi/delete-youtube')}}" + "/" + imgId;
                $.get(getUrl, null, function(de) {
                    //get mainyoutube/first row youtube
//                    var mainimg = JSON.parse(de);
                    //remove table                    
                    btnDel.parent('td').parent('tr').hide(250, function() {
                        var row = btnDel.closest('tr');
                        var nRow = row[0];
                        $('#table-daftar-youtube').dataTable().fnDeleteRow(nRow);

//                        if (mainimg.main_img == 'Y') {
//                            //jadikan main youtube row yang pertama
//                            $('#table-daftar-youtube').children('tbody').first().children('tr').first().children('td').first().next().next().html('<label class="label label-success label-youtube-cover" ><i class="fa fa-check"></i></label>');
//                            if (mainimg.islocal == 'Y') {
//                                $('#img-prev-youtube-destinasi').attr('src', mainimg.img_path + mainimg.filename);
//                            } else {
//                                $('#img-prev-youtube-destinasi').attr('src', mainimg.filename);
//                            }
//                        }

                    });
                });
            }
        });
        //===================================================================
        
        //colorbox
        var cbwidth = $(document).width() * 50 / 100;
        var cbheight = $(document).height() * 50 / 100;
        function setColorbox() {
            var cb = $('.colorbox');
            cb.colorbox({
                iframe: true,
                reposition: true,
                scaleVideos: true,
                innerWidth: cbwidth,
                innerHeight: cbheight,
                close: '&times;'
            });
        }
        setColorbox();
    });
</script>
@stop