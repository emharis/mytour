<div class='box-header with-border'>
    <h4 class='box-title'>{{$destinasi->nama}}</h4>
    <div class="pull-right">
        <a class="btn btn-primary" id="btn-tambah-youtube" > Tambah Youtube</a>
        <a class="btn btn-danger" href="admin/page/destinasi"  ><i class="fa fa-angle-double-left"></i> Back</a>
    </div>
</div>

<form id="form-tambah-youtube" style="background: whitesmoke;" action="admin/page/destinasi/add-youtube" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="destinasiId" value="{{$destinasi->id}}" required />
    <table class="table table-bordered" >
        <tbody>
            <tr>
                <td>Url</td>
                <td>
                    <input type="text" name="youtubeid" class="form-control" required/>
                </td>
                <td class="col-md-4" rowspan="2">
                    <img id="img-tambah-youtube" style="width:100%;"/>
                </td>
            </tr>
            <tr>
                <td>
                    Pilih Video Preview
                </td>
                <td>
                    <select name="youtube_prev_option" class="form-control" >
                        <option value="0" >Image 1</option>
                        <option value="1" >Image 2</option>
                        <option value="2" >Image 3</option>
                        <option value="3" >Image 4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button class="btn btn-primary" id="btn-save-tambah-youtube" >Save</button> 
                    <a class="btn btn-danger" id="btn-cancel-tambah-youtube" >Cancel</a> 
                </td>
            </tr>
        </tbody>
    </table>
</form>

<table id="table-daftar-youtube" class="table table-bordered datatable" >
    <thead>
        <tr>
            <th class="col-md-1">No</th>
            <th>Url</th>
            <th class="col-md-2">Preview</th>
            <th class="col-md-1" ></th>
        </tr>
    </thead>
    <tbody>
        @foreach($youtubes as $ytb)
        <tr>
            <td></td>
            <td>
                <a href="{{'https://www.youtube.com/watch?v='.$ytb->filename}}">{{'https://www.youtube.com/watch?v='.$ytb->filename}}</a>                
            </td>
            <td>
                <a class="colorbox" href="http://www.youtube.com/embed/{{$ytb->filename}}" title="{{$ytb->filename}}">
                    <img style="width: 100%;"  src="{{'http://img.youtube.com/vi/'  . $ytb->filename . '/' . $ytb->vidthumb . '.jpg'}}">
                </a>
            </td>
            <td>
                <a class="btn btn-danger btn-del-youtube btn-xs" data-id="{{$ytb->id}}" ><i class="fa fa-trash-o"></i></a>
                <!--<a class="btn btn-primary btn-set-cover btn-xs" data-id="{{$ytb->id}}" >Set Image Cover</a>-->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>