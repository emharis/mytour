@extends('back.partials.master')

@section('styles')
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Homepage</h1>
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
                        <li><a href="#tab_4" data-toggle="tab">Travel Favorit</a></li>                  
                        <li><a href="#tab_5" data-toggle="tab">Hotel Favorit</a></li>                  
                        <li><a href="#tab_6" data-toggle="tab">Rental Favorit</a></li>                  
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="col-md-4">Welcome Title</td>
                                        <td>
                                            <textarea name="tx_welcome" class="tinymce-mini">{{$homepage['welcome_title']['big_value']}}</textarea>
                                    </tr>
                                    <tr>
                                        <td>Welcome Subtitle</td>
                                        <td>
                                            <textarea name="tx_welcome_sub" class="tinymce-mini">{{$homepage['welcome_subtitle']['big_value']}}</textarea>
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
                                        <td class="col-md-4" >Tampilkan Side Navigkation</td>
                                        <td>
                                            <div class="row" >
                                                <div class="col-md-4">
                                                    <select name="slc_sidenav" class="form-control">
                                                        <option value="Y" {{($homepage['show_sidenav']['value']=='Y'?'selected':'')}}>Tampilkan</option>
                                                        <option value="N" {{($homepage['show_sidenav']['value']=='N'?'selected':'')}}>Sembunyikan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="tr-setting-image">
                                        <td><label>Setting Image</label></td>
                                        <td>
                                            <a class="btn btn-success" id="btn-tambah-slider">Tambah Image</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="tr-upload-image tr-setting-image" style="background-color: whitesmoke;">
                                <form id="slider-form" action="admin/page/homepage/addslider" method="POST" enctype="multipart/form-data">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><label>Upload Image</label><br/>770x354px</td>
                                                <td>
                                                    <input type="file" id="file" name="upl-slider"/>
                                                </td>
                                                <td rowspan="2" class="col-md-2">
                                                    <img id="img-preview" style="width:100%;" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <button type="submit" id="btn-save-image" class="btn btn-primary btn-sm">Upload</button>  
                                                    <a class="btn btn-warning btn-sm btn-cancel-upload">Cancel</a>                                              
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>

                            <div class=" tr-setting-image">
                                <h4>Data Image Slider</h4>
                                <table id="table-image-slider" class="table table-bordered datatable">
                                    <thead>
                                        <tr>
                                            <th>Preview</th>
                                            <th>Nama File</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sliders as $dt)
                                        <tr>
                                            <td class="col-sm-2">
                                                <img style="width:100%;" src="{{$constval['img_slider_path'].$dt->filename}}" />
                                            </td>
                                            <td>{{$dt->filename}}</td>
                                            <td class="text-center">
                                                <a class="btn btn-danger btn-delete-slider" data-id="{{$dt->id}}"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>                            
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->

                        <div class="tab-pane" id="tab_4">
                        	<h4>Travel Favorit</h4>
                        </div><!-- /.tab-content -->
                        
                        <div class="tab-pane" id="tab_5">
                        	<h4>Hotel Favorit</h4>
                        </div><!-- /.tab-content -->
                        
                        <div class="tab-pane" id="tab_6">
                        	<h4>Rental Favorit</h4>
                        </div><!-- /.tab-content -->
                        
                    </div><!-- nav-tabs-custom -->
                </div><!-- /.col -->
            </div> <!-- /.row -->

        </div><!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">

        </div><!-- /.tab-pane -->
</div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->
</div><!-- /.col -->
</div> <!-- /.row -->


</section><!-- /.content -->
</div><!-- /.content-wrapper -->


@stop

@section('scripts')
@include('back.partials.editorscript')
<script src="backend/plugins/jqueryform/jquery.form.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        //sembunyikan/tampilkan input setting side navigation
        if ($('select[name=slc_sidenav]').val() == 'N') {
            $('.tr-sidenav-setting').hide();
        }
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
            //            alert('Simpan');
            var postUrl = "{{URL::to('admin/page/homepage/upsetting')}}";
            $.post(postUrl, {
                'welcome_title': $('textarea[name=tx_welcome]').val(),
                'welcome_subtitle': $('textarea[name=tx_welcome_sub]').val(),
                'show_blog_slider': $('select[name=cb-blog-slider]').val(),
                'blog_slider_count': $('input[name=tx-jml-blog]').val(),
                'show_testimony': $('select[name=cb-testi-slider]').val(),
                'testimony_count': $('input[name=tx-jml-testi]').val()
            }, function (e) {
                alert('Data telah disimpan');
                //                alert(e);
            }).fail(function (e) {
                alert('Data gagal disimpan');
            });
        });

        //tampilkan atau sembunyikan input jumlah blog dan testimoni
        if ($('select[name=cb-blog-slider]').val() == 'N') {
            $('input[name=tx-jml-blog]').hide();
        }
        $('select[name=cb-blog-slider]').change(function () {
            var val = $(this).val();
            if (val == 'Y') {
                //tampilkan input jumlah blog
                $('input[name=tx-jml-blog]').fadeIn(500);
            } else {
                $('input[name=tx-jml-blog]').fadeOut(500);
            }
        });
        if ($('select[name=cb-testi-slider]').val() == 'N') {
            $('input[name=tx-jml-testi]').hide();
        }
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
        $('#btn-save-2').click(function () {
            var postUrl = "{{URL::to('admin/page/homepage/sidenav')}}";
            $.post(postUrl, {
                'show_sidenav': $('select[name=slc_sidenav]').val(),
                'sidenav_find_destination': $('input[name=tx_find_dest]').val(),
                'sidenav_find_destination_subtitle': $('input[name=tx_find_dest_sbt]').val(),
                'sidenav_read_news': $('input[name=tx_read_news]').val(),
                'sidenav_read_news_subtitle': $('input[name=tx_read_news_sbt]').val(),
                'sidenav_buy_travel': $('input[name=tx_buy_ticket]').val(),
                'sidenav_buy_travel_subtitle': $('input[name=tx_buy_ticket_sbt]').val(),
                'sidenav_wts': $('input[name=tx_wts]').val(),
                'sidenav_wts_subtitle': $('input[name=tx_wts_sbt]').val()
            }, function (e) {
                alert('Data telah disimpan');
                //                alert(e);
            }).fail(function (e) {
                alert('Data gagal disimpan');
            });
        });
        //END TAB 2
        //------------------------------------------------------

        /**
         * TAB 3
         * -----------------------------------------------------
         */
        //sembunyikan file upload
        $('.tr-upload-image').hide();
        //tampilkan file upload
        $('#btn-tambah-slider,.btn-cancel-upload').click(function () {
            //toggle
            $('.tr-upload-image').fadeToggle(500, null, function () {
                //clear img
                $('#img-preview').removeAttr('src');
                $('#file').val(null);
            });
        });
        //upload slider
        ////tampilkan image yang d upload
        var _URL = window.URL || window.webkitURL;
        $('#file').on('change', function (ev) {
            var f = ev.target.files[0];
            var fr = new FileReader();

            fr.onload = function (ev2) {
                console.dir(ev2);
                $('#img-preview').attr('src', ev2.target.result);
            };

            fr.readAsDataURL(f);

            //get file dimension
            var image, file;
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function () {
                    //                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 770 || this.height < 354) {
                        alert('Dimensi image tidak sesuai.');
                        $('#file').val(null);
                        //clear image preview
                        $('#img-preview').removeAttr('src');
                        //                        $('.btn-cancel-upload').click();
                        $('#btn-save-image').hide();
                    } else {
                        $('#btn-save-image').show();
                    }
                };
                image.src = _URL.createObjectURL(file);
            }
        });
        //Upload image
        $('#slider-form').ajaxForm(function (e) {
            alert("Image telah disimpan.");
            //kosongkan input file

            //bersihkan upload input
            $('.btn-cancel-upload').click();
            //tampilkan data ke table

            var objImg = JSON.parse(e);
            var newrow = '<tr><td class="col-sm-2"><img class="col-sm-12" src="' +
                    objImg.path + objImg.filename + ' " /></td><td>' + objImg.filename +
                    '</td><td class="text-center"><a class="btn btn-danger btn-delete-slider" data-id="' + objImg.id + '" ><i class="fa fa-trash-o">' +
                    '</i></a></td></tr>';

            $('#table-image-slider tbody').append(newrow);
        });

        //delette image slider
        $(document).on('click', '.btn-delete-slider', function (e) {
            if (confirm('Hapus image slider ini?')) {
                var id = $(this).data('id');
                var postUrl = "{{URL::to('admin/page/homepage/deleteslider')}}";
                $btn = $(this);
                $.post(postUrl, {
                    'id': id
                }, function (e) {
                    //                   alert('Image slider telah dihapus'); 
                    //delete from table                   
                    $btn.parent('td').parent('tr').hide(500);
                }).fail(function (e) {
                    alert('Image slider gagal dihapus');
                });
            }
        });



        //END TAB 3
        //------------------------------------------------------



    });

</script>
@stop