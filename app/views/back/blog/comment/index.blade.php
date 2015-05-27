@extends('back.partials.master')

@section('styles')
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Comment</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered datatable" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Blog</th>
                                    <th>Tanggal</th>
                                    <th class="col-md-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comm)
                                <tr>
                                    <td></td>
                                    <td>{{$comm->name}}</td>
                                    <td>
                                        {{substr($comm->title,0,50)}}...
                                    </td>
                                    <td>{{date_format(new DateTime($comm->created_at),'m/d/Y')}}</td>
                                    <td>
                                        <a data-id="{{$comm->id}}" href="admin/page/blog/reply-comment/{{$comm->id}}" class="btnReply btn btn-xs btn-primary" ><i class="fa fa-reply" ></i></a>
                                        <a data-id="{{$comm->id}}" class="btnDeleteComment btn btn-xs btn-danger " ><i class="fa fa-trash-o" ></i></a>
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

<div id="sectionShowComment"  >
    <table class="table table-bordered" style="background-color: whitesmoke;" >
        <tbody>
            <tr>
                <td class="col-md-2"><b>Nama:</b></td>
                <td id="sectionNama"></td>
                <td class="col-md-2"><b>Email:</b></td>
                <td id="sectionEmail"></td>
                <td class="col-md-2"><b>URL:</b></td>
                <td id="sectionUrl"></td>
            </tr>
            <tr>
                <td class="col-md-2"><b>Blog:</b></td>
                <td id="sectionBlog" colspan="6" ></td>
            </tr>
            <tr>
                <td colspan="2" ><b>Comment:</b></td>
            </tr>
            <tr>
                <td colspan="2" id="sectionComment" ></td>
            </tr>
        </tbody>
    </table>
</div>

@stop

@section('scripts')
@include('back.partials.tablescript')
@stop