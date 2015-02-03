@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="admin/comment" class="btn btn-sm btn-success pull-right"><i class="fa fa-angle-double-left"></i> Back</a>

    <h1>Comment</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/comment/reply')}}" enctype="multipart/form-data">
                {{Form::hidden('commentId',$comment->id)}}
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Confirm this comment ?</td>
                            <td>
                                @if($comment->confirmed == 'N')
                                <a class="btn btn-success btn-xs" id="btn-confirm-comment"><i class="fa fa-check"></i> Confirm</a>
                                <a  class="btn btn-danger btn-xs hide" id="btn-unconfirm-comment"><i class="fa fa-times"></i> Unconfirm</a>
                                @else
                                <a class="btn btn-success btn-xs hide" id="btn-confirm-comment"><i class="fa fa-check"></i> Confirm</a>
                                <a class="btn btn-danger btn-xs" id="btn-unconfirm-comment"><i class="fa fa-times"></i> Unconfirm</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">From</td>
                            <td>
                                <input name="nama" value="{{$comment->name}}" type="text" placeholder="Nama" class="col-xs-10 col-sm-12"  readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">Email</td>
                            <td>
                                <input name="email" value="{{$comment->email}}" type="text" placeholder="Email" class="col-xs-10 col-sm-12"  readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2">Website</td>
                            <td>
                                <input name="website" value="{{$comment->website}}" type="text" placeholder="Website" class="col-xs-10 col-sm-12"  readonly/>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Message</td>
                            <td>
                                <textarea name="message" readonly class="col-sm-12">{{$comment->message}}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Artikel</td>
                            <td>
                                <a href="front/blog/show/{{$comment->artikel->id}}" target="_blank" >{{$comment->artikel->judul}}</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Reply</td>
                            <td>
                                @if($comment->reply != null)
                                <textarea name="reply_msg" class="col-sm-12" readonly >{{$comment->reply->message}}</textarea>
                                @else
                                <textarea name="reply_msg" class="mini" ></textarea>
                                @endif
                                
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                 @if($comment->reply == null)
                                <button class="btn btn-info btn-sm" type="submit" onclick="$(this).hide()" >
                                    <i class="ace-icon fa fa-send bigger-110"></i>
                                    Send Reply
                                </button>
                                 @else
                                 <a class="btn btn-danger btn-sm" id="btn-del-reply"><i class="ace-icon fa fa-times bigger-110"></i>Delete Reply</a>
                                 @endif
                                 <a class="btn btn-danger btn-sm" id="btn-del-comment" href="admin/comment/delete/{{$comment->id}}">
                                    <i class="ace-icon fa fa-trash-o bigger-110"></i>
                                    Delete Comment
                                </a>
                                <button class="btn btn-sm" type="reset">
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
        /**
         * Confirm this comment
         */
        $(document).on('click','#btn-confirm-comment',function(){
            var url = "{{URL::to('admin/comment/confirm/'.$comment->id)}}";
            var btn = $(this);
            $.get(url,null,function(){
               alert('Comment confirmed');
               //tampilkan tombol unconfirm
               $('#btn-unconfirm-comment').removeClass('hide');
               //hide tombol confirm
               btn.addClass('hide');               
            });
        });
        /**
         * Unconfirm this comment
         */
        $(document).on('click','#btn-unconfirm-comment',function(){
            var url = "{{URL::to('admin/comment/unconfirm/'.$comment->id)}}";
            var btn = $(this);
            $.get(url,null,function(){
               alert('Comment unconfirmed');
               //tampilkan tombol unconfirm
               $('#btn-confirm-comment').removeClass('hide');
               //hide tombol confirm
               btn.addClass('hide');                        
            });
        });
        
        /**
         * Delete Reply
         */
        $('#btn-del-reply').click(function(e){
            var getUrl = "{{URL::to('admin/comment/deletereply/'.$comment->id)}}";
            var btn = $(this);
           $.get(getUrl,null,function(){
               alert('Reply deleted.');
               //sembunyikan tombol delete reply
               btn.before('<button class="btn btn-info btn-sm" type="submit" ><i class="ace-icon fa fa-send bigger-110"></i>Send Reply</button>');
               btn.hide();
               //remove reply message di text area
               $('textarea[name=reply_msg]').val('');
               $('textarea[name=reply_msg]').addClass('mini');
               $('textarea[name=reply_msg]').removeAttr('readonly');
           });
        });
        
        $('#ckisurl').change(function () {
            if ($(this).is(":checked")) {
                $('input[name=imageurl]').removeClass('hide');
                $('input[name=image]').addClass('hide');
            } else {
                $('input[name=imageurl]').addClass('hide');
                $('input[name=image]').removeClass('hide');
            }
            ;
        });

        //delete image
        $('#button-delete-image').click(function () {
            var delUrl = "{{URL::to('admin/comment/deleteimage/'.$comment->id)}}";
            $.get(delUrl, null, function (data) {
                alert('Image deleted');
                $('.cboxElement').hide(500);
                $('#button-delete-image').parent('td').parent('tr').hide(500);
            }).failed(function (data) {
                alert('Gagal delete image');
            });
        });

        var colorbox_params = {
            rel: 'colorbox',
            reposition: true,
            scalePhotos: true,
            scrolling: false,
            previous: '<i class="ace-icon fa fa-arrow-left"></i>',
            next: '<i class="ace-icon fa fa-arrow-right"></i>',
            close: '&times;',
            current: '{current} of {total}',
            maxWidth: '100%',
            maxHeight: '100%',
            onOpen: function () {
                $overflow = document.body.style.overflow;
                document.body.style.overflow = 'hidden';
            },
            onClosed: function () {
                document.body.style.overflow = $overflow;
            },
            onComplete: function () {
                $.colorbox.resize();
            }
        };
        $('.cboxElement').colorbox(colorbox_params);

    });
</script>
@stop