@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="admin/paket/travpack" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>Edit Travel Package</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal" method="POST" action="{{URL::to('admin/paket/travpack/edit')}}" enctype="multipart/form-data">
            {{Form::hidden('travpackId',$travpack->id)}}
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
                                        <input value="{{$travpack->nama}}" name="nama" type="text" placeholder="Nama" class="col-xs-10 col-sm-12"  required />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2">Kategori paket wisata</td>
                                    <td >
                                        {{Form::select('kategori',$selectTravcat,$travpack->travpackcategory_id,array('class'=>'col-sm-4'))}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td >
                                        <textarea name="desc" class="col-sm-12 full">{{$travpack->desc}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2">Harga</td>
                                    <td >
                                        <span class="input-icon">
                                            <input value="{{$travpack->price}}" name="harga" type="text" id="input-price" class="number" style="text-align: right;">
                                            <i class="ace-icon fa fa-dollar blue "></i>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Publish</td>
                                    <td >
                                        <select class="col-xs-4" name="publish" required >
                                            <option {{($travpack->publish=='N'?'selected':'')}} value="N">Don't Publish</option>
                                            <option {{($travpack->publish=='Y'?'selected':'')}} value="Y">Publish it NOW!!!</option>
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
                                        <textarea name="fasilitas" class="col-sm-12 full">{{$travpack->fasilitas}}</textarea>
                                    </td>
                                </tr>                        
                                <tr>
                                    <td>Paktet sudah termasuk</td>
                                    <td>
                                        <textarea name="include" class="col-sm-12 mini">
                                            {{$travpack->paket_include}}
                                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Paktet tidak termasuk</td>
                                    <td>
                                        <textarea name="exclude" class="col-sm-12 mini">
                                            {{$travpack->paket_exclude}}
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
                                                    <input  name="img_1" type="file" rel="img-1" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <img {{($travpack->img_1 != '' ? 'src="images/paket/' . $travpack->img_1 . '"':'')}} class="col-sm-12"  id="img-1"/>
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
                                                    <img {{($travpack->img_2 != '' ? 'src="images/paket/' . $travpack->img_2 . '"':'')}} class="col-sm-12"  id="img-2"/>
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
                                                    <img {{($travpack->img_3 != '' ? 'src="images/paket/' . $travpack->img_3 . '"':'')}} class="col-sm-12"  id="img-3"/>
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
                                                    <img {{($travpack->img_4 != '' ? 'src="images/paket/' . $travpack->img_4 . '"':'')}} class="col-sm-12"  id="img-4"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab4" class="tab-pane fade">
                        <textarea name="itinerary" class="col-sm-12 mini">{{$travpack->itinerary}}</textarea>
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