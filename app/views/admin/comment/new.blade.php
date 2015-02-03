@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="{{URL::previous()}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>New Artikel</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/blogs/artikel/new')}}" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-sm-2">Judul</td>
                            <td>
                                <input name="judul" type="text" placeholder="Judul" class="col-xs-10 col-sm-12"  required />
                            </td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>
                                {{Form::select('kategori',$kategoris,null,array('class'=>'col-xs-4'))}}
                            </td>
                        </tr>
                        <tr>
                            <td>Sub Konten</td>
                            <td>
                                <textarea name="subkonten" class="mini"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Konten</td>
                            <td>
                                <textarea name="konten" class="full"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Image Header<br/>
                                <?php echo Form::checkbox('image_is_url', true, false, array('id' => 'ckisurl')) ?>Image is URL?
                            </td>
                            <td>
                                <input name="image" type="file" accept="image/*" />
                                <input name="imageurl" type="text" class="hide col-xs-10 col-sm-12"  />
                                * Ukuarn gambar 816x282 px
                            </td>
                        </tr>
                        <tr>
                            <td>Publish</td>
                            <td>
                                <select class="col-xs-4" name="publish" required >
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#ckisurl').change(function () {
            if ($(this).is(":checked")) {
                $('input[name=imageurl]').removeClass('hide');
                $('input[name=image]').addClass('hide');
            } else {
                $('input[name=imageurl]').addClass('hide');
                $('input[name=image]').removeClass('hide');
            }
            ;
        });
    });
</script>
@stop