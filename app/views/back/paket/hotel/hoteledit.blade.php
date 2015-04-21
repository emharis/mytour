@extends('back.partials.master')

@section('styles')
<link href="backend/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Hotel</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Hotel</a></li>
                <li><a href="#tab_2" data-toggle="tab">Room <label class="label label-success">{{$hotel->jumlah_room}}</label></a> </li>
                <li><a href="#tab_3" data-toggle="tab"></a></li>    
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$hotel->nama}}</h3>
                        <a class="btn btn-danger pull-right" href="admin/paket/hotel" ><i class="fa fa-angle-double-left"></i> Back</a>
                    </div><!-- /.box-header -->
                    <form id="form-edit-hotel" action="admin/paket/hotel/edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="hotelId" value="{{$hotel->id}}" />
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>
                                        <input value="{{$hotel->nama}}" autocomplete="off" type="text" class="form-control" name="nama" required/>
                                    </td>
                                    <td class="col-md-4" rowspan="4">
                                        <img style="width: 100%" id="img-edit-hotel-prev" src="{{$hotel->imgpath.$hotel->img_cover}}" data-src="{{$hotel->imgpath.$hotel->img_cover}}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>
                                        <input value="{{$hotel->alamat}}" autocomplete="off" type="text" class="form-control" name="alamat" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Image Cover <i>min. 170x139px</i></td>
                                    <td>
                                        <input type="file" name="img-cover-edit-hotel"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <textarea name="desc" id="textarea-edit-desc-hotel" class="tinymce-mid">{{$hotel->desc}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <button type="submit" class="btn btn-primary " id="btn-save-edit-hotel" >Save</button>
                                        <a  href="admin/paket/hotel"  class="btn btn-danger btn-cancel-edit-hotel" data-dismiss="modal" >Cancel</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$hotel->nama}}</h3>
                        <table class="pull-right">
                            <tbody>
                                <tr>
                                    <td><a class="btn btn-primary" id="btn-tambah-room" >Tambah Room</a> </td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td><a class="btn btn-danger " href="admin/paket/hotel" ><i class="fa fa-angle-double-left"></i> Back</a></td>
                                </tr>
                            </tbody>
                        </table>


                    </div><!-- /.box-header -->
                    <form id="form-new-room" action="admin/paket/hotel/newroom" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="hotelId" value="{{$hotel->id}}" />
                        <table class="table table-bordered" id="table-new-room" style="background-color: whitesmoke;">
                            <tbody>
                                <tr>
                                    <td colspan="4"><label>Input data room baru</label></td>
                                    <td rowspan="4" class="col-md-4">
                                        <img id="img-prev-room" style="width: 100%;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>
                                        <input type="text" name="nama" class="form-control" required/>
                                    </td>
                                    <td>Harga</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="text" name="harga" class="form-control text-right" required/>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="currency" class="form-control" required>
                                                    <option value="IDR">IDR</option>
                                                    <option value="USD">USD</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Publish</td>
                                    <td>
                                        <select name="publish" class="form-control" required>
                                            <option value="Y">Publish</option>
                                            <option value="N">Draft</option>
                                        </select>
                                    </td>
                                    <td>Image</td>
                                    <td>
                                        <input type="file" name="img_cover_new_room"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Keterangan</td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <textarea id="textarea-new-room" name="desc" class="tinymce-mini"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <button type="submit" class="btn btn-primary" id="btn-save-room">Save</button>
                                        <a class="btn btn-danger" id="btn-cancel-room">Cancel</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <div class="clearfix"></div><br/>
                    <table id="table-room" class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Currency</th>
                                <th>Publish</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $rm)
                            <tr>
                                <td></td>
                                <td>{{$rm->nama}}</td>
                                <td><i class="currency pull-right">{{$rm->harga}}</i></td>
                                <td>{{$rm->currency}}</td>
                                <td>
                                    @if($rm->publish == 'Y')
                                    <label class="label label-success">PUBLISH</label>
                                    @else
                                    <label class="label label-success">DRAFT</label>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-xs btn-edit-room" data-id="{{$rm->id}}" ><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger btn-xs btn-del-room" data-id="{{$rm->id}}" ><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<div class="modal" id="modal-edit-room" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Room</h4><i>{{$hotel->nama}}</i>
            </div>
            <div class="modal-body">
                <form id="form-edit-room" method="POST" action="admin/paket/hotel/editroom" enctype="multipart/form-data">
                    <input type="hidden" name="roomId" />
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>
                                    <input type="text" class="form-control" name="nama"/>
                                </td>
                                <td>Publish</td>
                                <td>
                                    <select name="publish" class="form-control">
                                        <option value="Y">PUBLISH</option>
                                        <option value="N">DRAFT</option>
                                    </select>
                                </td>
                                <td rowspan="4" class="col-md-4">
                                    <label>Image : </label>
                                    <i>min 170x139px</i>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <img style="width: 100%"/>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <input type="file" name="img_cover_edit_room"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>
                                    <input type="text" class="form-control text-right currency" name="harga"/>
                                </td>
                                <td>Currency</td>
                                <td>
                                    <select name="currency" class="form-control" >
                                        <option value="IDR">IDR</option>
                                        <option value="USD">USD</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <textarea name="desc" id="tinymce-edit-room" class="tinymce-full"></textarea>
                                </td>                                    
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <button type="submit" class="btn btn-primary" id="btn-save-edit-room">Save</button>
                                    <a data-dismiss="modal" class="btn btn-danger" id="btn-cancel-edit-room">Cancel</a>
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
<script src="backend/plugins/jqueryform/jquery.form.min.js" type="text/javascript"></script>
<script src="backend/plugins/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
<script src="js/jquery.formatCurrency-1.4.0.min.js" type="text/javascript"></script>
<script src="js/jquery.formatCurrency.all.js" type="text/javascript"></script>
@include('back.partials.tablescript')
@include('back.partials.editorscript')
<script>
    $(document).ready(function () {
        var btnSaveEditHotel = $('#btn-save-edit-hotel');
        var frmEditHotel = $('#form-edit-hotel');
        var inpFileEditHotel = $('input[name=img-cover-edit-hotel]');
        //event click btn save new hotel
        btnSaveEditHotel.click(function (e) {
//            tinyMCE.get('textarea-edit-desc-hotel').triggerSave();
            tinyMCE.triggerSave();
        });
        //event upload imageon new hotel
        var _URL = window.URL && window.webkitURL;
        inpFileEditHotel.change(function (ev) {
            //cek dimensii image
            var image, file;
            var imgPrev = $('#img-edit-hotel-prev');
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function () {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 170 || this.height < 139) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        inpFileEditHotel.val(null);
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

        //sembunyikan form input roomm
        $('#form-new-room').hide();
        //tambah room btn clicked
        $('#btn-tambah-room').click(function () {
            $('#form-new-room').slideDown(350);
        });
        //close form new room
        $('#btn-cancel-room').click(function () {
            cleaninputroom();
            $('#form-new-room').slideUp(350);
        });
        //simpan new room
        $('#btn-save-room').click(function (e) {
//            tinyMCE.triggerSave();
//            tinyMCE.get('textarea-new-room').triggerSave();
            tinyMCE.triggerSave();
        });
        $('#form-new-room').ajaxForm(function (e) {
//            alert('submitting....');
//            alert(e);
            cleaninputroom();
            $('#btn-cancel-room').click();
            //input to table
            var newroom = JSON.parse(e);
            var publish = '<label class="label label-danger">DRAFT</label>';
            if (newroom.publish == 'Y') {
                publish = '<label class="label label-success">PUBLISH</label>';
            }
            $('#table-room').dataTable().fnAddData([
                null,
                newroom.nama,
                '<i class="currency pull-right" >' + newroom.harga + '</i>',
                newroom.currency,
                publish,
                '<a class="btn btn-primary btn-xs btn-edit-room" data-id="' + newroom.id + '" ><i class="fa fa-edit"></i></a>' +
                        '<a class="btn btn-danger btn-xs btn-del-room" data-id="' + newroom.id + '" ><i class="fa fa-trash-o"></i></a>'
            ]);
            //format currency
            toCurrency();
        });
        //clean input new room
        function cleaninputroom() {
            $('#form-new-room input[type=text]').val(null);
            $('#form-new-room input[type=file]').val(null);
            $('#form-new-room select').val([]);
            $('#form-new-room img').removeAttr('src');
            tinyMCE.get('textarea-new-room').setContent('');
        }
        //file image upload
        $('#form-new-room input[type=file]').change(function (ev) {
            //cek dimensii image
            var image, file;
            var imgPrev = $('#form-new-room img');
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function () {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 170 || this.height < 139) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        inpFileEditHotel.val(null);
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
        //currency format
        $(document).on('blur', 'input[name=harga], input.currency', function () {
            $(this).formatCurrency({symbol: ''});
        });
        function toCurrency() {
            $('.currency').formatCurrency({symbol: ''});
        }
        toCurrency();
        //edit room
        var btnEdit;
        $(document).on('click', '.btn-edit-room', function (e) {
            var roomId = $(this).data('id');
            btnEdit = $(this);
            var getUrl = "{{URL::to('admin/paket/hotel/room-by-id')}}" + "/" + roomId;
            $.get(getUrl, null, function (e) {
                var room = JSON.parse(e);
                $('#form-edit-room input[name=roomId]').val(room.id);
                $('#form-edit-room input[name=nama]').val(room.nama);
                $('#form-edit-room input[name=harga]').val(room.harga);
                $('#form-edit-room select[name=currency]').val(room.currency);
                $('#form-edit-room select[name=publish]').val(room.publish);
                $('#form-edit-room input[name=harga]').blur();
                $('#form-edit-room img').attr('src', room.imgpath + room.img_cover);
                tinyMCE.get('tinymce-edit-room').setContent(room.desc);
                $('#modal-edit-room').modal('show');
            });
        });
        //save edit room
        $('#btn-save-edit-room').click(function (e) {
//            tinyMCE.triggerSave();
//            tinyMCE.get('tinymce-edit-room').triggerSave();
            tinyMCE.triggerSave();
        });
        $('#form-edit-room').ajaxForm(function (e) {
            alert('Data perubahan hotel telah disimpan.');
            //close form edit
            $('#btn-cancel-edit-room').click();
            var room = JSON.parse(e);
            btnEdit.parent('td').prev().prev().prev().prev().html(room.nama);
            btnEdit.parent('td').prev().prev().prev().html('<i class="currency pull-right">' + room.harga + '</i>');
            btnEdit.parent('td').prev().prev().html(room.currency);
            var publish = '<label class="label label-danger">DRAFT</label>';
            if (room.publish == 'Y') {
                publish = '<label class="label label-success">PUBLISH</label>';
            }
            btnEdit.parent('td').prev().html(publish);
            toCurrency();
        });
        //file image upload for edit room
        $('#form-edit-room input[type=file]').change(function (ev) {
            //cek dimensii image
            var image, file;
            var imgPrev = $('#form-edit-room img');
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function () {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 170 || this.height < 139) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        inpFileEditHotel.val(null);
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
        //delete room
        $(document).on('click', '.btn-del-room',function (e) {
            var btn = $(this);
            if (confirm('Hapus data room ini?')) {
                var roomId = $(this).data('id');
                var deleteUrl = "{{URL::to('admin/paket/hotel/delroom')}}" + "/" + roomId;
                $.get(deleteUrl, null, function () {
                    //delete tr
                    var row = btn.closest('tr');
                    var nRow = row[0];
                    $('#table-room').dataTable().fnDeleteRow(nRow);
                }).fail(function (e) {
                    alert('Gagal delete room hotel');
                });
            }
        });
    });
</script>

@stop