<div class="modal" id="modal-edit-room" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Room</h4><i></i>
            </div>
            <div class="modal-body">
                <form name="formModalTambahRoom" id="formModalTambahRoom" action="admin/paket/hotel/new-room" method="POST">
                    <input type="hidden" name="hotelid"/>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="col-span-2">
                                    Nama
                                </td>
                                <td>
                                    <input type="text" name="nama" class="form-control" required/>
                                </td>
                                <td rowspan="4" class="col-md-4">
                                    <img id="imgPrevTambahImageHotel" style="width: 100%;" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Harga
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="harga" class="form-control text-right currency" required/>        
                                        </div>
                                        <div class="col-md-4">
                                            <select name="currency" class="form-control">
                                                <option value="IDR" >IDR</option>
                                                <option value="USD" >USD</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Publish
                                </td>
                                <td>
                                    <select name="publish" class="form-control">
                                        <option value="Y" >PUBLISH</option>
                                        <option value="N" >DRAFT</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Pilih Image
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-xs" id="btnPilihImage" >Pilih Image</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Keterangan
                                </td>
                                <td colspan="2" >

                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" >
                                    <textarea name="desc" class="tinymce-mid" id="textareaDescTambahRoom" ></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-primary btn-sm" >Save</button>
                                    <a class="btn btn-sm btn-danger" data-dismiss="modal" >Cancel</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function() {
        //sembunyikan input url
        $('input[name=inptImageUrl]').hide();
        //select lokasi change
        $('select[name=islocal]').change(function(e) {
            if ($(this).val() == 'Y') {
                $('input[name=inptImageUrl]').hide();
                $('input[name=inptImageLocal]').show();
            } else {
                $('input[name=inptImageLocal]').hide();
                $('input[name=inptImageUrl]').show();
            }
        });
        //upload image
        var _URL = window.URL && window.webkitURL;
        $('input[name=inptImageLocal]').change(function(ev) {
//            alert('image preview,,,,');
            var image, file;
            var imgPrev = $('#imgPrevTambahImageHotel');
            if ((file = this.files[0])) {
                image = new Image();
                image.onload = function() {
//                    alert("The image width is " + this.width + " and image height is " + this.height);                    
                    //cek dimension jika tidak sesuai sembunyikan tombol submit
                    if (this.width < 170 || this.height < 139) {
                        alert('Dimensi image tidak sesuai.');
                        //set null image upload
                        $(this).val(null);
                        imgPrev.removeAttr('src');
                    } else {
                        var f = ev.target.files[0];
                        var fr = new FileReader();
                        fr.onload = function(ev2) {
                            console.dir(ev2);
                            imgPrev.attr('src', ev2.target.result);
                        };
                        fr.readAsDataURL(f);
                    }
                };
                image.src = _URL.createObjectURL(file);
            }
        });
        //image from URL
        $('input[name=inptImageUrl]').blur(function(e) {
            $('#imgPrevTambahImageHotel').attr('src', $(this).val());
        });
        //submit tambah image
        $('#formModalTambahRoom').submit(function(e) {
            tinyMCE.triggerSave();
            //change harga to number
            $('#formModalTambahRoom .currency').val($('#formModalTambahRoom .currency').asNumber());
            //submit the form
            $('#formModalTambahRoom').ajaxSubmit(function(aje) {
                //trigger event saved
                $('#formModalTambahRoom').trigger("#formModalTambahRoom:saved", aje);
            });
            return false;
        });
        //currency format
        $(document).on('blur', '.currency', function() {
            $(this).formatCurrency({symbol: ''});
        });


    });
</script>