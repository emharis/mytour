@extends('back.partials.master')

@section('styles')
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Blog</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <!--<h3 class="box-title">Upload Foto</h3>-->
                        <!--<a class="btn btn-primary btn-sm pull-right" id="btn-tambah-blog" >Tambah</a>-->
                        <a class="btn btn-primary pull-right" href="admin/page/blog/new" >Tambah</a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered datatable" id="table-blog">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Publish</th>
                                    <th>Comments</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blg)
                                <tr>
                                    <td></td>
                                    <td>{{$blg->title}} </td>
                                    <td>{{$blg->kategori}} </td>
                                    <td>
                                        @if($blg->publish == 'Y')
                                        <label class="label label-success" >PUBLISH</label>
                                        @else
                                        <label class="label label-danger" >DRAFT</label>
                                        @endif
                                    </td>
                                    <td></td>
                                    <td>
                                        <a class="btn btn-primary btn-xs btn-edit-blog" href="admin/page/blog/edit/{{$blg->id}}"  data-id="{{$blg->id}}" ><i class="fa fa-edit"></i></a>
                                        <a href="admin/page/blog/delete-blog/{{$blg->id}}" class="btn btn-danger btn-xs btnDeleteBlog" data-id="{{$blg->id}}" ><i class="fa fa-trash-o"></i></a>
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
       //delete blog
       $('.btnDeleteBlog').click(function(e){
          if(confirm('Delete blog ini?')) {
              return true;
          }else{
              return false;
          }
       });
    });
</script>
@stop