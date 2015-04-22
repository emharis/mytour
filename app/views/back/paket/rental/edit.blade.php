@extends('back.partials.master')

@section('styles')
<link href="backend/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Rental</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Rental</a></li>
                <li><a href="#tab_2" data-toggle="tab">Image</a> </li>    
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$rental->nama}}</h3>
                        <a class="btn btn-danger pull-right" href="admin/paket/rental" ><i class="fa fa-angle-double-left"></i> Back</a>
                    </div><!-- /.box-header -->
                    <form id="form-edit-rental" action="admin/paket/rental/edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="rentalId" value="{{$rental->id}}" />
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>
                                        <input value="{{$rental->nama}}" autocomplete="off" type="text" class="form-control" name="nama" required/>
                                    </td>
                                    <td class="col-md-4" rowspan="3">
                                        <img style="width: 100%" id="img-edit-rental-prev" src="{{$img_path.$rental->filename}}"  />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga/Currency</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input  autocomplete="off" type="text" class="form-control currency text-right" name="harga" value="{{$rental->harga}}" />
                                            </div>
                                            <div class="col-md-4">
                                                {{Form::select('currency',array('IDR'=>'IDR','USD'=>'USD'),$rental->currency,array('class'=>'form-control'))}}
                                            </div>
                                        </div>                                        
                                    </td>
                                </tr>
                               <!--  <tr>
                                    <td>Image Cover <i>min. 170x139px</i></td>
                                    <td>
                                        <input type="file" name="img-cover-edit-rental"/>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <textarea name="desc" id="textarea-edit-desc-rental" class="tinymce-mid">{{$rental->desc}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <button type="submit" class="btn btn-primary " id="btn-save-edit-rental" >Save</button>
                                        <a  href="admin/paket/rental"  class="btn btn-danger btn-cancel-edit-rental" data-dismiss="modal" >Cancel</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <!--data image rental-->
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$rental->nama}}</h3>
                        <a class="btn btn-danger pull-right" href="admin/paket/rental" ><i class="fa fa-angle-double-left"></i> Back</a>
                    </div><!-- /.box-header -->
                    <div class="clearfix"></div><br/>
                    <form id="form-upload-image" action="admin/paket/rental/upload" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="rentalId" value="{{$rental->id}}"/>
                        <table class="table table-bordered" style="background-color: whitesmoke;">
                            <tbody>
                                <tr>
                                    <td>
                                        Upload Image
                                        <br/>
                                        minimal : 170x139px
                                    </td>
                                    <td>
                                        <input type="file" name="img-upload" required />
                                    </td>
                                    <td class="col-md-4" rowspan="2">
                                        <img style="width: 100%;" id="img-prev" />
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                        <a class="btn btn-danger btn-sm" id="btn-reset-upload" ><i class="fa fa-refresh"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <div class="clearfix"></div><br/>
                    <table id="table-daftar-image" class="table table-bordered datatable"> 
                        <thead>
                            <tr>
                                <th class="col-md-1" >No</th>
                                <th>Filename</th>
                                <th class="col-md-1" >Image Cover</th>
                                <th class="col-md-3" >Image</th>
                                <th class="col-md-1" ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($images as $img)
                            <tr>
                                <td></td>
                                <td>{{$img->filename}}</td>
                                <td>
                                    @if($img->main_img == 'Y')
                                    <label class="label label-success">IMAGE COVER</label>
                                    @endif
                                </td>
                                <td >
                                    <img src="{{$img_path . $img->filename}}" style="width:100%;" />
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-xs btn-del-image" data-id="{{$img->id}}" ><i class="fa fa-trash-o"></i></a>
                                    @if($img->main_img =='N')
                                    <a class="btn btn-success btn-xs btn-set-cover" data-id="{{$img->id}}" >Set Image Cover</a>
                                    @endif
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
    //tampilkan image upload
    var _URL = window.URL && window.webkitURL;
    $('input[name=img-upload]').change(function(ev) {
        //cek dimensii image
        var image, file;
        var imgPrev = $('#img-prev');
        if ((file = this.files[0])) {
            image = new Image();
            image.onload = function() {
                //cek dimension jika tidak sesuai sembunyikan tombol submit
                if (this.width < 170 || this.height < 139) {
                    alert('Dimensi image tidak sesuai.');
                    //set null image upload
                    $('input[name=img-upload]').val(null);
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
    //Reset Upload
    $('#btn-reset-upload').click(function(e) {
        $('input[name=img-upload]').val(null);
        $('#img-prev').removeAttr('src');
    });
    //submit form upload image
    $('#form-upload-image').ajaxForm(function(e) {
        //add new row
        var newrental = JSON.parse(e);
        $('#table-daftar-image').dataTable().fnAddData([
            null,
            newrental.filename,
            null,
            '<img src="{{$img_path}}' + newrental.filename + '" style="width=100%;" >',
            '<a class="btn btn-danger btn-xs btn-del-image" data-id="' + newrental.id + '" ><i class="fa fa-trash-o"></i></a>' +
                    '<a class="btn btn-success btn-xs btn-set-cover" data-id="' + newrental.id + '" >Set Image Cover</a>'
        ]);
        //clear input
        $('input[name=img-upload]').val(null);
        $('#img-prev').removeAttr('src');

    });
    //delete image rental
    $(document).on('click', '.btn-del-image', function() {
        if (confirm('Hapus image ini?')) {
            var imageId = $(this).data('id');
            var delUrl = "{{URL::to('admin/paket/rental/del-image')}}" + "/" + imageId;
            var btn = $(this);
            $.get(delUrl, null, function(e) {
                //delete row
                var row = btn.closest('tr');
                var nRow = row[0];
                $('#table-daftar-image').dataTable().fnDeleteRow(nRow);
            }).fail(function(e) {
                alert('Delete image gagal');
            });
        }
    });
    //set image cover
    $(document).on('click', '.btn-set-cover', function() {
        var imageId = $(this).data('id');
        var getUrl = "{{URL::to('admin/paket/rental/set-image-cover')}}" + "/" + imageId;
        $.get(getUrl,null,function(e){
           alert('ok') ;
        });
    });

});
</script>

@stop