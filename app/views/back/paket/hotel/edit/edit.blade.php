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
                <li><a href="#tab_2" data-toggle="tab">Image</a></li>    
                <li><a href="#tab_3" data-toggle="tab">Room</a> </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$hotel->nama}}</h3>
                        <a class="btn btn-danger pull-right" href="admin/paket/hotel" ><i class="fa fa-angle-double-left"></i> Back</a>
                    </div><!-- /.box-header -->
                    <form id="formEditHotel" action="admin/paket/hotel/edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="hotelId" value="{{$hotel->id}}" />
                        <table class="table table-bordered" id="tableHotel">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>
                                        <input value="{{$hotel->nama}}" autocomplete="off" type="text" class="form-control" name="nama" required/>
                                    </td>
                                    <td class="col-md-4" rowspan="3">
                                        @if($cover->islocal == 'Y')
                                        <img style="width: 100%" id="imagePreviewEditHotel" src="{{$hotel->imgpath.$hotel->img_cover}}" data-src="{{$hotel->imgpath.$hotel->img_cover}}" />
                                        @else   
                                        <img style="width: 100%" id="imagePreviewEditHotel" src="{{$hotel->img_cover}}" data-src="{{$hotel->imgpath.$hotel->img_cover}}" />
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>
                                        <input value="{{$hotel->alamat}}" autocomplete="off" type="text" class="form-control" name="alamat" />
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
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{URL::to('admin/paket/hotel/add-image/'.$hotel->id)}}" id="btnTambahImageHotel" data-hotelid="{{$hotel->id}}" >Tambah Image</a> 
                            <a class="btn btn-danger " href="admin/paket/hotel" ><i class="fa fa-angle-double-left"></i> Back</a>
                        </div>
                    </div><!-- /.box-header -->
                    <table id="tableImageHotel" class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th class="col-md-4">Filename</th>
                                <th class="col-md-1" >Image Cover</th>
                                <th class="col-md-4" >Image</th>
                                <th class="col-md-2" ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($images as $img)
                            <tr>
                                <td></td>
                                <td>
                                    @if($img->islocal=='Y')                                    
                                    <a target="_blank" href="{{$img_path . $img->filename}}" >{{substr($img->filename, 0, 30)}}</a>
                                    @else
                                    <a target="_blank" href="{{$img->filename}}" >{{substr($img->filename, 0, 30)}}[...]</a>
                                    @endif
                                    
                                </td>
                                <td>
                                    @if($img->main_img == 'Y')
                                    <label class="label label-success labelImageCover" ><i class="fa fa-check"></i></label>
                                    @endif
                                </td>
                                <td>                                    
                                    @if($img->islocal=='Y')
                                    <img src="{{$img_path . $img->filename}}" style="width: 100%;" />
                                    @else
                                    <img src="{{$img->filename}}" style="width: 100%;" />
                                    @endif
                                </td>
                                <td>
                                    <a data-id="{{$img->id}}" class="btn btn-danger btn-xs btnDeleteImageHotel"><i class="fa fa-trash-o" ></i></a>

                                    <a data-id="{{$img->id}}" class="btn btn-success btn-xs btnSetImageCover ">Set as image cover</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="tab_3">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$hotel->nama}}</h3>
                        <div class="pull-right">
                            <a class="btn btn-primary" id="btnTambahRoom" href="admin/paket/hotel/tambah-room/{{$hotel->id}}" data-hotelid="{{$hotel->id}}" >Tambah Room</a>
                            <a class="btn btn-danger " href="admin/paket/hotel" ><i class="fa fa-angle-double-left"></i> Back</a>
                        </div>
                    </div><!-- /.box-header -->
                    <table id="tableRoom" class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th class="col-md-4" >Nama</th>
                                <th class="col-md-2" >Harga</th>
                                <th class="col-md-1">Currency</th>
                                <th class="col-md-2">Publish</th>
                                <th class="col-md-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $rm)
                            <tr>
                                <td></td>
                                <td>{{$rm->nama}}</td>
                                <td><i class="currency pull-right">{{number_format($rm->harga,2,'.',',')}}</i></td>
                                <td>{{$rm->currency}}</td>
                                <td>
                                    @if($rm->publish == 'Y')
                                    <label class="label label-success">PUBLISH</label>
                                    @else
                                    <label class="label label-success">DRAFT</label>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-xs btnEditRoom" data-id="{{$rm->id}}" ><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger btn-xs btnDeleteRoom" data-id="{{$rm->id}}" ><i class="fa fa-trash-o"></i></a>
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

<div id="formTemp"></div>

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
        //=========== MANAGE IMAGE =======================
//        $('#btnTambahImageHotel').click(function(e) {
//            var getModalUrl = "{{URL::to('admin/paket/hotel/show-tambah-image-hotel')}}";
//            var hotelid = $(this).data('hotelid');
//            //open loader
//            $('.content-wrapper').loader('show');
//            $.get(getModalUrl, null, function(ge) {
//                $('#formTemp').html(ge);
//                $('#modalTambahImageHotel .modal-dialog').css('max-width', '800px');
//                //set hotel id
//                $('#formTemp input[name=hotelid]').val(hotelid);
//                $('#modalTambahImageHotel').modal('show');
//                //close loader
//                $('.content-wrapper').loader('hide');
//                //craete custom event on image uploaded/saved            
//                $("#formModalTambahImage").on("#formModalTambahImage:saved", function(event, res) {
//                    var newimage = JSON.parse(res);
//                    //create preeview image
//                    var imgpreview = '<img class="col-md-12" src="' + newimage.img_path + newimage.filename + '" />';
//                    if (newimage.islocal == 'N') {
//                        imgpreview = '<img class="col-md-12" src="' + newimage.filename + '" />';
//                    }
//
//                    //tampilkan newimage ke tabel
//                    $('#tableImageHotel').dataTable().fnAddData([
//                        null,
//                        newimage.filename,
//                        null,
//                        imgpreview,
//                        '<a data-id="' + newimage.id + '" class="btn btn-danger btn-xs btnDeleteImageHotel"><i class="fa fa-trash-o" ></i></a>' +
//                                '<a data-id="' + newimage.id + '" class="btn btn-success btn-xs btnSetImageCover ">Set as image cover</a>'
//                    ]);
//                    //close modal
//                    $('#modalTambahImageHotel').modal('hide');
//                });
//            });
//        });
        //set image cover
        $(document).on('click', '.btnSetImageCover', function(e) {
            if (confirm('Jadikan image ini sebagai Image Cover?')) {
                var imageid = $(this).data('id');
                var getSetCoverUrl = "{{URL::to('admin/paket/hotel/set-image-cover')}}" + "/" + imageid;
                var btnset = $(this);
                $.get(getSetCoverUrl, null, function(ge) {
                    var image = JSON.parse(ge);
                    //clear label image cover
                    $('.labelImageCover').remove();
                    //set label image cover ke image yang baru
                    btnset.parent('td').prev().prev().html('<label class="label label-success labelImageCover" ><i class="fa fa-check"></i></label>');
                    //set image cover di halaman depan
                    $('#imagePreviewEditHotel').attr('src', image.imagefull);
                });
            }
        });
        //hapuds image
        $(document).on('click', '.btnDeleteImageHotel', function() {
            var btndel = $(this)
            if (confirm('Hapus gambar ini?')) {
                var imageid = $(this).data('id');
                var delUrl = "{{URL::to('admin/paket/hotel/del-image')}}" + "/" + imageid;
                $.get(delUrl, null, function(de) {
                    //delete dari table
                    btndel.parent('td').parent('tr').hide(250, function() {
                        var row = btndel.closest('tr');
                        var nRow = row[0];
                        $('#tableImageHotel').dataTable().fnDeleteRow(nRow);
                    });
                });
            }
        });
        //=================================================

        //============== MANAGE ROOM ======================
//        $('#btnTambahRoom').click(function(e) {
//            var hotelid = $(this).data('hotelid');
//            var getModalUrl = "{{URL::to('admin/paket/hotel/show-tambah-room')}}" + "/" + hotelid;
//            //open loader
//            $('.content-wrapper').loader('show');
//            $.get(getModalUrl, null, function(ge) {
//                $('#formTemp').html(ge);
//                $('#formTemp .modal-dialog').css('max-width', '1024px');
//                //set hotel id
//                $('#formTemp input[name=hotelid]').val(hotelid);
//                //show modal
//                $('#modalTambahRoom').modal('show');
//                //close loader
//                $('.content-wrapper').loader('hide');
//                //init tinymce
//                if (tinyMCE.execCommand('mceRemoveEditor', false, 'textareaDescTambahRoom')) {
//                    setMidTinymce();
//                }
//                //craete custom event on new room saved            
//                $("#formModalTambahRoom").on("#formModalTambahRoom:saved", function(event, res) {
//                    var newroom = JSON.parse(res);//
//                    //label publish
//                    var label = '<label class="label label-success" >PUBLISH</label>';
//                    if (newroom.publish == 'N') {
//                        label = '<label class="label label-danger" >DRAFT</label>';
//                    }
//                    //tampilkan newroom ke tabel
//                    $('#tableRoom').dataTable().fnAddData([
//                        null,
//                        newroom.nama,
//                        '<i class="currency pull-right">' + newroom.harga + '</i>',
//                        newroom.currency,
//                        label,
//                        '<a class="btn btn-primary btn-xs btnEditRoom" data-id="' + newroom.id + '" ><i class="fa fa-edit"></i></a>' +
//                                '<a class="btn btn-danger btn-xs btnDeleteRoom" data-id="' + newroom.id + '" ><i class="fa fa-trash-o"></i></a>'
//                    ]);
//                    //close modal
//                    $('#modalTambahRoom').modal('hide');
//                    setFormatCurrency();
//                });
//            });
//        });
        //function formatcurrency
        function setFormatCurrency() {
            $('.currency').formatCurrency({symbol: ''});
        }
        setFormatCurrency();
        //=================================================

        // Javascript to enable link to tab
        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-tabs a[href=#' + url.split('#')[1] + ']').tab('show');
        }

// Change hash for page-reload
        $('.nav-tabs a').on('shown.bs.tab', function(e) {
            window.location.hash = e.target.hash;
//            window.scrollTo(0, 0);
        });
        
        //edit room
        $(document).on('click','.btnEditRoom',function(e){
            var roomid = $(this).data('id');
            location.href = "{{URL::to('admin/paket/hotel/edit-room')}}" +"/"+roomid;
        });
        
        

        //end of script
    });
</script>
@stop