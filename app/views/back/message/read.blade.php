@extends('back.partials.master')

@section('styles')
<!-- iCheck -->
<link href="backend/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Read Mail
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="admin/message" class="btn btn-primary btn-block margin-bottom">Back to inbox</a>
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
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Read Mail</h3>
<!--                        <div class="box-tools pull-right">
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                        </div>-->
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <h3>{{$message->name}}</h3>
                            <h5>From: {{$message->email}} <span class="mailbox-read-time pull-right">{{$message->created_at}}</span></h5>
                        </div><!-- /.mailbox-read-info -->
                        <div class="mailbox-controls with-border text-center">
                            <div class="btn-group">
                                <a href="{{URL::to('admin/message/delete/'.$message->id)}}" class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
                                <a href="{{URL::to('admin/message/reply/'.$message->id)}}" class="btn btn-default btn-sm" data-toggle="tooltip" title="Reply"><i class="fa fa-reply"></i></a>
                                <!--<button class="btn btn-default btn-sm" data-toggle="tooltip" title="Forward"><i class="fa fa-share"></i></button>-->
                            </div><!-- /.btn-group -->
                            <!--<button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button>-->
                        </div><!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            {{$message->message}}
                        </div><!-- /.mailbox-read-message -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        
                    </div><!-- /.box-footer -->
                    <div class="box-footer">
                        <div class="pull-right">
                            <a href="{{URL::to('admin/message/reply/'.$message->id)}}" class="btn btn-default"><i class="fa fa-reply"></i> Reply</a>
                            <!--<button class="btn btn-default"><i class="fa fa-share"></i> Forward</button>-->
                        </div>
                        <a href="{{URL::to('admin/message/delete/'.$message->id)}}" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</a>
                        <!--<button class="btn btn-default"><i class="fa fa-print"></i> Print</button>-->
                    </div><!-- /.box-footer -->
                </div><!-- /. box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop

@section('scripts')
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
    });
</script>
@stop