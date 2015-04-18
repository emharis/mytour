<div class="row" id="row-edit">
    <div class="col-md-12" id="box-upload">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Hotel</h3>
                <a class="btn btn-danger btn-cancel-hotel pull-right" >Cancel</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form id="form-edit-hotel" action="admin/paket/hotel/edit" method="POST">
                    <input type="hidden" name="hotelId" />
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>
                                    <input type="text" class="form-control" name="nama" required/>
                                </td>
                                <td class="col-md-4" rowspan="4">
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
                                <td>Image Cover</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="file" name="img-cover"/>
                                        </div>
                                        <div class="col-md-8 text-right" >
                                            <a class="btn btn-success btn-xs" id="btn-reset-image"><i class="fa fa-refresh"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <textarea name="desc" id="textarea-desc-hotel" class="tinymce-mid"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-save-hotel" >Save</button>
                                    <a class="btn btn-danger btn-cancel-hotel" >Cancel</a>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12" id="box-room">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Room</h3>
                <a class="btn btn-primary btn-sm pull-right" id="btn-tambah-room">Tambah Room</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form id="form-new-room" action="admin/paket/hotel/newroom" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="hotelId" />
                <table class="table table-bordered" id="table-new-room" style="background-color: whitesmoke;">
                    <tbody>
                        <tr>
                            <td colspan="4"><label>Input data room baru</label></td>
                            <td rowspan="4" class="col-md-4">
                                <img id="img-prev-room" style="width: 100%;"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>
                                <input type="text" name="nama" class="form-control" required/>
                            </td>
                            <td>Harga</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" name="harga" class="form-control text-right" required/>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="currency" class="form-control">
                                            <option value="IDR">IDR</option>
                                            <option value="USD">USD</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Publish</td>
                            <td>
                                <select name="publish" class="form-control">
                                    <option value="Y">Publish</option>
                                    <option value="N">Draft</option>
                                </select>
                            </td>
                            <td>Image</td>
                            <td>
                                <input type="file" name="img_cover"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Keterangan</td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <textarea id="textarea-desc" name="desc" class="tinymce-mid"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <button type="submit" class="btn btn-primary" id="btn-save-room">Save</button>
                                <a class="btn btn-danger" id="btn-cancel-room">Cancel</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
                <div class="clearfix"></div><br/>
                <table id="table-room" class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Currency</th>
                            <th>Publish</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>