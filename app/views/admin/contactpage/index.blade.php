@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <h1>Contactpage Setting</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/contactpage/update')}}" >
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="col-sm-3">
                                Customer Support description
                            </td>
                            <td>
                                {{Form::text('customer_support_desc',$contactpage->customer_support_desc,array('class'=>'col-sm-12','placeholder'=>'Customer Support description'))}}
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-3">
                                Message reply content
                            </td>
                            <td>
                                {{Form::textarea('message_reply_content',$contactpage->message_reply_content,array('class'=>'full','placeholder'=>'message_reply_content'))}}
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-3" colspan="2">
                                <b>Customer support IM</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Yahoo Messenger<br/>
                                {{Form::checkbox('ym_visible', 'ym', $contactpage->ym_visible == 'Y'?true:false )}} Visible
                            </td>
                            <td>
                                {{Form::text('ym',$contactpage->ym,array('class'=>'col-sm-12'))}}
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-primary btn-sm" type="submit">Save</button>
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


    });
</script>
@stop