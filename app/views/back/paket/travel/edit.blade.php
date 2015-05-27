@extends('back.partials.master')

@section('styles')
<link href="backend/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Paket Travel</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Data Travel</a></li>
                <li><a href="#tab_2" data-toggle="tab">Hotel</a></li>
                <li><a href="#tab_3" data-toggle="tab">Images</a></li>    
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <!--TAB TRAVEL-->
                    <form id="form-new-travel" action="admin/paket/travel/edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="travelId" value="{{$travel->id}}" />
                        <table class="table table-bordered">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{$travel->nama}}</h3>
                                <a class="btn btn-danger pull-right" href="admin/paket/travel" ><i class="fa fa-angle-double-left"></i> Back</a>
                            </div><!-- /.box-header -->
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>
                                        <input value="{{$travel->nama}}" autocomplete="off" type="text" class="form-control" name="nama" required/>
                                    </td>
                                    <td class="col-md-4" rowspan="5">
                                        @if($cover->islocal == 'Y')
                                        <img style="width: 100%" id="imgCoverPrev" src="{{$travel->imgpath . $travel->filename}}"/>
                                        @else
                                        <img style="width: 100%" id="imgCoverPrev" src="{{$travel->filename}}"/>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-9" >
                                                <input value="{{$travel->harga}}" autocomplete="off" type="text" class="form-control currency text-right" name="harga" />  
                                            </div>
                                            <div class="col-md-3" >
                                                {{Form::select('currency',array('IDR'=>'IDR','USD'=>'USD'),$travel->currency,array('class'=>'form-control'))}}           
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Day/Night</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-2"><input value="{{$travel->day}}" autocomplete="off" type="text" class="form-control text-right" name="day" /></div>
                                            <div class="col-md-2"><input value="{{$travel->night}}" autocomplete="off" type="text" class="form-control text-right" name="night" /></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Publish</td>
                                    <td>
                                        <div class="row" >
                                            <div class="col-md-4" >
                                                <?php echo Form::select('publish', array('Y' => 'PUBLISH', 'N' => 'DRAFT'), $travel->publish, array('class' => 'form-control')) ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <textarea name="desc" id="textarea-new-desc-travel" class="tinymce-mini">{{$travel->desc}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Include</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <textarea name="include" id="textarea-new-desc-travel" class="tinymce-list-only">{{$travel->include}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Exclude</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <textarea name="exclude" id="textarea-new-desc-travel" class="tinymce-list-only">{{$travel->exclude}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Itinerary</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <textarea name="itinerary" id="textarea-new-desc-travel" class="tinymce-list-only">{{$travel->itinerary}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <button type="submit" class="btn btn-primary " id="btn-save-new-travel" >Save</button>
                                        <a  href="admin/paket/travel"  class="btn btn-danger btn-cancel-new-travel" data-dismiss="modal" >Cancel</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$travel->nama}}</h3>
                        <div class="pull-right">
                            <a class="btn btn-primary" id="btn-tambah-hotel" >Tambah Hotel</a>
                            <a class="btn btn-danger" href="admin/paket/travel" ><i class="fa fa-angle-double-left"></i> Back</a>
                        </div>
                    </div><!-- /.box-header -->
                    <!--TAB HOTEL-->                    
                    <table class="table table-bordered datatable" id="table-daftar-hotel">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hotels as $ht)
                            <tr>
                                <td></td>
                                <td>{{$ht->hotel}}</td>
                                <td>{{$ht->alamat}}</td>
                                <td>
                                    <a class="btn btn-danger btn-xs btn-delete-hotel" data-id="{{$ht->hotel_id}}" ><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$travel->nama}}</h3>
                        <div class="pull-right">
                            <a class="btn btn-primary " id="btn-tambah-image" > Tambah</a>    
                            <a class="btn btn-danger " href="admin/paket/travel" ><i class="fa fa-angle-double-left"></i> Back</a>    
                        </div>
                        <div class="clearfix"></div>
                        <form id="form-new-image-upload" enctype="multipart/form-data" action="admin/paket/travel/upload-image" method="POST">
                            <input type="hidden" value="{{$travel->id}}" name="travelId"/>
                            <table style="background-color: whitesmoke;"  class="table table-bordered" id="table-tambah-image-travel">
                                <tbody>
                                    <tr>
                                        <td rowspan="2" >Pilih image : </td>
                                        <td>
                                            <select name="islocal" class="form-control">
                                                <option value="Y" >LOCAL</option>
                                                <option value="N" >URL</option>
                                            </select>
                                        </td>
                                        <td rowspan="3" class="col-md-4" >
                                            <img id="tamba-image-prev" style="width: 100%;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="file" id="newImgUpload" name="newImgUpload" />
                                            <input type="text" class="form-control" name="imgUrl" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                            <a class="btn btn-danger btn-sm" id="btn-cancel-upload">Cancel</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>                        
                    </div><!-- /.box-header -->
                    <!--TAB IMAGES-->
                    <table id="tabel-images-travel" class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th>Filename</th>
                                <th class="col-md-1" >Image Cover</th>
                                <th class="col-md-3" >Image</th>
                                <th class="col-md-2" ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($images as $img)
                            <tr>
                                <td></td>
                                <td>
                                    @if($img->islocal == 'Y')
                                    <a target="_blank" href="{{$img_path . $img->filename}}" >{{substr($img->filename,0,50)}}[...]</a>
                                    @else
                                    <a target="_blank" href="{{$img->filename}}" >{{substr($img->filename,0,50)}}[...]</a>
                                    @endif
                                </td>
                                <td>
                                    @if($img->main_img == 'Y')
                                    <label class="label label-success label-image-cover"><i class="fa fa-check" ></i></label>
                                    @endif
                                </td>
                                <td>
                                    @if($img->islocal == 'Y')
                                    <img src="{{$img_path . $img->filename}}" style="width: 100%;" />
                                    @else
                                    <img src="{{$img->filename}}" style="width: 100%;" />
                                    @endif
                                </td>
                                <td>
                                    <a data-id="{{$img->id}}" class="btn btn-danger btn-xs btn-del-image-travel"><i class="fa fa-trash-o" ></i></a>
                                    <a data-id="{{$img->id}}" class="btn btn-success btn-xs btn-set-image-cover ">Set as image cover</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<div class="modal" id="modal-tambah-hotel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Hotel</h4><i></i>
            </div>
            <div class="modal-body">
                <table class="table table-bordered datatable" id="table-pilih-hotel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" data-dismiss="modal" >Close</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal" id="modal-loader" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <img src="images/misc/ajax-loader.gif"/>
        </div>
    </div>
</div>

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
        $('.currency').formatCurrency({symbol: ''});
        $(document).on('blur', '.currency', function() {
            $('.currency').formatCurrency({symbol: ''});
        });
        //tampilkan modal tambah hotel
        $('#btn-tambah-hotel').click(function(e) {
            //load data table hotel dengan ajax dulu
            var travelpackId = $('input[name=travelId]').val();
            var getUrl = "{{URL::to('admin/paket/travel/hotels')}}" + "/" + travelpackId;
            $.get(getUrl, null, function(e) {
//        		add row to table
                var tableHotel = $('#table-pilih-hotel').dataTable();
                var hotels = JSON.parse(e);
                //clear table dulu
                tableHotel.fnClearTable();
                //build table
                $.each(hotels, function(i, hotel) {
                    tableHotel.fnAddData([
                        null,
                        '<a target="_blank" href="admin/paket/hotel/edit/' + hotel.id + '" >' + hotel.nama +'</a>',
                        hotel.alamat,
                        '<a class="btn btn-primary btn-xs btn-pilih-hotel" data-id="' + hotel.id + '" >Pilih</a>'
                    ]);
                });
//	            tampilkan modal
                $('#modal-tambah-hotel .modal-dialog').css('width', '800px');
                $('#modal-tambah-hotel').modal('show');
            });
        });
        //pilih hotel
        $(document).on('click', '.btn-pilih-hotel', function() {
            var hotelid = $(this).data('id');
            var travelpackId = $('input[name=travelId]').val();
            var tdBtn = $(this).parent('td');
            //simpan hotel yang di pilih ke database
            var postUrl = "{{URL::to('admin/paket/travel/add-hotel')}}";
            $.post(postUrl, {
                'travelpackId': travelpackId,
                'hotelId': hotelid
            }, function(e) {
                //tampilkan ke dalam tabel
                $('#table-daftar-hotel').dataTable().fnAddData([
                    null,
                    tdBtn.prev().prev().text(),
                    tdBtn.prev().text(),
                    '<a class="btn btn-danger btn-xs btn-delete-hotel" data-id="' + hotelid + '" ><i class="fa fa-trash-o"></i></a>'
                ]);
            });
            //close modal
            $('#modal-tambah-hotel').modal('hide');
        });
        //delete hotel
        $(document).on('click', '.btn-delete-hotel', function() {
            if (confirm('Hapus data hotel ini?')) {
                var btn = $(this);
                var hotelId = $(this).data('id');
                var travelpackId = $('input[name=travelId]').val();
                var getUrl = "{{URL::to('admin/paket/travel/del-hotel')}}" + "/" + travelpackId + "/" + hotelId;
                $.get(getUrl, null, function() {
                    //remove row
                    var row = btn.closest('tr');
                    var nRow = row[0];
                    $('#table-daftar-hotel').dataTable().fnDeleteRow(nRow);
                });
            }
        });

        //hide form upload image on load
        $('#form-new-image-upload').hide();
        //Tambah Image Paket Travel
        $('#btn-tambah-image').click(function(e) {
            $('#form-new-image-upload').slideDown(250);
        });
        //cancel tambah image
        $('#btn-cancel-upload').click(function(e) {
            $('#form-new-image-upload').slideUp(250);
        });

        //=========MANAGE IMAGE UPLOAD===========================================
        //Tambah image upload
        var _URL = window.URL && window.webkitURL;
        $('#form-new-image-upload input[type=file]').change(function(ev) {
            //cek dimensii image
            var image, file;
            var imgPrev = $('#tamba-image-prev');
            var uploader = $(this);
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function() {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 170 || this.height < 139) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        uploader.val(null);
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
        $('#form-new-image-upload').submit(function(x) {
//            $('#modal-loader').modal('show');
            $('#form-new-image-upload').loader('show');
            $('#form-new-image-upload').ajaxSubmit(function(e) {
//                alert('submitted...');
                //clear input
                $('#form-new-image-upload input[type=text]').val(null);
                $('#form-new-image-upload input[type=file]').val(null);
                $('#form-new-image-upload img').removeAttr('src');
//                alert('cleared...');
                //tampilkan data ke tabel
                var newImg = JSON.parse(e);
                var imgpreview = '<img src="' + newImg.img_path + newImg.filename + '" class="col-md-12" />';
                if (newImg.islocal == 'N') {
                    imgpreview = '<img src="' + newImg.filename + '" class="col-md-12" />';
                }
                var filename = '<a target="_blank" href="' + newImg.img_path + newImg.filename + '" >' + newImg.filename.substring(0, 50) + '[...]' + '</a>';
                if (newImg.islocal == 'N') {
                    filename = '<a target="_blank" href="' + newImg.filename + '" >' + newImg.filename.substring(0, 50) + '[...]' + '</a>';
                }
                var tableImage = $('#tabel-images-travel').dataTable();
//                alert('show data to table...');
                tableImage.fnAddData([
                    null,
                    filename,
                    null,
                    imgpreview,
                    '<a class="btn btn-danger btn-xs btn-del-image-travel" data-id="' + newImg.id + '"><i class="fa fa-trash-o"  ></i></a>&nbsp;' +
                            '<a class="btn btn-success btn-xs btn-set-image-cover " data-id="' + newImg.id + '" >Set as image cover</a>'
                ]);
                //hide form input
//                alert('closing...');
                $('#btn-cancel-upload').click();
                //close loading
//                $('#modal-loader').modal('hide');
                $('#form-new-image-upload').loader('hide');
            });
            return false;
        });
        ////sembunyikan input url
        $('input[name=imgUrl]').hide();
        ////Select islocal change
        $('select[name=islocal]').change(function(e) {
            //clear input
            $('input[name=imgUrl]').val(null);
            $('input[name=newImgUpload]').val(null);
            $('#tamba-image-prev').removeAttr('src');
            var islocal = $(this).val();
            if (islocal == 'Y') {
                $('input[name=imgUrl]').hide();
                $('input[name=newImgUpload]').show();
            } else {
                $('input[name=newImgUpload]').hide();
                $('input[name=imgUrl]').show();
            }
        });
        //imgUrl change
        $('input[name=imgUrl]').blur(function() {
            $('#tamba-image-prev').attr('src', $(this).val());
        });
        //=========END OF MANAGE IMAGE UPLOAD===========================================
        //delete image 
        $(document).on('click', '.btn-del-image-travel', function() {
            var btn = $(this);
            if (confirm('Hapus data image ini?')) {
                var dataId = $(this).data('id');
                var getUrl = "{{URL::to('admin/paket/travel/del-travel-image')}}" + "/" + dataId;
                $.get(getUrl, null, function() {
                    //remove dari table
                    var row = btn.closest('tr');
                    var nRow = row[0];
                    btn.parent('td').parent('tr').fadeOut(500, function(e) {
                        $('#tabel-images-travel').dataTable().fnDeleteRow(nRow);
                    });
                });
            }
        });
        //set image cover
        $(document).on('click', '.btn-set-image-cover', function(e) {
            if (confirm('Jadikan image ini sebagai Image Cover? ')) {
                var dataId = $(this).data('id');
                var btn = $(this);
                var getUrl = "{{URL::to('admin/paket/travel/set-image-cover')}}" + "/" + dataId;
                $.get(getUrl, null, function(ge) {
                    var imagecover = JSON.parse(ge);
                    //clear label-image-cover
                    $('.label-image-cover').hide();
                    //set current image cover
                    btn.parent('td').prev().prev().html('<label class="label label-success label-image-cover"><i class="fa fa-check" ></i></label>');
                    //ganti cover halaman depan dengan image cover sekarang
                    if (imagecover.islocal == 'Y') {
                        $('#imgCoverPrev').attr('src', imagecover.img_path + imagecover.filename);
                    } else {
                        $('#imgCoverPrev').attr('src', imagecover.filename);
                    }
                });
            }
        });


        //=====================END SCRIPT========================
    });
</script>

@stop