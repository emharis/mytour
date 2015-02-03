@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="{{URL::to('admin/destination')}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>Edit Destination</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/destination/edit')}}" enctype="multipart/form-data" >
                {{Form::hidden('destId',$dest->id)}}
                <table class="table table-bordered">
                    <tbody>

                        <tr>
                            <td>Nama</td>
                            <td colspan="2">
                                <input value="{{$dest->nama}}" name="nama" type="text" placeholder="Nama" class="col-sm-12"  required />
                            </td>
                        </tr>
                        <tr>
                            <td>Subtitle</td>
                            <td colspan="2">
                                <input value="{{$dest->subtitle}}" name="subtitle" type="text" placeholder="Subtitle" class="col-sm-12"  />
                            </td>
                        </tr>
                        <tr>
                            <td>Kategori Lokasi</td>
                            <td class="col-sm-6">
                                {{Form::select('destkat', $seldest,$dest->destkat_id,array('class'=>'col-sm-4'))}}
                            </td>
                            <td rowspan="4" class="col-sm-4" style="text-align: center;">
                                @if($dest->img_path != '')
                                <a href="{{$dest->img_path}}" data-rel="colorbox" class="cboxElement">
                                    <img id="img_upl_prev" width="50%"  src="{{$dest->img_path}}">
                                </a>
                                @else
                                <img id="img_upl_prev" width="50%" {{$dest->img_path!=''?'src="' . $dest->img_path . '"':''}} />
                                @endif
                            </td>

                        </tr>
                        <tr>
                            <td>Kategori Wisata</td>
                            <td>
                                {{Form::select('kategori', $selkat,$dest->kategori_id,array('class'=>'col-sm-4'))}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Image Cover<br>
                                *260x168px
                            </td>
                            <td>
                                @if($dest->img_path != '')
                                <a class="btn btn-sm btn-warning" id="btn-del-image" >Delete Image</a>
                                {{Form::file('img_path',array('id'=>'img_upl','class'=>'hide'))}}
                                @else
                                {{Form::file('img_path',array('id'=>'img_upl'))}}
                                @endif


                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td colspan="2">
                                <textarea name="desc" class="full">{{$dest->desc}}</textarea>
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
        $('#img_upl').on('change', function (ev) {
            var f = ev.target.files[0];
            var fr = new FileReader();

            fr.onload = function (ev2) {
                console.dir(ev2);
                $('#img_upl_prev').attr('src', ev2.target.result);
            };

            fr.readAsDataURL(f);
        });

        /**
         * Hapus image cover
         */
        $('#btn-del-image').click(function () {
            //hapus image
            var delUrl = "{{URL::to('admin/destination/deleteimage/'.$dest->id)}}";
            var btn = $(this);
            $.get(delUrl, null, function (data) {
                alert('Image deleted');
                //$('.cboxElement').hide(500);
                //$('#button-delete-image').parent('td').parent('tr').hide(500);
                //tmapilkan input upload
                $('input[name=img_path]').removeClass('hide');
                //clearkan image di preview
                $('#img_upl_prev').attr('src', '');
                //sembunyikan tombol delete
                btn.hide();
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