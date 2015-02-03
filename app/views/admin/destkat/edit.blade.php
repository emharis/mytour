@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="{{URL::to('admin/destkat')}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>Edit Kategori Lokasi</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/destkat/edit')}}" enctype="multipart/form-data" >
                {{Form::hidden('destkatId',$destkat->id)}}
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td colspan="2">
                                <input name="nama" type="text" placeholder="Nama" class="col-sm-12"  value="{{$destkat->nama}}" required />
                            </td>
                        </tr>
                        <tr>
                            <td>Subtitle</td>
                            <td>
                                <input name="subtitle" type="text" placeholder="Subtitle" class="col-sm-12"  value="{{$destkat->subtitle}}" />
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
                                @if($destkat->img_path != '')
                                <a href="{{$destkat->img_path}}" data-rel="colorbox" class="cboxElement">
                                    <img width="200"  src="{{$destkat->img_path}}">
                                </a>
                                <br/>
                                <br/>
                                <a id="button-delete-image" class="btn btn-xs btn-warning">Delete Image</a>
                                {{Form::file('img_path',array('class'=>'hide'))}}
                                @else
                                {{Form::file('img_path')}}
                                @endif


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
    $(document).ready(function () {
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

        //delete image
        $('#button-delete-image').click(function () {
            //alert('detel image');
            var destkatId = $('input[name=destkatId]').val();
            var delUrl = "{{URL::to('admin/destkat/deleteimage')}}" + "/" + destkatId;
            //alert(delUrl);
            $.get(delUrl, null, function (data) {
                alert('Image deleted');
                $('.cboxElement').hide(500);
                var td = $('#button-delete-image').parent('td');
                $('#button-delete-image').hide(500);
                $('input[name=img_path]').removeClass('hide');
                //tampilkan form input 

            }).failed(function (data) {
                alert('Gagal delete image');
            });
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