@extends('back.partials.master')

@section('styles')
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>About Page</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <!--            <div class="box-header with-border">
                            <h3 class="box-title">Title</h3>
                                            <div class="box-tools pull-right">
                                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                            </div>
                        </div>-->
            <div class="box-body">
                <form action="admin/page/about/update" method="POST">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><label>Content</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="content" class="tinymce-full">{{$aboutpage['content']['big_value']}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="btn btn-primary" type="submit" id="btn-save">Save</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div><!-- /.box-body -->
            <div class="box-footer">

            </div><!-- /.box-footer-->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop

@section('scripts')
@include('back.partials.editorscript')
@stop