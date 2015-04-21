@extends('back.partials.master')

@section('styles')
<link href="backend/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Hotel</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <!--<h3 class="box-title">Upload Foto</h3>-->
                        <a class="btn btn-primary btn-sm btn-tambah-hotel pull-right" >Tambah</a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered datatable" id="table-hotel">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Room</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hotels as $ht)
                                <tr>
                                    <td></td>
                                    <td>{{$ht->nama}} </td>
                                    <td>{{$ht->alamat}} </td>
                                    <td>
                                        @if($ht->jumlah_room > 0)
                                        <a class="label label-success">{{$ht->jumlah_room}}</a> 
                                        @else
                                        Tidak ada room
                                        @endif

                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-xs btn-edit-hotel" data-id="{{$ht->id}}" ><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger btn-xs btn-del-hotel" data-id="{{$ht->id}}" ><i class="fa fa-trash-o"></i></a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('back.paket.hotel.new')
        @include('back.paket.hotel.edit')

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
    $(document).ready(function () {
        /**
         * Fungsi untuk menampilkan/menyembunyikan form
         * @param {boolean} $table
         * @param {boolean} $new
         * @param {boolean} $edit
         * @returns {undefined}
         */
        function formstate($table, $new, $edit) {
            if ($table) {
                $('#row-table').fadeIn(250);
            } else {
                $('#row-table').hide();
            }
            if ($new) {
                $('#row-new').fadeIn(250);
            } else {
                $('#row-new').hide();
            }
            if ($edit) {
                $('#row-edit').fadeIn(250);
            } else {
                $('#row-edit').hide();
            }
        }
        /**
         * Clear input new/edit
         * @returns {undefined}
         */
        function clearinput() {
            $('input[type=text]').val(null);
//            $('input[name=alamat]').val(null);
            $('input[type=file]').val(null);
            $('input[type=select]').val([]);
            $('.img-preview').removeAttr('src');
        }
        //call form state untuk pertama kali
        formstate(true, false, false);
        //tambah data hotel
        $('.btn-tambah-hotel').click(function () {
            //tampilkan & sembunyikan form
            formstate(false, true, false);
        });
        //batal tambah hotel
        $('.btn-cancel-hotel').click(function () {
            clearinput();
            //toggle new room
            //set toggle to hide
            //open form
            formstate(true, false, false);
        });
        //delete hotel
        $(document).on('click', '.btn-del-hotel', function () {
            if (confirm('Hapus data hotel ini?')) {
                var btn = $(this);
                var hotelId = $(this).data('id');
                var delUrl = "{{URL::to('admin/paket/hotel/del-hotel')}}" + "/" + hotelId;
                $.get(delUrl, null, function (e) {
                    alert('Data hotel telah di hapus');
                    //hapus data dari tabel
                    btn.parent('td').parent('tr').hide();
                });
            }
        });
        //========NEW HOTEL=============
        /**
         * Preview Image cover upload
         */
        var _URL = window.URL && window.webkitURL;
        $('#form-new-hotel input[name=img-cover]').change(function (ev) {
            //cek dimensii image
            var image, file;
            var inputUpl = $(this);
            var imgPrev = $('#form-new-hotel .img-preview');
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function () {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 170 || this.height < 139) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        inputUpl.val(null);
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
        /**
         * Simpan hotel baru
         */
        $('.btn-save-hotel').click(function (e) {
            tinyMCE.triggerSave();
        });
        $('#form-new-hotel').ajaxForm(function (e) {
            alert('Data hotel baru telah disimpan.');
            //tampilkan ke table
            var hotelObj = JSON.parse(e);
            $('#table-hotel').dataTable().fnAddData([
                null,
                hotelObj.nama,
                hotelObj.alamat,
                'tidak ada room',
                '<a class="btn btn-primary btn-xs btn-edit-hotel" data-id="' + hotelObj.id + '" ><i class="fa fa-edit"></i></a>' +
                        '<a class="btn btn-danger btn-xs btn-del-hotel" data-id="' + hotelObj.id + '" ><i class="fa fa-trash-o"></i></a>'
            ]);
            //clear input
            $('#form-new-hotel .btn-cancel-hotel').click();
        });
        //========END NEW HOTEL=========

        //================EDIT HOTEL=================
        /**
         * Edit Hotel
         */
//         $('input[name=harga]').autoNumeric('init');  
        var btnEdit;
        $(document).on('click', '.btn-edit-hotel', function () {
            //get data from dbase
            btnEdit = $(this);
            var hotelId = $(this).data('id');
            var getUrl = "{{URL::to('admin/paket/hotel/hotel-by-id')}}" + "/" + hotelId;
            $.get(getUrl, null, function (e) {
                var hotelObj = JSON.parse(e);
                //show to view page
                $('input[name=hotelId]').val(hotelObj.id);
                $('#form-edit-hotel input[name=nama]').val(hotelObj.nama);
                $('#form-edit-hotel input[name=alamat]').val(hotelObj.alamat);
                $('#form-edit-hotel input[type=file]').val(null);
                tinyMCE.get('textarea-desc-hotel').setContent(hotelObj.desc);
                $('#form-edit-hotel .img-preview').attr('src', hotelObj.imgpath + hotelObj.img_cover);
                $('#form-edit-hotel .img-preview').data('img', hotelObj.imgpath + hotelObj.img_cover);
                //menampilkan daftar room
                var getRoomUrl = "{{URL::to('admin/paket/hotel/rooms')}}" + "/" + hotelId;
                
                $.get(getRoomUrl, null, function (e) {
//                    alert('get rooms...');
                    var roomsObj = JSON.parse(e);
                    
                    var roomTable = $('#table-room').dataTable();
                    roomTable.fnClearTable();
//                    alert('done parsing...');
                    //tampilkan ke table
                    for (var i = 0; i < roomsObj.length; i++) {
                        var publish = "";
                        if (roomsObj[i].publish == 'Y') {
                            publish = '<label class="label label-success">publish</label>';
                        } else {
                            publish = '<label class="label label-danger">draft</label>';
                        }

//                        $('#table-room').dataTable().fnAddData([
                        roomTable.fnAddData([
                            null,
                            roomsObj[i].nama,
                            '<label class="currency pull-right" >' + roomsObj[i].harga + '</label>',
                            roomsObj[i].currency,
                            publish,
                            '<a class="btn btn-primary btn-xs btn-edit-room" data-id="' + roomsObj[i].id + '" ><i class="fa fa-edit"></i></a>' + 
                            '<a class="btn btn-danger btn-xs btn-delete-room" data-id="' + roomsObj[i].id + '" ><i class="fa fa-trash-o"></i></a>' 
                        ]);
                    }
                    //format currency
                    toCurrency();
                });
            });
            //tampilkan form
            formstate(false, false, true);
        });
        /**
         * Preview Image cover upload
         */
//        var _URL = window.URL && window.webkitURL;
        $('#form-edit-hotel input[name=img-cover]').change(function (ev) {
            //cek dimensii image
            var image, file;
            var inputUpl = $(this);
            var imgPrev = $('#form-edit-hotel .img-preview');
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function () {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 170 || this.height < 139) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        inputUpl.val(null);
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
        //Reset image to default
        $('#btn-reset-image').click(function () {
            $('#form-edit-hotel .img-preview').attr('src', $('#form-edit-hotel .img-preview').data('img'));
            $('#form-edit-hotel input[type=file]').val(null);
        });
        /**
         * Simpan hotel baru
         */
        $('#form-edit-hotel').ajaxForm(function (e) {
            alert('Perubahan data hotel telah disimpan.');
            //tampilkan ke table
            var hotelObj = JSON.parse(e);
            //update ke table
            btnEdit.parent('td').prev().prev().prev().text(hotelObj.nama);
            btnEdit.parent('td').prev().prev().text(hotelObj.alamat);
        });
        //============END EDIT HOTEL==================

        //===========ROOM MANAGER=====================
        /**
         * Hide room input new
         */
        $('#form-new-room').hide();
        /**
         * Tambah room baru
         */
        $('#btn-tambah-room').click(function () {
            $('#form-new-room').slideDown(1000, function () {
                location.hash = 'form-new-room';
            });
        });
        /**
         * Tutup form new room
         */
        function clearinputroom() {
            //bersih kan input new room
            $('#form-new-room input').val(null);
            $('#form-new-room select').val([]);
            $('#form-new-room #img-prev-room').removeAttr('src');
//                tinymce.activeEditor.val(null);
            tinyMCE.get('textarea-desc').setContent('');
        }

        $('#btn-cancel-room').click(function () {
            $('#form-new-room').slideUp(1000, function () {
                clearinputroom();
                //point to row-edit
                location.hash = 'row-edit';
            });
        });
        /**
         * Image cover upload for room
         */
        $('#form-new-room input[type=file]').change(function (ev) {
            //cek dimensii image
            //cek dimensii image
            var image, file;
            var inputUpl = $(this);
            var imgPrev = $('#img-prev-room');
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function () {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 170 || this.height < 139) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        inputUpl.val(null);
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
        //button save room click
        $('#btn-save-room').click(function (e) {
            tinyMCE.triggerSave();
        });
        //Simpan new room
        $('#form-new-room').ajaxForm(function (e) {
            alert('Data room telah disimpan.');
            //clear input
//            clearinputroom();
            //tampilkan ke table room
            var room = JSON.parse(e);
            var publish = "";
            if (room.publish == 'Y') {
                publish = '<label class="label label-success">publish</label>';
            } else {
                publish = '<label class="label label-danger">draft</label>';
            }
            $('#table-room').dataTable().fnAddData([
                null,
                room.nama,
                '<label class="currency pull-right" >' + room.harga + '</label>',
                room.currency,
                publish,
                '<a class="btn btn-primary btn-xs btn-edit-room" data-id="' + room.id + '" ><i class="fa fa-edit"></i></a>'+
                '<a class="btn btn-danger btn-xs btn-delete-room" data-id="' + room.id + '" ><i class="fa fa-trash-o"></i></a>' 
            ]);
            //format currency
            toCurrency();
            //tutup form new room
//            $('#btn-cancel-room').click();
        });
        /**
         * Format to currency
         * @returns {undefined}         */
        function toCurrency() {
            $('.currency').formatCurrency({symbol: ''});
        }
        $('input[name=harga]').blur(function(e) {
            $(this).formatCurrency({symbol:''});
        });
        $('input[name=harga]').change(function(e) {
            $(this).formatCurrency({symbol:''});
        });
        /**
         * edit room inline
         */
        $('#div-table-edit-room').hide();
        $(document).on('click', '.btn-edit-room', function (e) {
            var btn = $(this);
            var tr = btn.parent('td').parent('tr');
            var newrow = '<tr id="tr-edit"><td colspan="6"></td></tr>';
            tr.after(newrow);
            $('#div-table-edit-room').appendTo('#tr-edit td');
            //tampilkan data room ke form
            var roomId = $(this).data('id');
            var getUrl = "{{URL::to('admin/paket/hotel/room-by-id')}}" + "/" + roomId;
            //get data dari database dan menampilkan ke view page
            $.get(getUrl,null,function(e){
                var roomObj = JSON.parse(e);
                //set ke view
                $('#table-edit-room input[name=nama]').val(roomObj.nama);;
                $('#table-edit-room input[name=harga]').val(roomObj.harga);
                $('#table-edit-room input[name=harga]').change();
            });
            //tampilkan form dari posisi hide
            $('#div-table-edit-room').slideDown();
            //point view to edit form
            location.hash = 'div-table-edit-room';
        });
//===========END ROOM MANAGER=================

    });
</script>

<div id="div-table-edit-room">
    <table class="table table-bordered" id="table-edit-room" style="background-color: whitesmoke;">
        <tbody>
            <tr>
                <td colspan="4"><label>Edit data room</label></td>
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
                            <select name="currency" class="form-control">
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
                    <select name="publish" class="form-control">
                        <option value="Y">Publish</option>
                        <option value="N">Draft</option>
                    </select>
                </td>
                <td>Image</td>
                <td>
                    <input type="file" name="img_cover"/>
                </td>
            </tr>
            <tr>
                <td colspan="4">Keterangan</td>
            </tr>
            <tr>
                <td colspan="5">
                    <textarea id="textarea-desc-edit-room" name="desc" class="tinymce-mid"></textarea>
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
</div>

@stop