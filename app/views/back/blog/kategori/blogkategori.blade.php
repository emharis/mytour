@extends('back.partials.master')

@section('styles')
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Kategori</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <!--<h3 class="box-title">Upload Foto</h3>-->
                        <!--<a class="btn btn-primary btn-sm pull-right" id="btn-tambah-kategori" >Tambah</a>-->
                        <a class="btn btn-primary pull-right" href="admin/page/blog/new-kategori" >Tambah</a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered datatable" id="table-kategori">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kategoris as $kat)
                                <tr>
                                    <td></td>
                                    <td>{{$kat->name}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs btn-edit-kategori" href="admin/page/blog/edit-kategori/{{$kat->id}}"  data-id="{{$kat->id}}" ><i class="fa fa-edit"></i></a>
                                        <a href="admin/page/blog/delete-kategori/{{$kat->id}}" class="btn btn-danger btn-xs btnDeleteKategori" data-id="{{$kat->id}}" ><i class="fa fa-trash-o"></i></a>
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
@include('back.partials.tablescript')
<script>
    $(document).ready(function(){
       //delete kategori
       $('.btnDeleteKategori').click(function(e){
           if(!confirm('Delete kategori ini?')){
               e.preventDefault();
           }
       });
    });
</script>
@stop