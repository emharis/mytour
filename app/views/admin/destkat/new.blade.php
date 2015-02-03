@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="{{URL::previous()}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>New Kategori Lokasi</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/destkat/new')}}" enctype="multipart/form-data" >
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td colspan="2" class="col-sm-6">
                                <input name="nama" type="text" placeholder="Nama" class="col-sm-12"  required />
                            </td>
                        </tr>
                        <tr>
                            <td>Subtitle</td>
                            <td class="col-sm-6">
                                <input name="subtitle" type="text" placeholder="Subtitle" class="col-sm-12"  />
                            </td>
                            <td class="col-sm-4" rowspan="2" style="text-align: center;">
                                <img id="img_upl_prev" width="50%"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Image Cover<br>
                                *260x168px
                            </td>
                            <td>
                                {{Form::file('img_path')}}
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
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

<script type="text/javascript">
    $(document).ready(function(){
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