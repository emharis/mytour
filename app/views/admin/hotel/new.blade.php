@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="{{URL::previous()}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>New Hotel</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/paket/hotel/new')}}" enctype="multipart/form-data" >
                <table class="table table-bordered">
                    <tbody>
                        
                        <tr>
                            <td>Nama</td>
                            <td colspan="2">
                                <input name="nama" type="text" placeholder="Nama" class="col-sm-12"  required />
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td colspan="2">
                                <input name="alamat" type="text" placeholder="Alamat" class="col-sm-12"  />
                            </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td colspan="2">
                                <input name="price"  type="number" placeholder="Price" class="col-sm-2 uang"  />
                            </td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td colspan="2">
                                <textarea name="desc" class="full"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Fasilitas</td>
                            <td colspan="2">
                                <textarea name="fasilitas" class="mini">
                                    {{"<ol><li>Ketik disini, kemudian enter untuk menambahkan data baru...</li></ol>"}}
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Publish</td>
                            <td colspan="2">
                                <select name="publish">
                                    <option value="N">Don't Publish</option>
                                    <option value="Y">Publish it NOW!!!</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Photo</td>
                            <td>
                                <div class="col-sm-3">
                                    <input name="foto_1" type="file" rel="img-1" />
                                </div>
                                <div class="col-sm-3">
                                    <input name="foto_2" type="file" rel="img-2" />
                                </div>
                                <div class="col-sm-3">
                                    <input name="foto_3" type="file" rel="img-3" />
                                </div>
                                <div class="col-sm-3">
                                    <input name="foto_4" type="file" rel="img-4" />
                                </div>
                                <div class="col-sm-3"><img class="col-sm-12" id="img-1"></div>
                                <div class="col-sm-3"><img class="col-sm-12" id="img-2"></div>
                                <div class="col-sm-3"><img class="col-sm-12" id="img-3"></div>
                                <div class="col-sm-3"><img class="col-sm-12" id="img-4"></div>
                                
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <button class="btn btn-info btn-sm" type="submit" >
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Save
                                </button>
                                <button class="btn btn-sm" type="reset">
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
        /**
         * File Input apik tampilane 
         */
        $('input[type=file]').ace_file_input({
            no_file: 'No File ...',
            btn_choose: 'Choose',
            btn_change: 'Change',
            droppable: false,
            onchange: null,
            thumbnail: true //| true | large
                    //whitelist:'gif|png|jpg|jpeg'
                    //blacklist:'exe|php'
                    //onchange:''
                    //
        });
        
       // image preview from local disk
        $('input[type=file]').on('change', function (ev) {
            var f = ev.target.files[0];
            var fr = new FileReader();
            var inpElm = $(this);
            var imgElm = $('#' + inpElm.attr('rel'));

            fr.onload = function (ev2) {
                console.dir(ev2);
//                $('#img_upl_prev').attr('src', ev2.target.result);
                imgElm.attr('src', ev2.target.result);
            };

            fr.readAsDataURL(f);
        });
        
        /**
         * Delete file input
         */
        $('.ace-file-input .remove').click(function () {
            var flInp = $(this).parent('label');
            var inpElm = flInp.children('input[type=file]');
            var imgElm = $('#' + inpElm.attr('rel'));
            imgElm.attr('src', '');
        });
    });
</script>
@stop