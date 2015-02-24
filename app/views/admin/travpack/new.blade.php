@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="admin/paket/travpack" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>New Travel Package</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal" method="POST" action="{{URL::to('admin/paket/travpack/new')}}" enctype="multipart/form-data">
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                        <a data-toggle="tab" href="#tab1">
                            Kriteria Paket
                        </a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#tab2">
                            Fasilitas & Akomodasi
                        </a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#tab3">
                            Photo
                        </a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#tab4">
                            Itinerary/Rencana Perjalanan
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="tab1" class="tab-pane fade in active">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="col-sm-2">Nama</td>
                                    <td>
                                        <input name="nama" type="text" placeholder="Nama" class="col-xs-10 col-sm-12"  required />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2">Kategori paket wisata</td>
                                    <td >
                                        {{Form::select('kategori',$selectTravcat,null,array('class'=>'col-sm-4'))}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td >
                                        <textarea name="desc" class="col-sm-12 full"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2">Harga</td>
                                    <td >
                                        <span class="input-icon">
                                            <input name="harga" type="text" id="input-price" class="number" style="text-align: right;">
                                            <i class="ace-icon fa fa-dollar blue "></i>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Publish</td>
                                    <td >
                                        <select class="col-xs-4" name="publish" required >
                                            <option value="N">Don't Publish</option>
                                            <option value="Y">Publish it NOW!!!</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="tab2" class="tab-pane fade">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Fasilitas</td>
                                    <td colspan="2">
                                        <textarea name="fasilitas" class="col-sm-12 full"></textarea>
                                    </td>
                                </tr>                        
                                <tr>
                                    <td>Paktet sudah termasuk</td>
                                    <td>
                                        <textarea name="include" class="col-sm-12 mini">
                                            {{"<ol>" . 
                                            "<li>Ketik disini, kemudian enter untuk menambahkan data baru...</li>" . 
                                            "</ol>"}}
                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Paktet tidak termasuk</td>
                                    <td>
                                        <textarea name="exclude" class="col-sm-12 mini">
                                           {{"<ol><li>Ketik disini, kemudian enter untuk menambahkan data baru...</li></ol>"}}
                                        </textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="tab3" class="tab-pane fade">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4 class="widget-title">Photo utama</h4>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <input name="img_1" type="file" rel="img-1" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <img class="col-sm-12"  id="img-1"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4 class="widget-title">Photo lain</h4>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <input name="img_2" type="file" rel="img-2" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <img class="col-sm-12"  id="img-2"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4 class="widget-title">Photo lain</h4>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <input name="img_3" type="file" rel="img-3" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <img class="col-sm-12"  id="img-3"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4 class="widget-title">Photo lain</h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <input name="img_4" type="file" rel="img-4" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <img class="col-sm-12"  id="img-4"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab4" class="tab-pane fade">
                        <textarea name="itinerary" class="col-sm-12 mini">
                            <table>
<tbody>
<tr>
<td colspan="4"><strong>Day 1</strong><br /><br /></td>
</tr>
<tr>
<td><strong>07:00-08:00</strong></td>
<td>&nbsp; &nbsp; &nbsp;</td>
<td colspan="2">Peserta di Jemput di Lokasi meeting Poin ( Penjemputan Peserta &ndash; Hotel-Rumah-Stasiun-Terminal )</td>
</tr>
<tr>
<td><strong>08.00-09.00</strong></td>
<td>&nbsp;</td>
<td colspan="2">City Tour &nbsp;( Alun-Alun Malang &amp; Balaikota Malang )</td>
</tr>
<tr>
<td><strong>09.00-10.00</strong></td>
<td>&nbsp;</td>
<td colspan="2">Perjalanan Menuju Batu Check In Penginapan, &amp; Mandi</td>
</tr>
<tr>
<td><strong>10.00-11.00&nbsp;</strong></td>
<td>&nbsp;</td>
<td colspan="2">Makan Siang ( Biaya Sendiri ) &amp; Mengunjungi Jawa Timur Park 2 ( Museum Satwa, Batu Secreet Zoo )</td>
</tr>
<tr>
<td><strong>11.00-15.00 </strong></td>
<td>&nbsp;</td>
<td colspan="2">Kegiatan di Jawa Timur Park</td>
</tr>
<tr>
<td><strong>11.00-15.00</strong></td>
<td>&nbsp;</td>
<td colspan="2">Kegiatan di Jawa Timur Park</td>
</tr>
<tr>
<td><strong>15.00-18.00</strong></td>
<td>&nbsp;</td>
<td colspan="2">Mengunjungi Museum&nbsp;Angkut</td>
</tr>
<tr>
<td><strong>18.00-19.00</strong></td>
<td>&nbsp;</td>
<td colspan="2">Makan Malam di RM Lokal ( Biaya Sendiri )</td>
</tr>
<tr>
<td><strong>19.00-20.00</strong></td>
<td>&nbsp;</td>
<td colspan="2">Kembali ke Penginapan</td>
</tr>
<tr>
<td><strong>20.00-00.00</strong></td>
<td>&nbsp;</td>
<td colspan="2">Istirahat &amp; Acara Bebas</td>
</tr>
</tbody>
</table>
                        </textarea>
                    </div>
                </div>
            </div>
            <!--tombol simpan-->
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="center">
                            <button class="btn btn-sm btn-info" type="submit"  >
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Save
                            </button>
                            <button class="btn btn-sm" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Reset
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

        <!-- PAGE CONTENT BEGINS -->
        <div>

        </div>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
<script>
    jQuery(document).ready(function () {
        // image preview from local disk
        $('input[type=file]').on('change', function (ev) {
            var f = ev.target.files[0];
            var fr = new FileReader();
            var inpElm = $(this);
            var imgElm = $('#' + inpElm.attr('rel'));

            fr.onload = function (ev2) {
                console.dir(ev2);
//                $('#img_upl_prev').attr('src', ev2.target.result);
                imgElm.attr('src', ev2.target.result);
            };

            fr.readAsDataURL(f);
        });

        //select to not selected
        $('select[name=destination]').val([]);

        /**
         * File Input apik tampilane 
         */
        $('input[type=file]').ace_file_input({
            no_file: 'No File ...',
            btn_choose: 'Choose',
            btn_change: 'Change',
            droppable: false,
            onchange: null,
            thumbnail: true //| true | large
                    //whitelist:'gif|png|jpg|jpeg'
                    //blacklist:'exe|php'
                    //onchange:''
                    //
        });

        /**
         * Delete file input
         */
        $('.ace-file-input .remove').click(function () {
            var flInp = $(this).parent('label');
            var inpElm = flInp.children('input[type=file]');
            var imgElm = $('#' + inpElm.attr('rel'));
            imgElm.attr('src', '');

        });

    });
</script>
@stop