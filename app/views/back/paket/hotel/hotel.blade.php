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

    });
</script>

@stop