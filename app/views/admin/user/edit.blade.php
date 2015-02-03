@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="admin/user" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>Edit User</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/user/edit')}}" enctype="multipart/form-data">
                {{Form::hidden('userId',$user->id)}}
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-sm-2">Nama</td>
                            <td>
                                <input value="{{$user->nama}}" name="nama" type="text" placeholder="Nama" class="col-xs-10 col-sm-12"  required />
                            </td>
                            <td class="col-sm-2 center" rowspan="3" >
                                <img width="116" height="116" id="img_upl_prev" src="{{$user->img}}"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">Company</td>
                            <td>
                                <input value="{{$user->company}}" name="company" type="text" placeholder="Company" class="col-xs-10 col-sm-12"  />
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">Website</td>
                            <td>
                                <input value="{{$user->website}}" name="website" type="text" placeholder="Website" class="col-xs-10 col-sm-12"  />
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">Image</td>
                            <td colspan="2">
                                @if($user->img != '')
                                <a class="btn btn-xs btn-danger" id="btn-del-image">Delete Image</a> 
                                {{Form::file('img_upl',array('class'=>'hide'))}}
                                @else
                                <a class="btn btn-xs btn-danger hide" id="btn-del-image">Delete Image</a> 
                                {{Form::file('img_upl')}}
                                @endif
                                
                            </td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td colspan="2">
                                <textarea name="message" class="col-sm-12 full">{{$user->message}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Publish</td>
                            <td colspan="2">
                                <select class="col-xs-4" name="publish" required >
                                    <option value="N" {{$user->publish == 'N' ? 'selected':''}}>Don't Publish</option>
                                    <option value="Y" {{$user->publish == 'Y' ? 'selected':''}}>Publish it NOW!!!</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <button class="btn btn-xs btn-info" type="submit"  >
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Save
                                </button>
                                <button class="btn btn-xs" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Reset
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </form>

        </div>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
<script>
    jQuery(document).ready(function(){
       // image preview from local disk
        $('input[type=file]').on('change', function (ev) {
            var f = ev.target.files[0];
            var fr = new FileReader();

            fr.onload = function (ev2) {
                console.dir(ev2);
                $('#img_upl_prev').attr('src', ev2.target.result);
            };

            fr.readAsDataURL(f);
        });
        
        //delete image
        $('#btn-del-image').click(function(){
           var url = "{{URL::to('admin/user/deleteimage/'.$user->id)}}";
           $.get(url,null,function(){
              alert('Image deleted...'); 
              //sembunyikan tombol delete
              $('#btn-del-image').addClass('hide');
              $('input[name=img_upl]').removeClass('hide');
           });
        });
    });
</script>
@stop