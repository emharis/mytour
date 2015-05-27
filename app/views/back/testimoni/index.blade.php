@extends('back.partials.master')

@section('styles')
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Testimonial</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <!--<h3 class="box-title">Upload Foto</h3>-->
                        <!--<a class="btn btn-primary btn-sm pull-right" id="btn-tambah-testimoni" >Tambah</a>-->
                        <a class="btn btn-primary pull-right" href="admin/testimoni/new" >Tambah</a>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered datatable" id="table-testimoni">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Negara</th>
                                    <th class="col-md-8">Message</th>                                    
                                    <th>Publish</th>
                                    <th class="col-md-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonis as $test)
                                <tr>
                                    <td></td>
                                    <td>{{$test->nama}} </td>
                                    <td>{{$test->country}} </td>
                                    <td>{{$test->message}} </td>
                                    <td>
                                    @if($test->publish == 'Y')
                                    <label class="label label-success" ><i class="fa fa-check" ></i></label>
                                    @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-xs btn-edit-testimoni" href="admin/testimoni/edit/{{$test->id}}"  data-id="{{$test->id}}" ><i class="fa fa-edit"></i></a>
                                        <a href="admin/testimoni/delete/{{$test->id}}" class="btn btn-danger btn-xs btnDeleteTestimonial" data-id="{{$test->id}}" ><i class="fa fa-trash-o"></i></a>
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
       //delete testimoni
       $('.btnDeleteTestimonial').click(function(e){
          if(confirm('Delete testimoni ini?')) {
              return true;
          }else{
              return false;
          }
       });
    });
</script>
@stop