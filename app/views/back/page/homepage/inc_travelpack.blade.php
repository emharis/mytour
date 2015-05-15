<div class="box-header with-border">
    <h4 class="box-title" >Travel Favorit</h4>
    @if(count($travpackfav)<4)
    <a class="btn btn-primary pull-right" id="btn-tambah-travel-favorit" >Tambah Travel Favorit</a>
    @endif
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