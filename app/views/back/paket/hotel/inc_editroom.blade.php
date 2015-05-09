<form id="form-edit-hotel-room" >
    <table class="table table-bordered" id="table-edit-hotel-room" style="background-color: whitesmoke;">
        <tbody>
            <tr>
                <td colspan="4"><label>Edit Room</label></td>
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
                            <select name="currency" class="form-control" required>
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
                    <select name="publish" class="form-control" required>
                        <option value="Y">Publish</option>
                        <option value="N">Draft</option>
                    </select>
                </td>
                <td>Image</td>
                <td>
                    <!--<input type="file" name="img_cover_new_room"/>-->
                    <a class="btn btn-primary btn-xs" id="btn-pilih-image-room" data-id="{{$hotel->id}}" >Pilih Image</a>
                </td>
            </tr>
            <tr>
                <td colspan="4">Keterangan</td>
            </tr>
            <tr>
                <td colspan="5">
                    <textarea id="textarea-new-room" name="desc" class="tinymce-mini"></textarea>
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