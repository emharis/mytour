@extends('back.partials.master')

@section('styles')
<link href="backend/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Paket Travel</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Data Travel</a></li>
                <li><a href="#tab_2" data-toggle="tab">Hotel</a></li>
                <li><a href="#tab_3" data-toggle="tab">Images</a></li>    
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <form id="form-new-travel" action="admin/paket/travel/edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="travelId" value="{{$travel->id}}" />
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>
                                        <input value="{{$travel->nama}}" autocomplete="off" type="text" class="form-control" name="nama" required/>
                                    </td>
                                    <td class="col-md-4" rowspan="4">
                                        <img style="width: 100%" id="img-new-travel-prev" src="{{$travel->imgpath . $travel->filename}}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>
                                        <input value="{{$travel->harga}}" autocomplete="off" type="text" class="form-control currency text-right" name="harga" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Currency</td>
                                    <td>
                                        {{Form::select('currency',array('IDR'=>'IDR','USD'=>'USD'),$travel->currency,array('class'=>'form-control'))}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Image Cover <i>min. 170x139px</i></td>
                                    <td>
                                        <input type="file" name="input-img-new-travel"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <textarea name="desc" id="textarea-new-desc-travel" class="tinymce-mini">{{$travel->desc}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Include</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <textarea name="include" id="textarea-new-desc-travel" class="tinymce-list-only">{{$travel->include}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Exclude</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <textarea name="exclude" id="textarea-new-desc-travel" class="tinymce-list-only">{{$travel->exclude}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Itinerary</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <textarea name="itinerary" id="textarea-new-desc-travel" class="tinymce-list-only">{{$travel->itinerary}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <button type="submit" class="btn btn-primary " id="btn-save-new-travel" >Save</button>
                                        <a  href="admin/paket/travel"  class="btn btn-danger btn-cancel-new-travel" data-dismiss="modal" >Cancel</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                	<a class="btn btn-primary pull-right" id="btn-tambah-hotel" >Tambah Hotel</a>
                	<h4 >Daftar Hotel Paket Travel</h4>
                	<br/>
                    <table class="table table-bordered datatable" id="table-daftar-hotel">
                    	<thead>
                    		<tr>
                    			<th>No</th>
                    			<th>Nama</th>
                    			<th>Alamat</th>
                    			<th></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach($hotels as $ht)
                    			<tr>
                    				<td></td>
                    				<td>{{$ht->hotel}}</td>
                    				<td>{{$ht->alamat}}</td>
                    				<td>
                                    	<a class="btn btn-danger btn-xs btn-delete-hotel" data-id="{{$ht->hotel_id}}" ><i class="fa fa-trash-o"></i></a>
                    				</td>
                    			</tr>
                    		@endforeach
                    	</tbody>
                    </table>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<div class="modal" id="modal-tambah-hotel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Hotel</h4><i></i>
            </div>
            <div class="modal-body">
            	<table class="table table-bordered datatable" id="table-pilih-hotel">
            		<thead>
            			<tr>
            				<th>No</th>
            				<th>Nama</th>
            				<th>Alamat</th>
            				<th></th>
            			</tr>
            		</thead>
            		<tbody>
            			
            		</tbody>
            	</table>
            </div>
            <div class="modal-footer">
            	<a class="btn btn-danger" data-dismiss="modal" >Close</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop

@section('scripts')
<script src="backend/plugins/jqueryform/jquery.form.min.js" type="text/javascript"></script>
<script src="backend/plugins/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
<script src="js/jquery.formatCurrency-1.4.0.min.js" type="text/javascript"></script>
<script src="js/jquery.formatCurrency.all.js" type="text/javascript"></script>
@include('back.partials.tablescript')
@include('back.partials.editorscript')
<script>
    $(document).ready(function () {
        $('.currency').formatCurrency({symbol: ''});
        //tampilkan modal tambah hotel
        $('#btn-tambah-hotel').click(function(e){
        	//load data table hotel dengan ajax dulu
        	var travelpackId = $('input[name=travelId]').val();
        	var getUrl="{{URL::to('admin/paket/travel/hotels')}}" + "/" + travelpackId;
        	$.get(getUrl,null,function(e){
//        		add row to table
				var tableHotel = $('#table-pilih-hotel').dataTable();
        		var hotels = JSON.parse(e);
        		//clear table dulu
        		tableHotel.fnClearTable();
        		//build table
        		$.each(hotels,function(i,hotel){
        			tableHotel.fnAddData([
		                null,
		                hotel.nama,
		                hotel.alamat,
		                '<a class="btn btn-primary btn-xs btn-pilih-hotel" data-id="' + hotel.id + '" >Pilih</a>' 
		            ]);	
        		});
//	            tampilkan modal
        		$('.modal').modal('show');
        	});        	
        });
        //pilih hotel
        $(document).on('click','.btn-pilih-hotel',function(){
        	var hotelid = $(this).data('id');
        	var travelpackId = $('input[name=travelId]').val();
        	var tdBtn = $(this).parent('td');
        	//simpan hotel yang di pilih ke database
        	var postUrl = "{{URL::to('admin/paket/travel/add-hotel')}}";
        	$.post(postUrl,{
        		'travelpackId':travelpackId,
        		'hotelId':hotelid
        	},function(e){
        		//tampilkan ke dalam tabel
	        	$('#table-daftar-hotel').dataTable().fnAddData([
	                null,
	                tdBtn.prev().prev().text(),
	                tdBtn.prev().text(),
	                '<a class="btn btn-danger btn-xs btn-delete-hotel" data-id="' + hotelid + '" ><i class="fa fa-trash-o"></i></a>' 
				]);		
        	});
        	//close modal
        	$('.modal').modal('hide');
        });
        //delete hotel
        $(document).on('click','.btn-delete-hotel',function(){
        	if(confirm('Hapus data hotel ini?')){
        		var btn = $(this);
				var hotelId = $(this).data('id');
	        	var travelpackId = $('input[name=travelId]').val();
	        	var getUrl="{{URL::to('admin/paket/travel/del-hotel')}}" + "/" + travelpackId + "/" + hotelId;
	        	$.get(getUrl,null,function(){
	        		//remove row
	        		var row = btn.closest('tr');
                    var nRow = row[0];
                    $('#table-daftar-hotel').dataTable().fnDeleteRow(nRow);		
	        	});	
			}
        });
        
    });
</script>

@stop