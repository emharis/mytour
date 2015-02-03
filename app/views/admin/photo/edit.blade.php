@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="admin/gallery/photo" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>Edit Photo</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/gallery/photo/edit')}}" enctype="multipart/form-data">
                {{Form::hidden('photoId',$photo->id)}}
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-sm-2">Photo <br/>
                                <!--cek apakah image path sudah di isi-->
                                @if($photo->img_path != '')
                                {{Form::checkbox('isurl',0,($photo->img_isurl == 'Y'?true:false))}} Image is url?
                                @else
                                {{Form::checkbox('isurl',0,false)}} Image is url?
                                @endif
                                
                            </td>
                            <td class="col-sm-6">
                                @if($photo->img_path != '')
                                
                                {{Form::file('img_upl',array('id'=>'img_upl','class'=>'hide'))}}
                                @if($photo->img_isurl == 'Y')
                                {{Form::text('imageurl',$photo->img_path,array('class'=>'col-sm-12','placeholder'=>'Image URL'))}}
                                @else
                                {{Form::text('imageurl',$photo->img_path,array('class'=>'col-sm-12 hide','placeholder'=>'Image URL'))}}
                                @endif
                                
                                @else
                                {{Form::file('img_upl',array('id'=>'img_upl'))}}
                                {{Form::text('imageurl',$photo->img_path,array('class'=>'col-sm-12 hide','placeholder'=>'Image URL'))}}
                                @endif

                            </td>
                            <td rowspan="2" class="col-sm-4">
                                
                                <img id="img_upl_preview" src="{{$photo->img_path}}" width="100%" />
                                <br/>
                                <br/>
                                @if($photo->img_path != '')
                                <a class="btn btn-xs btn-danger" id="btn-delete-image">Delete Image</a>
                                @else
                                <a class="btn btn-xs btn-danger hide" id="btn-delete-image">Delete Image</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">Desc 
                            </td>
                            <td>
                                <input value="{{$photo->desc}}" name="desc" type="text" placeholder="Desc" class="col-xs-10 col-sm-12"  required />
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
         * Delete image
         */
        $('#btn-delete-image').click(function () {
            var url = "{{URL::to('admin/gallery/photo/deleteimage/'.$photo->id)}}";
            $.get(url, null, function () {
                alert('Image deleted');
                //clear image
                $('#img_upl_preview').attr('src', '');
                //clear di input url
                $('input[name=imageurl]').val('');
                //sembunyikan image url input
                $('input[type=checkbox]').prop('checked', false);
                $('input[type=checkbox]').change();
                //sembunyikan tombol delete image
                $('#btn-delete-image').hide();
            });
        });

        /**
         * Image is url
         */
        $('input[name=isurl]').change(function () {
            if ($(this).is(':checked')) {
                //ganti dengan imageurl
                $('input[name=img_upl]').addClass('hide');
                $('input[name=imageurl]').removeClass('hide');
            } else {
                $('input[name=img_upl]').removeClass('hide');
                $('input[name=imageurl]').addClass('hide');
            }
        });

        /**
         * Imageurl change
         */
        $('input[name=imageurl]').change(function () {
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