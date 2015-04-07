@extends('back.partials.master')

@section('styles')
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Homepage</h1>
        <!--        <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <!--<h3 class="box-title">Title</h3>-->
                <div class="box-tools pull-right">
<!--                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Content Setting</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Image Slider</a></li>                  
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Welcome Title</td>
                                                <td>
                                                    <textarea>{{$homepage['welcome_title']}}</textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Welcome Subtitle</td>
                                                <td>
                                                    <textarea>{{$homepage['welcome_subtitle']}}</textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- nav-tabs-custom -->
                    </div><!-- /.col -->
                </div> <!-- /.row -->
            </div><!-- /.box-body -->
            <div class="box-footer"></div><!-- /.box-footer-->
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop

@section('scripts')
@stop