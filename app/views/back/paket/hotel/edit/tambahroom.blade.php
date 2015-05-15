@extends('back.partials.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
            Edit Hotel <i class="fa fa-angle-double-right"></i>  Tambah Room
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="row" >
            <div class="col-md-2" ></div>
            <div class="col-md-8" >
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Room "{{$hotel->nama}}"</h3>
                        <div class="pull-right">
                            <a class="btn btn-sm btn-danger" href="{{URL::to('admin/paket/hotel/edit/' . $hotel->id . '#tab_3')}}" >Cancel</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <form name="formModalTambahRoom" id="formModalTambahRoom" action="admin/paket/hotel/new-room" method="POST">
                            <input type="hidden" name="hotelid" value="{{$hotel->id}}"/>
                            <input type="hidden" name="hotel_image_id" />
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="col-span-2">
                                            Nama
                                        </td>
                                        <td>
                                            <input type="text" name="nama" class="form-control" required/>
                                        </td>
                                        <td rowspan="4" class="col-md-4">
                                            <img id="imgPrevTambahImageHotel" style="width: 100%;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Harga
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="harga" class="form-control text-right currency" required/>        
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="currency" class="form-control">
                                                        <option value="IDR" >IDR</option>
                                                        <option value="USD" >USD</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Publish
                                        </td>
                                        <td>
                                            <select name="publish" class="form-control">
                                                <option value="Y" >PUBLISH</option>
                                                <option value="N" >DRAFT</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Pilih Image
                                        </td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modalPilihImage" class="btn btn-primary btn-xs" id="btnPilihImage" >Pilih Image</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Keterangan
                                        </td>
                                        <td colspan="2" >

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" >
                                            <textarea name="desc" class="tinymce-mid" ></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <button type="submit" class="btn btn-primary btn-sm" >Save</button>
                                            <a class="btn btn-sm btn-danger" href="{{URL::to('admin/paket/hotel/edit/'.$hotel->id . '#tab_3')}}" >Cancel</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div><!-- /.box-body -->
                    <div class="box-footer">

                    </div><!-- /.box-footer-->
                </div><!-- /.box -->
            </div>
            <div class="col-md-2" ></div>
        </div>

    </section><!-- /.content -->


</div><!-- /.content-wrapper -->
@stop

@section('scripts')
<script src="js/jquery.formatCurrency-1.4.0.min.js" type="text/javascript"></script>
<script src="js/jquery.formatCurrency.all.js" type="text/javascript"></script>

@include('back.partials.editorscript')
<script>
    $(document).ready(function() {
        //sembunyikan input url
        $('input[name=inptImageUrl]').hide();
        //select lokasi change
        $('select[name=islocal]').change(function(e) {
            if ($(this).val() == 'Y') {
                $('input[name=inptImageUrl]').hide();
                $('input[name=inptImageLocal]').show();
            } else {
                $('input[name=inptImageLocal]').hide();
                $('input[name=inptImageUrl]').show();
            }
        });
        //upload image
        var _URL = window.URL && window.webkitURL;
        $('input[name=inptImageLocal]').change(function(ev) {
//            alert('image preview,,,,');
            var image, file;
            var imgPrev = $('#imgPrevTambahImageHotel');
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function() {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 170 || this.height < 139) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        $(this).val(null);
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
        //image from URL
        $('input[name=inptImageUrl]').blur(function(e) {
            $('#imgPrevTambahImageHotel').attr('src', $(this).val());
        });
        //submit tambah image
//        $('#formModalTambahRoom').submit(function(e) {
//            tinyMCE.triggerSave();
//            //change harga to number
//            $('#formModalTambahRoom .currency').val($('#formModalTambahRoom .currency').asNumber());
//            //submit the form
//            $('#formModalTambahRoom').ajaxSubmit(function(aje) {
//                //trigger event saved
//                $('#formModalTambahRoom').trigger("#formModalTambahRoom:saved", aje);
//            });
//            return false;
//        });
        //currency format
        $(document).on('blur', '.currency', function() {
            $(this).formatCurrency({symbol: ''});
        });

        //pilih image
        $('#btnPilihImage').click(function() {
            var hotelid = $('input[name=hotelid]').val();
            var getUrl = "{{URL::to('admin/paket/hotel/hotel-images')}}" + "/" + hotelid;
            var btn = $(this);
//            alert(getUrl);
            $.get(getUrl, null, function(ge) {
//                alert(ge);
                btn.parent('td').parent('tr').after('<tr><td colspan="3" >' + ge + '</td></tr>');
                //sembunyikan btn pilih image
                btn.hide();
            });
        });
        //cancelk pilh image
        $(document).on('click', '#btnCancelPilihImage', function(e) {
            //hide pilih image
            $(this).parent('div').slideUp(250,function(){
                $(this).parent('td').parent('tr').hide();
                $('#btnPilihImage').show();
            });
            
        });
        //Image di pilih
        $(document).on('click','.imgItemPilih',function(e){
            var imageId = $(this).data('id');
            var fullpath = $(this).data('fullpath');
            //set hotel image id value
            $('input[name=hotel_image_id]').val(imageId);
            //tampilkan ke image preview
            $('#imgPrevTambahImageHotel').attr('src',fullpath);
            //tutup pilihan image
            $('#btnCancelPilihImage').click();
            return false;
        });
    });
</script>
@stop
