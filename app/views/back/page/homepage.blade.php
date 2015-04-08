@extends('back.partials.master')

@section('styles')
<!-- DATA TABLES -->
<link href="backend/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Homepage</h1>
        <!--        <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Content Setting</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Side Navigation</a></li>
                        <li><a href="#tab_3" data-toggle="tab">Image Slider</a></li>                  
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="col-md-4">Welcome Title</td>
                                        <td>
                                            <textarea class="form-control">{{$homepage['welcome_title']['big_value']}}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Welcome Subtitle</td>
                                        <td>
                                            <textarea class="form-control">{{$homepage['welcome_subtitle']['big_value']}}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Slider Blog Terbaru/Jumlah</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select name="cb-blog-slider" class="form-control" >
                                                        <option value="Y" {{$homepage['show_blog_slider']['value']=='Y'?'selected':''}}>Tampilkan</option>
                                                        <option value="N" {{$homepage['show_blog_slider']['value']=='N'?'selected':''}}>Sembunyikan</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="tx-jml-blog" class="form-control text-right" value="{{$homepage['blog_slider_count']['value']}}" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Slider Testimony/Jumlah</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select name="cb-testi-slider" class="form-control">
                                                        <option value="Y" {{$homepage['show_testimony']['value']=='Y'?'selected':''}}>Tampilkan</option>
                                                        <option value="N" {{$homepage['show_testimony']['value']=='N'?'selected':''}}>Sembunyikan</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="tx-jml-testi" class="form-control text-right" value="{{$homepage['testimony_count']['value']}}" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="text-right">
                                            <a id="btn-save-1" class="btn btn-primary">Save</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <form action="admin/homepage/sidenav" method="POST">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-4">Tampilkan Side Navigation</td>
                                            <td colspan="2">
                                                <select name="slc_sidenav" class="form-control">
                                                    <option value="Y" {{($homepage['show_sidenav']['value']=='Y'?'selected':'')}}>Tampilkan</option>
                                                    <option value="N" {{($homepage['show_sidenav']['value']=='N'?'selected':'')}}>Sembunyikan</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="tr-sidenav-setting" >
                                            <td><label>Setting Side Navigation</label></td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="tr-sidenav-setting" >
                                            <td rowspan="3">Find Destination</td>
                                            <td>
                                                Icon
                                            </td>
                                            <td>
                                                <img src="frontend/img/icon/find-dest.png" />
                                            </td>
                                        </tr>
                                        <tr class="tr-sidenav-setting" >
                                            <td>
                                                Title
                                            </td>
                                            <td>
                                                <input value="{{$homepage['sidenav_find_destination']['value']}}" type="text" name="tx_find_dest" class="form-control"/>
                                            </td>
                                        </tr>
                                        <tr class="tr-sidenav-setting" >
                                            <td>
                                                Subtitle
                                            </td>
                                            <td>
                                                <input value="{{$homepage['sidenav_find_destination_subtitle']['value']}}" type="text" name="tx_find_dest_sbt" class="form-control"/>
                                            </td>
                                        </tr>
                                        <tr class="tr-sidenav-setting" >
                                            <td rowspan="3">Read News</td>
                                            <td>
                                                Icon
                                            </td>
                                            <td>
                                                <img src="frontend/img/icon/news.png" />
                                            </td>
                                        </tr>
                                        <tr class="tr-sidenav-setting" >
                                            <td>
                                                Title
                                            </td>
                                            <td>
                                                <input value="{{$homepage['sidenav_read_news']['value']}}"type="text" name="tx_read_news" class="form-control"/>
                                            </td>
                                        </tr>
                                        <tr class="tr-sidenav-setting" >
                                            <td>
                                                Subtitle
                                            </td>
                                            <td>
                                                <input value="{{$homepage['sidenav_read_news_subtitle']['value']}}"type="text" name="tx_read_news_sbt" class="form-control"/>
                                            </td>
                                        </tr>
                                        <tr class="tr-sidenav-setting" >
                                            <td rowspan="3">Buy Travel Guide</td>
                                            <td>
                                                Icon
                                            </td>
                                            <td>
                                                <img src="frontend/img/icon/ticket.png" />
                                            </td>
                                        </tr>
                                        <tr class="tr-sidenav-setting" >
                                            <td>
                                                Title
                                            </td>
                                            <td>
                                                <input value="{{$homepage['sidenav_buy_travel']['value']}}"type="text" name="tx_buy_ticket" class="form-control"/>
                                            </td>
                                        </tr>
                                        <tr class="tr-sidenav-setting" >
                                            <td>
                                                Subtitle
                                            </td>
                                            <td>
                                                <input value="{{$homepage['sidenav_buy_travel_subtitle']['value']}}"type="text" name="tx_buy_ticket_sbt" class="form-control"/>
                                            </td>
                                        </tr>
                                        <tr class="tr-sidenav-setting" >
                                            <td rowspan="3">What They Say</td>
                                            <td>
                                                Icon
                                            </td>
                                            <td>
                                                <img src="frontend/img/icon/what-they-say.png" />
                                            </td>
                                        </tr>
                                        <tr class="tr-sidenav-setting" >
                                            <td>
                                                Title
                                            </td>
                                            <td>
                                                <input value="{{$homepage['sidenav_wts']['value']}}"type="text" name="tx_wts" class="form-control"/>
                                            </td>
                                        </tr>
                                        <tr class="tr-sidenav-setting" >
                                            <td>
                                                Subtitle
                                            </td>
                                            <td>
                                                <input value="{{$homepage['sidenav_wts_subtitle']['value']}}"type="text" name="tx_wts_sbt" class="form-control"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-right" colspan="2">
                                                <a id="btn-save-2" class="btn btn-primary">Save</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Image Slider</td>
                                        <td>
                                            <select name="cb-image-slider" class="form-control" >
                                                <option value="Y" {{$homepage['show_slider']['value']=='Y'?'selected':''}}>Tampilkan</option>
                                                <option value="N" {{$homepage['show_slider']['value']=='N'?'selected':''}}>Sembunyikan</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="tr-setting-image">
                                        <td><label>Setting Image</label></td>
                                        <td>
                                            <a class="btn btn-primary">Tambah Image</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class=" tr-setting-image">
                                <table class="table table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Preview</th>
                                        <th>Nama File</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $dt)
                                    <tr>
                                        <td class="text-right col-sm-1"></td>
                                        <td class="col-sm-2">
                                            <img class="col-sm-12" src="{{$constval['img_slider_path'].$dt->filename}}" />
                                        </td>
                                        <td>{{$dt->filename}}</td>
                                        <td class="text-center">
                                            <a class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
        </div> <!-- /.row -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop

@section('scripts')
<!-- DATA TABES SCRIPT -->
<script src="backend/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="backend/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('select[name=slc_sidenav]').change(function () {
            //show/hide sidenav setting
            if ($(this).val() == 'Y') {
                $('.tr-sidenav-setting').fadeIn(500);
            } else {
                $('.tr-sidenav-setting').fadeOut(250);
            }
        });
        
        /**
         * TAB 1
         */
        //Save tab 1
        $('#btn-save-1').click(function () {
            alert('ok');
        });

        //tampilkan atau sembunyikan input jumlah blog dan testimoni
        $('select[name=cb-blog-slider]').change(function () {
            var val = $(this).val();
            if (val == 'Y') {
                //tampilkan input jumlah blog
                $('input[name=tx-jml-blog]').fadeIn(500);
            } else {
                $('input[name=tx-jml-blog]').fadeOut(500);
            }
        });
        $('select[name=cb-testi-slider]').change(function () {
            var val = $(this).val();
            if (val == 'Y') {
                //tampilkan input jumlah testi
                $('input[name=tx-jml-testi]').fadeIn(500);
            } else {
                $('input[name=tx-jml-testi]').fadeOut(500);
            }
        });
        //END TAB 1
        //--------------------------------------------------------
        
        /**
         * TAB 2
         * -----------------------------------------------------
         */
        //END TAB 2
        //------------------------------------------------------
        
        /**
         * TAB 3
         * -----------------------------------------------------
         */
        //tampilkan dan sembunyikan setting image slider
        $('select[name=cb-image-slider]').change(function(){
            var val = $(this).val();
            if (val == 'Y') {
                //tampilkan input jumlah testi
                $('.tr-setting-image').fadeIn(500);
            } else {
                $('.tr-setting-image').fadeOut(500);
            }
        });
        //END TAB 3
        //------------------------------------------------------
        

        /**
         * Datatable init
         * dan setting datatable dengan autonumber column
         */
        $('.datatable').dataTable({
            bAutoWidth: false,
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                // Bold the grade for all 'A' grade browsers
                var index = iDisplayIndexFull + 1;
                $('td:eq(0)', nRow).html(index);
                return nRow;
            }
        });
    });

</script>
@stop