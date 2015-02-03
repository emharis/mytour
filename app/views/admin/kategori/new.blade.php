@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="{{URL::previous()}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>New Kategori</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/blogs/kategori/new')}}" >
                

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"  > Nama </label>

                    <div class="col-sm-9">
                        <input name="nama" type="text" placeholder="Nama" class="col-xs-10 col-sm-5"  required />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Full Length </label>

                    <div class="col-sm-2">
                        <select class="form-control" name="publish" required >
                            <option value="N">Don't Publish</option>
                            <option value="Y">Publish it NOW!!!</option>
                        </select>
                    </div>
                </div>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">

                        <button class="btn btn-info" type="submit" onclick="$(this).hide()" >
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Save
                        </button>
                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
@stop