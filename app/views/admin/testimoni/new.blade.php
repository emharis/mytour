@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="admin/testimoni" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>New Testimoni</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/testimoni/new')}}" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-sm-2">Nama</td>
                            <td>
                                <input name="nama" type="text" placeholder="Nama" class="col-xs-10 col-sm-12"  required />
                            </td>
                            <td class="col-sm-2 center" rowspan="3" >
                                <img width="116" height="116" id="img_upl_prev"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">Company</td>
                            <td>
                                <input name="company" type="text" placeholder="Company" class="col-xs-10 col-sm-12"  />
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">Website</td>
                            <td>
                                <input name="website" type="text" placeholder="Website" class="col-xs-10 col-sm-12"  />
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">Image</td>
                            <td colspan="2">
                                {{Form::file('img_upl')}}
                            </td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td colspan="2">
                                <textarea name="message" class="col-sm-12 full"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Publish</td>
                            <td colspan="2">
                                <select class="col-xs-4" name="publish" required >
                                    <option value="N">Don't Publish</option>
                                    <option value="Y">Publish it NOW!!!</option>
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