@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="{{URL::previous()}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>New Menu</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/menu/new')}}" >
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-sm-2" >Title</td>
                            <td>
                                <input name="nama" type="text" placeholder="Nama" class="col-xs-10 col-sm-12"  required />
                            </td>
                        </tr>
                        <tr>
                            <td>Tipe</td>
                            <td>
                                {{$menutype}}  
                            </td>
                        </tr>
                        <tr>
                            <td>Position</td>
                            <td>
                                {{$position}}  
                            </td>
                        </tr>                        
                        <tr>
                            <td>Publish</td>
                            <td>
                                <select class="col-sm-4" name="publish" required >
                                    <option value="N">Don't Publish</option>
                                    <option value="Y">Publish it NOW!!!</option>
                                </select>
                            </td>
                        </tr>     
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-info" type="submit" onclick="$(this).hide()" >
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Save
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Reset
                                </button>                
                            </td>
                        </tr>
                    </tbody>
                </table>

            </form>

        </div>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
@stop