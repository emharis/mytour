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
                            @include('back.page.homepage.inc_content')
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            @include('back.page.homepage.inc_sidenav')
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            @include('back.page.homepage.inc_slider')
                        </div><!-- /.tab-content -->
                        <div class="tab-pane" id="tab_4">
                           @include('back.page.homepage.inc_travelpack')
                        </div><!-- /.tab-content -->
                        <div class="tab-pane" id="tab_5">
                            @include('back.page.homepage.inc_hotel')
                        </div><!-- /.tab-content -->
                        <div class="tab-pane" id="tab_6">
                            @include('back.page.homepage.inc_rental')
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
@include('back.partials.tablescript')
@include('back.partials.editorscript')
<script src="backend/plugins/jqueryform/jquery.form.min.js" type="text/javascript"></script>
<script src="js/jquery.formatCurrency-1.4.0.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        //sembunyikan/tampilkan input setting side navigation
        if ($('select[name=slc_sidenav]').val() == 'N') {
            $('.tr-sidenav-setting').hide();
        }
        $('select[name=slc_sidenav]').change(function() {
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
        $('#btn-save-1').click(function() {
            //            alert('Simpan');
            var postUrl = "{{URL::to('admin/page/homepage/upsetting')}}";
            $.post(postUrl, {
                'welcome_title': $('textarea[name=tx_welcome]').val(),
                'welcome_subtitle': $('textarea[name=tx_welcome_sub]').val(),
                'show_blog_slider': $('select[name=cb-blog-slider]').val(),
                'blog_slider_count': $('input[name=tx-jml-blog]').val(),
                'show_testimony': $('select[name=cb-testi-slider]').val(),
                'testimony_count': $('input[name=tx-jml-testi]').val()
            }, function(e) {
                alert('Data telah disimpan');
                //                alert(e);
            }).fail(function(e) {
                alert('Data gagal disimpan');
            });
        });

        //tampilkan atau sembunyikan input jumlah blog dan testimoni
        if ($('select[name=cb-blog-slider]').val() == 'N') {
            $('input[name=tx-jml-blog]').hide();
        }
        $('select[name=cb-blog-slider]').change(function() {
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
        $('select[name=cb-testi-slider]').change(function() {
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
        $('#btn-save-2').click(function() {
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
            }, function(e) {
                alert('Data telah disimpan');
                //                alert(e);
            }).fail(function(e) {
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
        $('#btn-tambah-slider,.btn-cancel-upload').click(function() {
            //toggle
            $('.tr-upload-image').fadeToggle(500, null, function() {
                //clear img
                $('#img-preview').removeAttr('src');
                $('#file').val(null);
            });
        });
        //upload slider
        ////tampilkan image yang d upload
        var _URL = window.URL || window.webkitURL;
        $('#file').on('change', function(ev) {
            var f = ev.target.files[0];
            var fr = new FileReader();

            fr.onload = function(ev2) {
                console.dir(ev2);
                $('#img-preview').attr('src', ev2.target.result);
            };

            fr.readAsDataURL(f);

            //get file dimension
            var image, file;
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function() {
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
        $('#slider-form').ajaxForm(function(e) {
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
        $(document).on('click', '.btn-delete-slider', function(e) {
            if (confirm('Hapus image slider ini?')) {
                var id = $(this).data('id');
                var postUrl = "{{URL::to('admin/page/homepage/deleteslider')}}";
                $btn = $(this);
                $.post(postUrl, {
                    'id': id
                }, function(e) {
                    //                   alert('Image slider telah dihapus'); 
                    //delete from table                   
                    $btn.parent('td').parent('tr').hide(500);
                }).fail(function(e) {
                    alert('Image slider gagal dihapus');
                });
            }
        });

        //END TAB 3
        //------------------------------------------------------

        //================TAB TRAVEL FAVORIT====================
        var travelpackTersedia;
        $('#btn-tambah-travel-favorit').click(function(e) {

            //tampilkan form pilih travel favorit;
            //get data travelpack dari database tampilkan ke modal pilih
            var getTravelUrl = "{{URL::to('admin/page/homepage/travel')}}";
            $.get(getTravelUrl, null, function(ge) {
                //clear table
                $('#tablePilihTravelPack').dataTable().fnClearTable();
                //add new row
                var dataTravel = JSON.parse(ge);
                travelpackTersedia = dataTravel;
                $.each(dataTravel, function(i, row) {
                    $('#tablePilihTravelPack').dataTable().fnAddData([
                        null,
                        row.nama,
                        '<i class="currency pull-right" >' + row.harga + '</i>',
                        '<a class="btn btn-primary btn-xs btnPilihTravelpack" data-id="' + row.id + '" >Pilih</a>'
                    ]);
                });
                //format currency
                setCurrency();
                $('#modal-tambah-travel .modal-dialog').css('max-width', '800px');
                $('#modal-tambah-travel').modal('show');
//                //tamilkan modal
//                $('#modal-tambah-travel').modal('show');
//                ​
            });

        });

        function setCurrency() {
            $('.currency').formatCurrency({symbol: ''});
        }
        //pilih travelpack untuk jadi favorit
        $(document).on('click', '.btnPilihTravelpack', function() {
            var travelpackid = $(this).data('id');
            var travelpack;
            $.each(travelpackTersedia, function(i, row) {
                if (row.id == travelpackid) {
                    travelpack = row;
                }
            });
            //tambahkan ke database
            var postToDatabaseUrl = "{{URL::to('admin/page/homepage/add-travelpack')}}";
            $.post(postToDatabaseUrl, {
                'travelpackid': travelpackid
            }, function() {

            });
            //tambahkan ke tabel
            $('#table-travel-favorit').dataTable().fnAddData([
                null,
                travelpack.nama,
                '<a class="btn btn-success btn-xs btn-view-travel" data-id="' + travelpack.id + '" ><i class="fa fa-eye"></i></a>&nbsp;' +
                        '<a class="btn btn-danger btn-xs btnDeleteTravelpackFavorit" data-id="' + travelpack.id + '" ><i class="fa fa-trash-o"></i></a>'
            ]);
            //sembunyikan modal
            $('#modal-tambah-travel').modal('hide');
        });
        //hapus travelpack favorit
        $(document).on('click', '.btnDeleteTravelpackFavorit', function() {
            if (confirm('Hapus travelpack favorit ini?')) {
                var travelpackid = $(this).data('id');
                var delTravelpackUrl = "{{URL::to('admin/page/homepage/delete-travelpack')}}" + "/" + travelpackid;
                var btn = $(this);
                $.get(delTravelpackUrl, null, function() {
                    //delete dari table
                    btn.parent('td').parent('tr').hide(250, function() {
                        var row = btn.closest('tr');
                        var nRow = row[0];
                        $('#table-travel-favorit').dataTable().fnDeleteRow(nRow);
                        //tampilkan tombol tambah hotel
                        $('#btn-tambah-travel-favorit').show();
                    });
                });
            }
        });

        //=================END TRAVEL FAVORIT===================
        
        //=================== HOTEL FAVORIT =====================
        //
        var hotelTersedia;
        $('#btnTambahHotelFavorit').click(function(){
            //tampilkan form pilih hotel favorit;
            //get data hotel dari database tampilkan ke modal pilih
            var getHotelUrl = "{{URL::to('admin/page/homepage/hotel')}}";
            $.get(getHotelUrl, null, function(ge) {
                //clear table
                $('#tablePilihHotel').dataTable().fnClearTable();
                //add new row
                var dataHotel = JSON.parse(ge);
                hotelTersedia = dataHotel;
                $.each(dataHotel, function(i, row) {
                    $('#tablePilihHotel').dataTable().fnAddData([
                        null,
                        row.nama,
                        row.alamat,                        
                        '<a class="btn btn-primary btn-xs btnPilihHotel" data-id="' + row.id + '" >Pilih</a>'
                    ]);
                });
                $('#modalTambahHotel .modal-dialog').css('max-width', '800px');
                $('#modalTambahHotel').modal('show');
            });
        });
        //pilih hotel
        //pilih hotel untuk jadi favorit
        $(document).on('click', '.btnPilihHotel', function() {
            var hotelid = $(this).data('id');
            var hotel;
            $.each(hotelTersedia, function(i, row) {
                if (row.id == hotelid) {
                    hotel = row;
                }
            });
            //tambahkan ke database
            var postToDatabaseUrl = "{{URL::to('admin/page/homepage/add-hotel')}}";
            $.post(postToDatabaseUrl, {
                'hotelid': hotelid
            }, function() {

            });
            //tambahkan ke tabel
            $('#tableHotelFavorit').dataTable().fnAddData([
                null,
                hotel.nama,
                hotel.alamat,
                '<a class="btn btn-success btn-xs btnViewHotel" data-id="' + hotel.id + '" ><i class="fa fa-eye"></i></a>&nbsp;' +
                        '<a class="btn btn-danger btn-xs btnDeleteHotelFavorit" data-id="' + hotel.id + '" ><i class="fa fa-trash-o"></i></a>'
            ]);
            //sembunyikan modal
            $('#modalTambahHotel').modal('hide');
        });
        //hapus hotel favorit
        $(document).on('click', '.btnDeleteHotelFavorit', function() {
            if (confirm('Hapus hotel favorit ini?')) {
                var hotelid = $(this).data('id');
                var delHotelUrl = "{{URL::to('admin/page/homepage/delete-hotel')}}" + "/" + hotelid;
                var btn = $(this);
                $.get(delHotelUrl, null, function() {
                    //delete dari table
                    btn.parent('td').parent('tr').hide(250, function() {
                        var row = btn.closest('tr');
                        var nRow = row[0];
                        $('#tableHotelFavorit').dataTable().fnDeleteRow(nRow);
                        //tampilkan tombol tambah hotel
                        $('#btnTambahHotelFavorit').show();
                    });
                });
            }
        });
        //
        //=================== END OF HOTEL FAVORIT =====================
        
        //===================MANAGE RENTAL==============================
        var rentalTersedia;
        $('#btnTambahRentalFavorit').click(function(){
            var getRentalUrl = "{{URL::to('admin/page/homepage/rentals')}}";
            $.get(getRentalUrl, null, function(ge) {
                //clear table
                $('#tablePilihRental').dataTable().fnClearTable();
                //add new row
                var dataRental = JSON.parse(ge);
                rentalTersedia = dataRental;
                $.each(dataRental, function(i, row) {
                    $('#tablePilihRental').dataTable().fnAddData([
                        null,
                        row.nama,
                        '<i class="pull-right currency" >'+row.harga+'</i>' + ' ' + row.currency,                        
                        '<a class="btn btn-primary btn-xs btnPilihRental" data-id="' + row.id + '" >Pilih</a>'
                    ]);
                });
                $('#modalTambahRental .modal-dialog').css('max-width', '800px');
                $('#modalTambahRental').modal('show');
                setCurrency();
            });
        });
        //pilih rental
        $(document).on('click','.btnPilihRental',function(){
            var rentalid = $(this).data('id');
            var rental;
            $.each(rentalTersedia, function(i, row) {
                if (row.id == rentalid) {
                    rental = row;
                }
            });
            //tambahkan ke database
            var postToDatabaseUrl = "{{URL::to('admin/page/homepage/add-rental')}}";
            $.post(postToDatabaseUrl, {
                'rentalid': rentalid
            }, function() {

            });
            //tambahkan ke tabel
            $('#tableRentalFavorit').dataTable().fnAddData([
                null,
                rental.nama,
                '<i class="currency" >'+rental.harga+ '</i>&nbsp' + rental.currency, 
                '<a class="btn btn-success btn-xs btnViewRental" data-id="' + rental.id + '" ><i class="fa fa-eye"></i></a>&nbsp;' +
                        '<a class="btn btn-danger btn-xs btnDeleteRentalFavorit" data-id="' + rental.id + '" ><i class="fa fa-trash-o"></i></a>'
            ]);
            //format currency
            setCurrency();
            //sembunyikan modal
            $('#modalTambahRental').modal('hide');
        });
         //hapus rental favorit
        $(document).on('click', '.btnDeleteRentalFavorit', function() {
            if (confirm('Hapus rental favorit ini?')) {
                var rentalid = $(this).data('id');
                var delRentalUrl = "{{URL::to('admin/page/homepage/delete-rental')}}" + "/" + rentalid;
                var btn = $(this);
                $.get(delRentalUrl, null, function() {
                    //delete dari table
                    btn.parent('td').parent('tr').hide(250, function() {
                        var row = btn.closest('tr');
                        var nRow = row[0];
                        $('#tableRentalFavorit').dataTable().fnDeleteRow(nRow);
                        //tampilkan tombol tambah rental
                        $('#btnTambahRentalFavorit').show();
                    });
                });
            }
        });
        //===================END OF MANAGE RENTAL=======================


    });

</script>
@stop