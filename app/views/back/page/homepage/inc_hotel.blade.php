<div class="box-header with-border">
    <h4 class="box-title" >Hotel Favorit</h4>
    <a class="btn btn-primary pull-right" id="btnTambahHotelFavorit" >Tambah Hotel Favorit</a>
</div><!-- /.box-header -->

<table class="table table-bordered datatable" id="tableHotelFavorit">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($hotelfav as $htl)
        <tr>
            <td></td>
            <td>{{$htl->nama}}</td>
            <td>{{$htl->alamat}}</td>
            <td>
                <a class="btn btn-success btn-xs btn-view-hotel" data-id="{{$htl->hotel_id}}" ><i class="fa fa-eye"></i></a>
                <a class="btn btn-danger btn-xs btnDeleteHotelFavorit" data-id="{{$htl->hotel_id}}" ><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal" id="modalTambahHotel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Paket Hotel</h4><i></i>
            </div>
            <div class="modal-body">
                <table class="table table-bordered datatable" id="tablePilihHotel">
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