<div class="modal" id="modalTambahImageHotel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Image Hotel</h4><i></i>
            </div>
            <div class="modal-body">
                <form name="formModalTambahImage" id="formModalTambahImage" action="admin/paket/hotel/tambah-image-hotel" method="POST">
                    <input type="hidden" name="hotelid"/>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td rowspan="3" class="col-span-2">
                                    Lokasi
                                </td>
                                <td>
                                    <select name="islocal" class="form-control">
                                        <option value="Y" >Lokal</option>
                                        <option value="N" >Url</option>
                                    </select>
                                </td>
                                <td rowspan="3" class="col-md-4">
                                    <img id="imgPrevTambahImageHotel" style="width: 100%;" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="file" name="inptImageLocal" />
                                    <input type="text" name="inptImageUrl" class="form-control"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
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
        $('#formModalTambahImage').submit(function(e) {
            var src = $('#formModalTambahImage img').attr('src');
            if (src == null) {
                alert('Tidak ada image yang disimpan.');
            } else {
                $('#formModalTambahImage').ajaxSubmit(function(aje) {
                    //trigger event saved
                    $('#formModalTambahImage').trigger("#formModalTambahImage:saved", aje);
                });
            }

            return false;
        });


    });
</script>