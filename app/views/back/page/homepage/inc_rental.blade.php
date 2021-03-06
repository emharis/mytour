<div class="box-header with-border">
    <h4 class="box-title" >Rental Favorit</h4>
    <a class="btn btn-primary pull-right" id="btnTambahRentalFavorit" >Tambah Rental Favorit</a>
</div><!-- /.box-header -->

<table class="table table-bordered datatable" id="tableRentalFavorit">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($rentals as $htl)
        <tr>
            <td></td>
            <td>{{$htl->nama}}</td>
            <td><i class="currency" >{{number_format($htl->harga,2) . '&nbsp;' . $htl->currency}}</i></td>
            <td>
                <a class="btn btn-success btn-xs btn-view-rental" data-id="{{$htl->rental_id}}" ><i class="fa fa-eye"></i></a>
                <a class="btn btn-danger btn-xs btnDeleteRentalFavorit" data-id="{{$htl->rental_id}}" ><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal" id="modalTambahRental" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Paket Rental</h4><i></i>
            </div>
            <div class="modal-body">
                <table class="table table-bordered datatable" id="tablePilihRental">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
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