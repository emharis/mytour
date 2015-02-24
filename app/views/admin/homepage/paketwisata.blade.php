<table class="table table-bordered datatable-general">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Price</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $rownum = 1; ?>
        @foreach($travpacks as $trv)
        <tr>
            <td>{{$rownum++}}</td>
            <td>
                {{$trv->nama}}
            </td>
            <td>
                {{$trv->travpackcategory->nama}}
            </td>
            <td>
                {{$trv->price}}
            </td>
            <td>
                <a arridx="{{$rownum-2}}" class="btn btn-success btn-xs btn-pilih" data-dismiss="modal"  >Pilih</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    var paketwisata = {{$travpacks->toJson()}};
    $(document).ready(function () {
        datatableInit();
    });
</script>