@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="admin/user" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>New User</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/user/new')}}" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-sm-2">Username</td>
                            <td>
                                <input name="username" type="text" placeholder="Nama" class="col-xs-10 col-sm-12"  required />
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">Password</td>
                            <td>
                                <input name="password" type="password" placeholder="Password" class="col-xs-10 col-sm-12" required />
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">Group</td>
                            <td>
                                {{Form::select('group',$groupsel)}}
                            </td>
                        </tr>
<!--                        <tr>
                            <td>Verified</td>
                            <td >
                                <select class="col-xs-4" name="publish" required >
                                    <option value="N">Don't Verify</option>
                                    <option value="Y">Verify it NOW!!!</option>
                                </select>
                            </td>
                        </tr>-->
                        <tr>
                            <td>Enabled</td>
                            <td >
                                <select class="col-xs-4" name="enabled" required >
                                    <option value="1">Disable it</option>
                                    <option value="0">Enable NOW!!!</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td >
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
<script>
    jQuery(document).ready(function(){
       // image preview from local disk
        $('input[type=file]').on('change', function (ev) {
            var f = ev.target.files[0];
            var fr = new FileReader();

            fr.onload = function (ev2) {
                console.dir(ev2);
                $('#img_upl_prev').attr('src', ev2.target.result);
            };

            fr.readAsDataURL(f);
        });
    });
</script>
@stop