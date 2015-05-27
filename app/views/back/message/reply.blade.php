@extends('back.partials.master')

@section('styles')
<!-- iCheck -->
<link href="backend/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reply Message
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="admin/message" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Folders</h3>
                        <div class='box-tools'>
                            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{URL::to('admin/message')}}"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">{{count($messages)}}</span></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                        </ul>
                    </div><!-- /.box-body -->
                </div><!-- /. box -->
            </div><!-- /.col -->
            <div class="col-md-9">
                <form action="admin/message/reply" method="POST" >
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Reply Message</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <input name="email" class="form-control" placeholder="To:" readonly value="{{$message->email}}" />
                            </div>
                            <div class="form-group">
                                <input name="subject" class="form-control" placeholder="Subject:" readonly value="Subject" />
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="compose-textarea" class="form-control tinymce-mid" style="height: 300px"></textarea>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-right">
    <!--                            <button class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>-->
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                            </div>
                            <button class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                        </div><!-- /.box-footer -->
                    </div><!-- /. box -->
                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop

@section('scripts')
@include('back.partials.editorscript')
<!-- Slimscroll -->
<script src="backend/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='backend/plugins/fastclick/fastclick.min.js'></script>
<!-- iCheck -->
<script src="backend/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- Page Script -->
<script>
    $(function() {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('.mailbox-messages input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function() {
            var clicks = $(this).data('clicks');
            if (clicks) {
                //Uncheck all checkboxes
                $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
                $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
            } else {
                //Check all checkboxes
                $(".mailbox-messages input[type='checkbox']").iCheck("check");
                $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
            }
            $(this).data("clicks", !clicks);
        });

        //Handle starring for glyphicon and font awesome
        $(".mailbox-star").click(function(e) {
            e.preventDefault();
            //detect type
            var $this = $(this).find("a > i");
            var glyph = $this.hasClass("glyphicon");
            var fa = $this.hasClass("fa");

            //Switch states
            if (glyph) {
                $this.toggleClass("glyphicon-star");
                $this.toggleClass("glyphicon-star-empty");
            }

            if (fa) {
                $this.toggleClass("fa-star");
                $this.toggleClass("fa-star-o");
            }
        });
        
        //Submit form
        $('form').submit(function(){
            tinyMCE.triggerSave();
           $('form') .ajaxSubmit(function(){
               
           });
        });
    });
</script>
@stop