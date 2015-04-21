@extends('back.partials.master')

@section('styles')
<link href="backend/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Paket Travel</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <!--<h3 class="box-title">Upload Foto</h3>-->
                        <!--<a class="btn btn-primary btn-sm pull-right" id="btn-tambah-travel" >Tambah</a>-->
                        <a class="btn btn-primary pull-right" href="admin/paket/travel/new" >Tambah</a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered datatable" id="table-travel">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Currency</th>
                                    <th>Publish</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($travels as $trv)
                                <tr>
                                    <td></td>
                                    <td>{{$trv->nama}}</td>
                                    <td><i class="currency pull-right" >{{$trv->harga}}</i></td>
                                    <td>{{$trv->currency}}</td>
                                    <td>
                                        @if($trv->publish =='Y')
                                        <label class="label label-success" >PUBLISH</label>
                                        @else
                                        <label class="label label-danger" >DRAFT</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-xs btn-edit-travel" data-id="{{$trv->id}}" href="admin/paket/travel/edit/{{$trv->id}}" ><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger btn-xs btn-del-travel" data-id="{{$trv->id}}" href="admin/paket/travel/delete/{{$trv->id}}" ><i class="fa fa-trash-o"></i></a>
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
        //format currencty
        $('.currency').formatCurrency({symbol:''});
        //delete data travel
        $('.btn-del-travel').click(function(e){
           if(confirm('Hapus data paket travel ini?')){
           		e.preventDefault();
           		var btn = $(this);
           		var paketId = $(this).data('id');
               	var getUrl = "{{URL::to('admin/paket/travel/delete')}}" +"/"+ paketId;
               	$.get(getUrl,null,function(e){
               		//delete darti tabel
               		var row = btn.closest('tr');
                    var nRow = row[0];
                    $('#table-travel"').dataTable().fnDeleteRow(nRow);	
               	});
           }else{
               e.preventDefault();
           }
        });
    });
</script>

@stop