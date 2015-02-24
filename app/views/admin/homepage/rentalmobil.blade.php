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
        @foreach($bestcars as $car)
        <tr>
            <td>{{$rownum++}}</td>
            <td>
                <img class="col-sm-12" src="images/car/{{$car->foto_1}}"/>
            </td>
            <td>
                {{$car->nama}}
            </td>
            <td>
                {{$car->price}}
            </td>
            <td>
                <a arridx="{{$rownum-2}}" class="btn btn-success btn-xs btn-pilih-rental-mobil" data-dismiss="modal"  >Pilih</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    var rentalmobil = {{$bestcars->toJson()}};
    $(document).ready(function () {
        datatableInit();
    });
</script>