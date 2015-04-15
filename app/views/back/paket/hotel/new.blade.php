<div class="row" id="row-new">
    <div class="col-md-12" id="box-upload">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Hotel</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form id="form-new-hotel" action="admin/paket/hotel/new" method="POST">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>
                                    <input type="text" class="form-control" name="nama" required/>
                                </td>
                                <td class="col-md-4" rowspan="5">
                                    <img style="width: 100%" class="img-preview"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>
                                    <input type="text" class="form-control" name="alamat" />
                                </td>
                            </tr>
                            <tr>
                                <td>Image Cover <i>min. 170x139px</i></td>
                                <td>
                                    <input type="file" name="img-cover"/>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-primary" id="btn-save-hotel" >Save</button>
                                    <a class="btn btn-danger btn-cancel-hotel" >Cancel</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>