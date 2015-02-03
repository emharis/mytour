@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="{{URL::previous()}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>New Static Page</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/statpage/new')}}" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-sm-2">Title</td>
                            <td>
                                <input name="nama"  type="text" placeholder="Judul" class="col-xs-10 col-sm-12"  required />
                            </td>
                        </tr>
                        <tr>
                            <td>Konten</td>
                            <td>
                                <textarea class="full" name="konten"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Menu</td>
                            <td>
                                {{Form::select('menu',$selectMenu,null,array('class'=>'col-sm-4'))}}
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

        var colorbox_params = {
            rel: 'colorbox',
            reposition: true,
            scalePhotos: true,
            scrolling: false,
            previous: '<i class="ace-icon fa fa-arrow-left"></i>',
            next: '<i class="ace-icon fa fa-arrow-right"></i>',
            close: '&times;',
            current: '{current} of {total}',
            maxWidth: '100%',
            maxHeight: '100%',
            onOpen: function () {
                $overflow = document.body.style.overflow;
                document.body.style.overflow = 'hidden';
            },
            onClosed: function () {
                document.body.style.overflow = $overflow;
            },
            onComplete: function () {
                $.colorbox.resize();
            }
        };
        $('.cboxElement').colorbox(colorbox_params);

    });
</script>
@stop