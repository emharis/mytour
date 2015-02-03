@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="admin/gallery/photo" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>New Photo</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/gallery/photo/new')}}" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-sm-2">Photo <br/>
                                {{Form::checkbox('isurl',0,false)}} Image is url?
                            </td>
                            <td class="col-sm-6">
                                {{Form::file('img_upl',array('id'=>'img_upl'))}}
                                {{Form::text('imageurl',null,array('class'=>'col-sm-12 hide','placeholder'=>'Image URL'))}}
                            </td>
                            <td rowspan="2" class="col-sm-4">
                                <img id="img_upl_preview" src="" width="100%" />
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">Desc 
                            </td>
                            <td>
                                <input name="desc" type="text" placeholder="Desc" class="col-xs-10 col-sm-12"  required />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <button class="btn btn-info btn-xs" type="submit" >
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

<script type="text/javascript">
    $(document).ready(function () {
        /**
         * Image is url
         */
        $('input[name=isurl]').change(function(){
            if($(this).is(':checked')){
                //ganti dengan imageurl
                $('input[name=img_upl]').addClass('hide');
                $('input[name=imageurl]').removeClass('hide');
            }else{
                $('input[name=img_upl]').removeClass('hide');
                $('input[name=imageurl]').addClass('hide');
            }
        });
        
        /**
         * Imageurl change
         */
        $('input[name=imageurl]').change(function(){
            var src = $(this).val();
            $('#img_upl_preview').attr('src', src);
        });
        
        // image preview from local disk
        $('#img_upl').on('change', function (ev) {
            var f = ev.target.files[0];
            var fr = new FileReader();

            fr.onload = function (ev2) {
                console.dir(ev2);
                $('#img_upl_preview').attr('src', ev2.target.result);
            };

            fr.readAsDataURL(f);
        });
    });
</script>
@stop