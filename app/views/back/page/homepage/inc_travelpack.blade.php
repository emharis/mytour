<div class="box-header with-border">
    <h4 class="box-title" >Travel Favorit</h4>
    <a class="btn btn-primary pull-right" id="btn-tambah-travel-favorit" >Tambah Travel Favorit</a>
</div><!-- /.box-header -->

<table class="table table-bordered datatable" id="table-travel-favorit">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($travpackfav as $trf)
        <tr>
            <td></td>
            <td>{{$trf->nama}}</td>
            <td>
                <a class="btn btn-success btn-xs btn-view-travel" data-id="{{$trf->travelpack_id}}" ><i class="fa fa-eye"></i></a>
                <a class="btn btn-danger btn-xs btnDeleteTravelpackFavorit" data-id="{{$trf->travelpack_id}}" ><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal" id="modal-tambah-travel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Paket Travel</h4><i></i>
            </div>
            <div class="modal-body">
                <table class="table table-bordered datatable" id="tablePilihTravelPack">
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