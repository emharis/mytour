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
        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Content Setting</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Side Navigation</a></li>
                        <li><a href="#tab_3" data-toggle="tab">Image Slider</a></li>                  
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Welcome Title</td>
                                        <td>
                                            <textarea>{{$homepage['welcome_title']['big_value']}}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Welcome Subtitle</td>
                                        <td>
                                            <textarea>{{$homepage['welcome_subtitle']['big_value']}}</textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Tampilkan Side Navigkation</td>
                                        <td>
                                            <select name="slc_sidenav" class="form-control">
                                                <option value="Y" {{($homepage['show_sidenav']['value']=='Y'?'selected':'')}}>Tampilkan</option>
                                                <option value="N" {{($homepage['show_sidenav']['value']=='N'?'selected':'')}}>Sembunyikan</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
@stop