@extends('back.partials.master')

@section('styles')
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="page-index">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Destinasi</h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Destinasi</a></li>
                <li><a href="#tab_2" data-toggle="tab">Kategori</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class='box-header with-border'>
                       <!--<h3 class='box-title'><i class="fa fa-tag"></i> Color Palette</h3>-->
                        <a class="btn btn-primary pull-right" href="admin/page/destinasi/new">Tambah Destinasi</a>
                    </div>

                    <table class="table table-bordered datatable" id="table-destinasi">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Publish</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($destinasi as $dest)
                            <tr>
                                <td></td>
                                <td>{{$dest->nama}}</td>
                                <td>{{$dest->kategori}}</td>
                                <td>
                                    @if($dest->publish == 'Y')
                                    <label class="label label-success">PUBLISH</label>
                                    @else
                                    <label class="label label-danger">DRAFT</label>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-edit-destinasi btn-xs" data-id="{{$dest->id}}" href="admin/page/destinasi/edit/{{$dest->id}}" ><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger btn-delete-destinasi btn-xs" data-id="{{$dest->id}}"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class='box-header with-border'>
                        <!--<h3 class='box-title'><i class="fa fa-tag"></i> Color Palette</h3>-->
                        <!--<a class="btn btn-primary btn-tambah-kategori pull-right"  >Tambah Kategori</a>-->
                        <a class="btn btn-primary pull-right" href="admin/page/destinasi/new-kategori"   >Tambah Kategori</a>
                    </div>
                    <table class="table table-bordered datatable " id="table-kategori" >
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th>Nama</th>
                                <th class="col-md-2" >Image</th>
                                <th class="col-md-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategori as $kat)
                            <tr>
                                <td></td>
                                <td>{{$kat->nama}}</td>
                                <td>
                                    <img src="{{$img_path . $kat->filename}}" style="width: 100%;" />
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-edit-kategori btn-xs" data-id="{{$kat->id}}" href="admin/page/destinasi/edit-kategori/{{$kat->id}}" ><i class="fa fa-edit"></i></a>
                                    @if($kat->destinasi_sum == 0)
                                    <a class="btn btn-danger btn-delete-kategori btn-xs" data-id="{{$kat->id}}" href="admin/page/destinasi/delete-kategori/{{$kat->id}}"  ><i class="fa fa-trash-o"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="tab-pane" id="tab_3">

                </div><!-- /.tab-pane -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->

    </section><!-- /.content -->

</div><!-- /.content-wrapper -->


<!--<div class="content-wrapper" id="page-tambah">
     Content Header (Page header) 
    <section class="content-header">
        <h1>Tambah Destinasi</h1>
    </section>

     Main content 
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upload Foto</h3>
                        <a class="btn btn-danger pull-right btn-cancel-edit-destinasi" id="btn-cancel-edit-destinasi" ><i class="fa fa-angle-double-left"></i> Cancel</a>
                    </div> /.box-header 
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
                                        <td class="col-md-4" rowspan="4">
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
                                        <td>Image Cover <br/> Min. 270x220px</td>
                                        <td>
                                            <input type="file" name="img-upload-image-destinasi" />
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
                                            <a  class="btn btn-danger btn-cancel-edit-destinasi" data-dismiss="modal" >Cancel</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section> /.content 
</div>-->

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

<!--modal edit kategori-->
<div class="modal" id="modal-edit-kategori" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Kategori Destinasi</h4>
            </div>
            <div class="modal-body">
                <form id="form-edit-kategori-destinasi" action="admin/page/destinasi/edit-kategori" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="kategoriid" />
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
                                    <input type="file" name="img-upl-image-kategori" />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a class="btn btn-danger" id="btn-cancel-edit-kategori" data-dismiss="modal" >Cancel</a>
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
    $(document).ready(function () {
        var _URL = window.URL && window.webkitURL;

        //hide page tambah
        $('#page-tambah').hide();
        //tambah destinasi
        $('#btn-tambah-destinasi').click(function (e) {
            //sembunyikan form index
            $('#page-index').hide();
            //tampilkan form tambah
            $('#page-tambah').fadeIn(500);

        });
        //cancel tambah / edit
        $('#btn-cancel-tambah-destinasi,.btn-cancel-edit-destinasi').click(function (e) {
            //sembunyikan form index
            $('#page-tambah').hide();
            $('#page-edit').hide();
            //tampilkan form tambah
            $('#page-index').fadeIn(500);
            //clear input
            $('#form-new-destinasi input').val(null);
            $('#form-new-destinasi select').val([]);
            $('#form-new-destinasi img').removeAttr('src');
            tinyMCE.get('textarea-new-desc-destinasi').setContent('');
        });
        //tambah destinasi image upload
        $('#form-new-destinasi input[type=file]').change(function (ev) {
            //cek dimensii image
            var image, file;
            var imgPrev = $('#img-prev-image-destinasi');
            var imgInput = $(this);
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function () {
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
                        fr.onload = function (ev2) {
                            console.dir(ev2);
                            imgPrev.attr('src', ev2.target.result);
                        };
                        fr.readAsDataURL(f);
                    }
                };
                image.src = _URL.createObjectURL(file);
            }
        });
        //simpan destinasi baru
        $('#form-new-destinasi').submit(function (e) {
            tinyMCE.triggerSave();
            $('#form-new-destinasi').ajaxSubmit({
                beforeSubmit: function (bs) {
                    $('#form-new-destinasi').loader('show');
                }, success: function (sc) {
                    $('#form-new-destinasi').loader('hide');
                    //clear input
                    $('#form-new-destinasi input').val(null);
                    $('#form-new-destinasi select').val([]);
                    $('#form-new-destinasi img').removeAttr('src');
                    tinyMCE.get('textarea-new-desc-destinasi').setContent('');
                }
            });
            return false;
        });
        /**
         * Delete destinasi
         */
        $('.btn-delete-destinasi').click(function (e) {
            var btn = $(this);
            if (confirm('Delete destinasi ini?')) {
                var id = $(this).data('id');
                var getUrl = "{{URL::to('admin/page/destinasi/delete-destinasi')}}" + "/" + id;
                $.get(getUrl, null, function (res) {
                    alert('Data deleted');
                    //remove from table
                    btn.parent('td').parent('tr').hide(250, function () {
                        var row = btn.closest('tr');
                        var nRow = row[0];
                        $('#table-destinasi').dataTable().fnDeleteRow(nRow);
                    });
                });
            }
        });

        //================SCRIPT OF KATEGORI===============
        //new kategori
        $('.btn-tambah-kategori').click(function (e) {
            $('.modal-dialog').css('width', '50%');
            $('#modal-tambah-kategori').modal('show');
        });
        //image tambah kategori upload
        $('#form-tambah-kategori-destinasi input[type=file]').change(function (ev) {
            //cek dimensii image
            var image, file;
            var imgPrev = $('#form-tambah-kategori-destinasi #img-prev-image-kategori');
            var imgInput = $(this);
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function () {
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
                        fr.onload = function (ev2) {
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
        $('#btn-cancel-tambah-kategori').click(function (e) {
            //clear input
            $('#form-tambah-kategori-destinasi input').val(null);
            $('#form-tambah-kategori-destinasi img').removeAttr('src');
        });
        //submit new kategori
        $('#form-tambah-kategori-destinasi').submit(function (e) {
            $('#form-tambah-kategori-destinasi').ajaxSubmit({
                beforeSubmit: function (bs) {
                    $('#form-tambah-kategori-destinasi').loader('show');
                },
                success: function (sc) {
                    $('#form-tambah-kategori-destinasi').loader('hide');
                    //close modal
                    $('#btn-cancel-tambah-kategori').click();
                    var kategori = JSON.parse(sc);
                    //tampilkan ke table kategori
                    $('#table-kategori').dataTable().fnAddData([
                        null,
                        kategori.nama,
                        '<img src="' + kategori.img_path + kategori.filename + '" class="col-md-12" />',
                        '<a class="btn btn-primary btn-edit-kategori btn-sm" data-id="' + kategori.id + '"  ><i class="fa fa-edit"></i></a>' +
                                '<a class="btn btn-danger btn-delete-kategori btn-sm" data-id="' + kategori.id + '"  ><i class="fa fa-trash-o"></i></a>'
                    ]);
                    //tampilkan ke select option kategori
//                    var o = new Option(kategori.nama, kategori.id);
//                    $(o).html(kategori.nama);
//                    $("select[name=kategori]").append(o);
                }
            });

            return false;
        });
        // Delete kategori
        $(document).on('click', '.btn-delete-kategori', function (e) {
            if (!confirm('Delete kategori ini?')) {
//                var btn = $(this);
//                var katid = $(this).data('id');
//                var getUrl = "{{URL::to('admin/page/destinasi/delete-kategori')}}" + "/" + katid;
//                $.get(getUrl, null, function (de) {
//                    //delete from table
//                    btn.parent('td').parent('tr').hide(250, function () {
//                        var row = btn.closest('tr');
//                        var nRow = row[0];
//                        $('#table-kategori').dataTable().fnDeleteRow(nRow);
//                    });
//                });
                return false;
            }
        });
        //edit kategori
//        var btnEditKategori;
//        $(document).on('click', '.btn-edit-kategori', function (e) {
//            btnEditKategori = $(this);
//
//            var katid = $(this).data('id');
//            var getUrl = "{{URL::to('admin/page/destinasi/kategori-by-id')}}" + "/" + katid;
//            $.get(getUrl, null, function (ge) {
//                var kategori = JSON.parse(ge);
//                $('#modal-edit-kategori input[name=nama]').val(kategori.nama);
//                $('#modal-edit-kategori input[name=kategoriid]').val(kategori.id);
//                $('#modal-edit-kategori img').attr('src', kategori.img_path + kategori.filename);
//                $('#modal-edit-kategori').modal('show');
//            });
//        });
        //edit kategori image change
        $('#form-edit-kategori-destinasi input[type=file]').change(function (ev) {
            //cek dimensii image
            var image, file;
            var imgPrev = $('#form-edit-kategori-destinasi #img-prev-image-kategori');
            var imgInput = $(this);
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function () {
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
                        fr.onload = function (ev2) {
                            console.dir(ev2);
                            imgPrev.attr('src', ev2.target.result);
                        };
                        fr.readAsDataURL(f);
                    }
                };
                image.src = _URL.createObjectURL(file);
            }
        });
        //save edit kategori
        $('#form-edit-kategori-destinasi').submit(function (e) {
            $('#form-edit-kategori-destinasi').ajaxSubmit({
                beforeSubmit: function (bs) {
                    $('#form-edit-kategori-destinasi').loader('show');
                },
                success: function (sc) {
                    $('#form-edit-kategori-destinasi').loader('hide');
                    //close modal
                    $('#btn-cancel-edit-kategori').click();
                    var kategori = JSON.parse(sc);
                    //rubah di tabel
                    ////rubah image
                    var img = btnEditKategori.parent('td').prev().children('img');
                    img.attr('src', kategori.img_path + kategori.filename);
                    ////rubah nama
                    btnEditKategori.parent('td').prev().prev().text(kategori.nama);
                    //tampilkan ke table kategori
//                    $('#table-kategori').dataTable().fnAddData([
//                        null,
//                        kategori.nama,
//                        '<img src="' + kategori.img_path + kategori.filename + '" class="col-md-12" />',
//                        '<a class="btn btn-primary btn-edit-kategori btn-sm" data-id="' + kategori.id + '"  ><i class="fa fa-edit"></i></a>' +
//                                '<a class="btn btn-danger btn-delete-kategori btn-sm" data-id="' + kategori.id + '"  ><i class="fa fa-trash-o"></i></a>'
//                    ]);
                }
            });

            return false;
        });

        //================END SCRIPT OF KATEGORI===============

        // ============== TAB CONTROLLER ======================
        /// Javascript to enable link to tab
        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-tabs a[href=#' + url.split('#')[1] + ']').tab('show');
        }

        //Change hash for page-reload
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.hash;
        });
        // ================END OF TAB CONTROLLER ==============


        //END OF SCRIPT
    });
</script>
@stop