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
                        <!--<a class="btn btn-primary btn-sm pull-right" id="btn-tambah-hotel" >Tambah</a>-->
                        <a class="btn btn-primary pull-right" href="admin/paket/hotel/new" >Tambah</a>
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
                                        <a class="btn btn-primary btn-xs btn-edit-hotel" href="admin/paket/hotel/edit/{{$ht->id}}"  data-id="{{$ht->id}}" ><i class="fa fa-edit"></i></a>
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

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@include('back.paket.hotel.new')
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
        //Delete Hotel
        $(document).on('click', '.btn-del-hotel', function () {
            var btn = $(this);
            if (confirm('Hapus data hotel ini?')) {
                var hotelid = $(this).data('id');
                var delUrl = "{{URL::to('admin/paket/hotel/del-hotel')}}" + "/" + hotelid;
                $.get(delUrl, null, function () {
                    //delete row from table
                    var row = btn.closest('tr');
                    var nRow = row[0];
                    $('#table-hotel').dataTable().fnDeleteRow(nRow);
                });
            }
        });


//        //============================================================================================
//        //==========================SCRIPT FOR NEW HOTEL==============================================
//        //============================================================================================        
//        var btnSaveNewHotel = $('#btn-save-new-hotel');
//        var frmNewHotel = $('#form-new-hotel');
//        var inpFileNewHotel = $('input[name=img-cover-new-hotel]');
//        /**
//         * Tambah Data Hotel
//         * @returns {undefined}
//         */
//        function newHotel() {
//            $('#modal-new-hotel').modal('show');
//        }
//        /**
//         * Simpan data hotel baru
//         * @returns {undefined}
//         */
//        function saveNewHotel(newhotel) {
//            //after saving new hotel tampilkan data baru ke table
//            $('#table-hotel').dataTable().fnAddData([
//                null,
//                newhotel.nama,
//                newhotel.alamat,
//                'tidak ada room',
//                '<a class="btn btn-primary btn-xs btn-edit-hotel" data-id="' + newhotel.id + '" ><i class="fa fa-edit"></i></a>' +
//                        '<a class="btn btn-danger btn-xs btn-del-hotel" data-id="' + newhotel.id + '" ><i class="fa fa-trash-o"></i></a>'
//            ]);
//            //clear input
//            $('input[type=text]').val(null);
//            $('input[type=file]').val(null);
//            $('#img-new-hotel-prev').removeAttr('src');
//            tinyMCE.get('textarea-new-desc-hotel').setContent('');
//            //close modal
//            $('#modal-new-hotel').modal('hide');
//
//            //show message
//            alert('Data hotel baru telah disimpan.');
//        }
//
//        //===========EVENTS=================
//
//        //event click tambah hotel button
//        $('#btn-tambah-hotel').click(function () {
//            newHotel();
//        });
//        //event click btn save new hotel
//        btnSaveNewHotel.click(function (e) {
////            tinyMCE.get('textarea-new-desc-hotel').triggerSave();
//            tinyMCE.triggerSave();
//        });
//        //event on submit form
//        frmNewHotel.ajaxForm(function (e) {
//            var newhotel = JSON.parse(e);
//            saveNewHotel(newhotel);
//        });
//        //event upload imageon new hotel
//        var _URL = window.URL && window.webkitURL;
//        inpFileNewHotel.change(function (ev) {
//            //cek dimensii image
//            var image, file;
//            var imgPrev = $('#img-new-hotel-prev');
//            if ((file = this.files[0])) {
//                image = new Image();
//                image.onload = function () {
////                    alert("The image width is " + this.width + " and image height is " + this.height);                    
//                    //cek dimension jika tidak sesuai sembunyikan tombol submit
//                    if (this.width < 170 || this.height < 139) {
//                        alert('Dimensi image tidak sesuai.');
//                        //set null image upload
//                        inpFileNewHotel.val(null);
//                        imgPrev.removeAttr('src');
//                    } else {
//                        var f = ev.target.files[0];
//                        var fr = new FileReader();
//                        fr.onload = function (ev2) {
//                            console.dir(ev2);
//                            imgPrev.attr('src', ev2.target.result);
//                        };
//                        fr.readAsDataURL(f);
//                    }
//                };
//                image.src = _URL.createObjectURL(file);
//            }
//        });
//        //==================================================================================================
//        //================================END SCRIPT FOR NEW HOTEL==========================================
//        //==================================================================================================
//
//        //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
//        //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx   SCRIPT FOR EDIT HOTEL   xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
//        //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
//        /**
//         * Fungsi edit hotel
//         * @param {type} hotelid
//         * @returns {undefined}         */
//        function editHotel(hotelid) {
//            
//            var getUrl = "{{URL::to('admin/paket/hotel/hotel-by-id')}}" + "/" + hotelid;
//            $.get(getUrl, null,function (e) {
//                var result = JSON.parse(e);
//                //set data to view                
//                $('#form-edit-hotel input[name=hotelId]').val(result.id);
//                $('#form-edit-hotel input[name=nama]').val(result.nama);
//                $('#form-edit-hotel input[name=alamat]').val(result.alamat);
//                tinyMCE.get('textarea-edit-desc-hotel').setContent(result.desc);
//                $('#img-edit-hotel-prev').attr('src',result.imgpath + result.img_cover);
//                $('#modal-edit-hotel').modal('show');
//            }).fail(function(e){
//                alert('fail');
//            });
//        }
//        //event btn edit hotel clicked
//        $('.btn-edit-hotel').click(function (e) {
////            alert('edit hotel...');
////            alert($(this).data('id'));
//            editHotel($(this).data('id'));
//        });
//        //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
//        //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx   END SCRIPT FOR EDIT HOTEL   xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
//        //xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

    });
</script>

@stop