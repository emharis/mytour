<table class="table table-bordered datatable-general">
    <thead>
        <tr>
            <th>No</th>
            <th class="col-sm-3" >Foto</th>
            <th>Nama</th>
            <th>Price</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $rownum = 1; ?>
        @foreach($besthotels as $hotel)
        <tr>
            <td>{{$rownum++}}</td>
            <td>
                <img class="col-sm-12" src="images/hotel/{{$hotel->foto_1}}"/>
            </td>
            <td>
                {{$hotel->nama}}
            </td>
            <td>
                {{$hotel->price}}
            </td>
            <td>
                <a arridx="{{$rownum-2}}" class="btn btn-success btn-xs btn-pilih-hotel" data-dismiss="modal"  >Pilih</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    var hotel = {{$besthotels->toJson()}};
    $(document).ready(function () {
        datatableInit();
    });
</script>