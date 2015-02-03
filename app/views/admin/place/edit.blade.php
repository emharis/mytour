@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="{{URL::previous()}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>Edit Place</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div >
            <form class="form-horizontal" method="POST" action="{{URL::to('admin/destination/place/edit')}}" >
                {{Form::hidden('placeId',$place->id)}}

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-sm-2" >Province</td>
                            <td>
                                {{Form::select('province',$selProv,null,array('class'=>'col-sm-4'))}}
                            </td>
                        </tr>  
                        <tr>
                            <td class="col-sm-2" >City</td>
                            <td id="at_select_city">

                            </td>
                        </tr>  
                        <tr>
                            <td class="col-sm-2" >Name</td>
                            <td>
                                <input autofocus value="{{$place->nama}}" name="nama" autocomplete="off" type="text" placeholder="Name" class="col-xs-10 col-sm-12"  required />
                            </td>
                        </tr>  
                        <tr>
                            <td class="col-sm-2" >Description</td>
                            <td>
                                <textarea name="desc">{{$place->desc}}</textarea>
                            </td>
                        </tr>  
                        <tr>
                            <td>Images</td>
                            <td>
                                <?php $imgs = File::allFiles($place->img_folder); ?>
                                <ul class="ace-thumbnails clearfix">              
                                    <?php $imgnum = 1; ?>
                                    @foreach($imgs as $img)

                                    @if (!preg_match('/thumb/',$img) && !preg_match('/Thumb/',$img)) 

                                    <li id="img_{{$imgnum}}">
                                        <a href="<?php echo $img ?>" data-rel="colorbox">
                                            <img width="150" height="150" alt="150x150" src="<?php echo str_replace($place->img_folder.'\\', $place->img_folder.'/thumb_', $img) ?>" />
                                            <div class="text">
                                                <div class="inner"></div>
                                            </div>
                                        </a>

                                        <div class="tools tools-bottom">
                                            <a href="#" class="button-remove-image" id="img_{{$imgnum++}}" path="{{$img}}" thumbpath="<?php echo str_replace($place->img_folder.'\\', $place->img_folder.'/thumb_', $img) ?>">
                                                <i class="red"  >Remove</i>
                                            </a>
                                        </div>
                                    </li>
                                    @endif

                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Upload image:</td>
                            <td >
                                <div action="{{URL::to('admin/destination/place/upload')}}" class="dropzone" id="dropzone" >
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-info" type="submit" >
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

            <h3>Upload Images :</h3>



        </div>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
<script type="text/javascript">
    $(document).ready(function () {
        //onload
        showSelectCity();

        $('form').submit(function (e) {
            $('button[type=submit]').hide();
            $('form').hide();
        });

        /**
         * show select city
         */
        function showSelectCity() {
            var provId = $('select[name=province]').val();
            var getSelUrl = "admin/destination/place/selectcity/" + provId;
            $.get(getSelUrl, null, function (data) {
                $('#at_select_city').html(data);
            });
        }
        $('select[name=province]').change(function () {
            showSelectCity();
        });

        //Upload files
        Dropzone.autoDiscover = false;
        try {
            var myDropzone = new Dropzone("#dropzone", {
                params: {
                    'placeid': $('input[name=placeId]').val()
                },
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 100, // MB

                addRemoveLinks: true,
                dictDefaultMessage:
                        '<span class="bolder"><i class="ace-icon fa fa-caret-right red"></i> Drop files to upload (or click)</span> \
                                                <i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x"></i>'
                ,
                dictResponseError: 'Error while uploading file!',
                //change the previewTemplate to use Bootstrap progress bars
                previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>"
            });
        } catch (e) {
            alert('Dropzone.js does not support older browsers!');
        }


        //image gallery
        var $overflow = '';
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

        $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
        $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange'></i>");//let's add a custom loading icon

        //Delete image gallery
        $(document).on('click', '.button-remove-image', function (e) {
            e.preventDefault();
            var path = $(this).attr('path');
            var thumbpath = $(this).attr('thumbpath');
            var imgid = $(this).attr('id');
            $.post('admin/destination/place/deleteimage', {
                'path': path,
                'thumbpath': thumbpath
            }, function (e) {
                //$(this).parent('div').parent('li').remove();

                alert('Delete success');
                $('#' + imgid).fadeOut(500);

                //delete image from view

            });
        });
    });
</script>
@stop