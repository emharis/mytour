@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="admin/gallery/video" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>Edit Video</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/gallery/video/edit')}}" enctype="multipart/form-data">
                {{Form::hidden('videoId',$video->id)}}
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-sm-2">Youtube Video ID<br/>

                            </td>
                            <td class="col-sm-6">

                                {{Form::text('videourl',$video->img_path,array('class'=>'col-sm-12','placeholder'=>'Youtube Video ID'))}}
                            </td>
                            <td rowspan="2" class="col-sm-4" id="youtube-iframe">
                                @if($video->img_path != '')
                                <iframe  width="560" height="315" src="//www.youtube.com/embed/{{$video->img_path}}" frameborder="0" allowfullscreen></iframe>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">Desc 
                            </td>
                            <td>
                                <input name="desc" value="{{$video->desc}}" type="text" placeholder="Desc" class="col-xs-10 col-sm-12"  required />
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
         * Video is url
         */
        $('input[name=isurl]').change(function () {
            if ($(this).is(':checked')) {
                //ganti dengan videourl
                $('input[name=img_upl]').addClass('hide');
                $('input[name=videourl]').removeClass('hide');
            } else {
                $('input[name=img_upl]').removeClass('hide');
                $('input[name=videourl]').addClass('hide');
            }
        });

        /**
         * Videourl change
         */
        $('input[name=videourl]').change(function () {
            var src = $(this).val();
            $('#youtube-iframe').text('');
            $('#youtube-iframe').html('<iframe  width="560" height="315" src="//www.youtube.com/embed/' + src + '" frameborder="0" allowfullscreen></iframe>');
        });

        // video preview from local disk
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