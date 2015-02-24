@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="admin/paket/travpackcat" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>Edit Kategori Paket Wisata</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/paket/travpackcat/edit')}}" enctype="multipart/form-data">
                {{Form::hidden('travpackcatId',$travpackcat->id)}}
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-sm-2">Nama</td>
                            <td>
                                <input value="{{$travpackcat->nama}}" name="nama" type="text" placeholder="Nama" class="col-xs-10 col-sm-12"  required />
                            </td>
                            <td class="col-sm-2 center" rowspan="3" >
                                <img width="116" height="116" id="img_upl_prev"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Publish</td>
                            <td colspan="2">
                                <select class="col-xs-4" name="publish" required >
                                    <option {{($travpackcat->publish == 'N' ? 'selected':'')}} value="N">Don't Publish</option>
                                    <option {{($travpackcat->publish == 'Y' ? 'selected':'')}} value="Y">Publish it NOW!!!</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <button class="btn btn-xs btn-info" type="submit"  >
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Save
                                </button>
                                <button class="btn btn-xs" type="reset">
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