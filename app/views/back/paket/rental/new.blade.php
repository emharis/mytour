@extends('back.partials.master')

@section('styles')
<link href="backend/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Tambah Rental</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" id="row-table">
            <div class="col-md-12" id="box-upload">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="pull-right">
                            <a class="btn btn-danger" href="admin/paket/rental" >Cancel</a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="form-edit-rental" action="admin/paket/rental/new" method="POST" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>
                                            <input autocomplete="off" type="text" class="form-control" name="nama" required/>
                                        </td>
                                        <td class="col-md-4" rowspan="3">                                        
                                            <img style="width: 100%" id="imageRentalPreview" src=""  />                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga/Currency</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input  autocomplete="off" type="text" class="form-control currency text-right" name="harga" />
                                                </div>
                                                <div class="col-md-4">
                                                    {{Form::select('currency',array('IDR'=>'IDR','USD'=>'USD'),null,array('class'=>'form-control'))}}
                                                </div>
                                            </div>                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >Image Cover<br/><i>min. 170x139px</i></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <select name="islocal" class="form-control" >
                                                        <option value="Y" >LOCAL</option>
                                                        <option value="N" >URL</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="file" name="imageUploader"/>
                                            <input type="text" name="imageUrl" class="form-control"/>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <textarea name="desc" id="textarea-edit-desc-rental" class="tinymce-mid"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <button type="submit" class="btn btn-primary " id="btn-save-edit-rental" >Save</button>
                                            <a  href="admin/paket/rental"  class="btn btn-danger btn-cancel-edit-rental" data-dismiss="modal" >Cancel</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>                
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop

@section('scripts')
<script src="backend/plugins/jqueryform/jquery.form.min.js" type="text/javascript"></script>
<script src="backend/plugins/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
<script src="js/jquery.formatCurrency-1.4.0.min.js" type="text/javascript"></script>
<script src="js/jquery.formatCurrency.all.js" type="text/javascript"></script>
@include('back.partials.tablescript')
@include('back.partials.editorscript')

<script>
    $(document).ready(function() {
        //auto convert to currency
        $(document).on('blur', '.currency', function() {
            $('.currency').formatCurrency({symbol: ''});
        });
        //========MANAGE IMAGE UPLOAD==================
        //hide imageUrl input
        $('input[name=imageUrl]').hide();
        ////select islocal change
        $('select[name=islocal]').change(function(){
            //clear input
            $('input[name=imageUploader]').val(null);
            $('input[name=imageUrl]').val(null);
            $('#imageRentalPreview').removeAttr('src');
            //set islocal value
            var islocal = $(this).val();
            if(islocal == 'Y'){
                $('input[name=imageUrl]').hide();
                $('input[name=imageUploader]').show();            
            }else{                
                $('input[name=imageUploader]').hide();
                $('input[name=imageUrl]').show();
            }
        });
        //=============================================
    });
</script>
@stop