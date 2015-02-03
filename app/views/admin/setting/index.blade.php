@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <h1>Setting Setting</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div class="tabbable">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active">
                    <a data-toggle="tab" href="#comp">
                        <i class="green ace-icon fa fa-home bigger-120"></i>
                        Company Info
                    </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#setting">
                        <i class="green ace-icon fa fa-cogs bigger-120"></i>
                        Setting
                        
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="comp" class="tab-pane fade in active" >

                </div>

                <div id="setting" class="tab-pane fade">
                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
                </div>
            </div>
        </div>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<script type="text/javascript">
    jQuery(document).ready(function () {
        /**
         * Loading tab
         */
        $('#myTab a[data-toggle="tab"]').on('shown.bs.tab',function(e){
           if($(e.target).attr('href') == "#messages") {
               
           }
        });
        
        /**
         * Show Comp Info on load
         */
        function showCompInfo(){
            var url = "{{URL::to('admin/setting/compinfo')}}";
            $('#comp').load(url,null,function(){});
        };
        showCompInfo();
    });
</script>
@stop