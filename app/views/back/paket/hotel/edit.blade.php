<div class="modal" id="modal-edit-hotel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Hotel</h4>
                </div>
                <div class="modal-body">
                    <form id="form-edit-hotel" action="admin/paket/hotel/new" method="POST">
                        <input type="hidden" name="hotelId"/>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>
                                        <input autocomplete="off" type="text" class="form-control" name="nama" required/>
                                    </td>
                                    <td class="col-md-4" rowspan="4">
                                        <img style="width: 100%" id="img-edit-hotel-prev"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>
                                        <input autocomplete="off" type="text" class="form-control" name="alamat" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Image Cover <i>min. 170x139px</i></td>
                                    <td>
                                        <input type="file" name="img-cover-edit-hotel"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <textarea name="desc" id="textarea-edit-desc-hotel" class="tinymce-mid"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <button type="submit" class="btn btn-primary btn-save-hotel" >Save</button>
                                        <a class="btn btn-danger btn-cancel-hotel" data-dismiss="modal" >Cancel</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
<!--                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"  >Save</button>
                </div>-->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
