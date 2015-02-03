@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="{{URL::previous()}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>New Place</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/destination/place/new')}}" >
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-sm-2" >Province</td>
                            <td>
                                {{Form::select('province',$selProv,null,array('class'=>'col-sm-4'))}}
                            </td>
                        </tr>  
                        <tr>
                            <td class="col-sm-2" >City</td>
                            <td id="at_select_city">
                                
                            </td>
                        </tr>  
                        <tr>
                            <td class="col-sm-2" >Name</td>
                            <td>
                                <input autofocus name="nama" autocomplete="off" type="text" placeholder="Name" class="col-xs-10 col-sm-12"  required />
                            </td>
                        </tr>  
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-info" type="submit" >
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Save
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
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
<script type="text/javascript">
    $(document).ready(function () {
        $('form').submit(function (e) {
            $('button[type=submit]').hide();
            $('form').hide();
        });
        
        /**
         * show select city
         */
        function showSelectCity(){
            var provId = $('select[name=province]').val();
           var getSelUrl = "admin/destination/place/selectcity/" + provId; 
           $.get(getSelUrl,null,function(data){
               $('#at_select_city').html(data);
           });
        }
        $('select[name=province]').change(function(){
            showSelectCity();
        });
        showSelectCity();
    });
</script>
@stop