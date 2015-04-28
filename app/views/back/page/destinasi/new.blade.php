@extends('back.partials.master')

@section('styles')
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Tambah Destinasi</h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="nav-tabs-custom" id="form-tab">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Destinasi</a></li>
                <li><a href="#tab_2" data-toggle="tab">Kategori</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <a class="btn btn-primary pull-right" id="btn-tambah-blog">Tambah</a>

                    <div class="clearfix"></div>
                    <br/>
                    <table class="table table-bordered datatable" id="table-blog">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Publish</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($destinasi as $dest)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class='box-header with-border'>
                        <!--<h3 class='box-title'><i class="fa fa-tag"></i> Color Palette</h3>-->
                        <a class="btn btn-primary btn-tambah-kategori pull-right" href="admin/page/destinasi/new" >Tambah</a>
                    </div>


                    <table class="table table-bordered datatable " id="table-kategori" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th class="col-md-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>

                    <info>* Klik nama kategori untuk edit</info>
                </div>
                <div class="tab-pane" id="tab_3">

                </div><!-- /.tab-pane -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->



<div class="modal" id="modal-tambah-kategori">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-tambah-kategori-blog" action="admin/page/blog/newkategori" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Kategori Blog</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>
                                    <input type="text" name="nama_kategori" class="form-control" required/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"  >Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop

@section('scripts')
@include('back.partials.tablescript')
@include('back.partials.editorscript')

<script>
    $(document).ready(function () {
        
    });
</script>
@stop