<table class="table table-bordered">
    <tbody>
        <tr class="tr-setting-image">
            <td><label>Setting Image</label></td>
            <td>
                <a class="btn btn-success" id="btn-tambah-slider">Tambah Image</a>
            </td>
        </tr>
    </tbody>
</table>

<div class="tr-upload-image tr-setting-image" style="background-color: whitesmoke;">
    <form id="slider-form" action="admin/page/homepage/addslider" method="POST" enctype="multipart/form-data">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><label>Upload Image</label><br/>770x354px</td>
                    <td>
                        <input type="file" id="file" name="upl-slider"/>
                    </td>
                    <td rowspan="2" class="col-md-2">
                        <img id="img-preview" style="width:100%;" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" id="btn-save-image" class="btn btn-primary btn-sm">Upload</button>  
                        <a class="btn btn-warning btn-sm btn-cancel-upload">Cancel</a>                                              
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<div class=" tr-setting-image">
    <h4>Data Image Slider</h4>
    <table id="table-image-slider" class="table table-bordered datatable">
        <thead>
            <tr>
                <th>Preview</th>
                <th>Nama File</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $dt)
            <tr>
                <td class="col-sm-2">
                    <img style="width:100%;" src="{{$constval['img_slider_path'].$dt->filename}}" />
                </td>
                <td>{{$dt->filename}}</td>
                <td class="text-center">
                    <a class="btn btn-danger btn-delete-slider" data-id="{{$dt->id}}"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>                            
</div><!-- /.tab-pane -->