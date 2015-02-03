@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <h1>Homepage Setting</h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">

        <!-- PAGE CONTENT BEGINS -->
        <div>

            <form class="form-horizontal" method="POST" action="{{URL::to('admin/homepage/update')}}" >
                <table class="table table-bordered">
                    <tr>
                        <td class="col-sm-3">
                            Welcome page description
                        </td>
                        <td>
                            <textarea name="welcom_say" class="full">{{$homepage->welcome_say}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-3">
                            Top Tagline
                        </td>
                        <td>
                            <textarea name="tagline" class="full">{{$homepage->tagline}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">
                            Set visibile to "Our customer say" ?
                        </td>
                        <td>
                            {{Form::select('show_customer_say',array('Y'=>'Visible','N'=>'Hide'),$homepage->show_customer_say,array('class'=>'col-sm-2'))}}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2" colspan="2">
                            <b>SIDEBAR SETTING</b>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">
                            Find a destination <br>
                            {{Form::checkbox('find_a_dest_show', $homepage->find_a_dest_show, $homepage->find_a_dest_show == 'Y' ? true : false)}} Visible
                        </td>
                        <td>
                            Header : {{Form::text('find_a_dest_head',$homepage->find_a_dest_head,array('class'=>'col-sm-12'))}} <br/>
                            Sub header : {{Form::text('find_a_dest_desc',$homepage->find_a_dest_desc,array('class'=>'col-sm-12'))}}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">
                            Read news <br>
                            {{Form::checkbox('read_news_show', $homepage->read_news_show, $homepage->read_news_show == 'Y' ? true : false)}} Visible
                        </td>
                        <td>
                            Header : {{Form::text('read_news_head',$homepage->read_news_head,array('class'=>'col-sm-12'))}} <br/>
                            Sub header : {{Form::text('read_news_desc',$homepage->read_news_desc,array('class'=>'col-sm-12'))}}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">
                            Buy travel guides <br>
                            {{Form::checkbox('buy_travel_guide_show', $homepage->buy_travel_guide_show, $homepage->buy_travel_guide_show == 'Y' ? true : false)}} Visible
                        </td>
                        <td>
                            Header : {{Form::text('buy_travel_guide_head',$homepage->buy_travel_guide_head,array('class'=>'col-sm-12'))}} <br/>
                            Sub header : {{Form::text('buy_travel_guide_desc',$homepage->buy_travel_guide_desc,array('class'=>'col-sm-12'))}}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">
                            What they say <br>
                            {{Form::checkbox('what_they_say_show', $homepage->what_they_say_show, $homepage->what_they_say_show == 'Y' ? true : false)}} Visible
                        </td>
                        <td>
                            Header : {{Form::text('what_they_say_head',$homepage->what_they_say_head,array('class'=>'col-sm-12'))}} <br/>
                            Sub header : {{Form::text('what_they_say_desc',$homepage->what_they_say_desc,array('class'=>'col-sm-12'))}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Save homepage setting
                        </td>
                        <td>
                            <button class="btn btn-info" type="submit" >
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Save
                            </button>
                        </td>
                    </tr>
                </table>
            </form>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="col-sm-2" colspan="2">
                            <b>IMAGE SLIDER</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" >
                            <div class="col-sm-6 " style="border:thin solid lightgrey;padding: 5px;"  >
                                <img id="sld-img" width="100%" src="images/slider/blank_image.jpg"/>
                                <h3 id="sld-title" style="color: white;position: absolute;right: 50%;margin-right: 5%;top: 10%;">Sample Title</h3>
                                <h6 id="sld-subtitle"  style="color: white;position: absolute;right: 50%;margin-right: 5%;top: 25%;">sample sub title</h6>
                            </div>
                            <div class="col-sm-6">
                                {{Form::hidden('sld_id',null,array('class'=>'col-sm-12'))}}
                                <table class="table table-bordered hide" id="table-slider-edit">
                                    <tbody>
                                        <tr>
                                            <td>Nama *1920x400 px</td>
                                            <td>{{Form::text('upd_image',null,array('class'=>'col-sm-12','readonly'))}}</td>
                                        </tr>
                                        <tr>
                                            <td>Title</td>
                                            <td>{{Form::text('upd_title',null,array('class'=>'col-sm-12'))}}</td>
                                        </tr>
                                        <tr>
                                            <td>Sub Title</td>
                                            <td>{{Form::text('upd_sub',null,array('class'=>'col-sm-12'))}}</td>
                                        </tr>
                                        <tr>
                                            <td>Link</td>
                                            <td>{{Form::text('upd_link',null,array('class'=>'col-sm-12'))}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <a class="btn btn-sm btn-primary ">Update</a>
                                                <a id="btn-new-slider" class="btn btn-sm btn-success pull-right">Cancel</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <?php echo Form::open(array('url' => URL::to('admin/homepage/addslider'), 'files' => true, 'class' => 'form-horizontal')); ?>
                                <table class="table table-bordered" id="table-slider-new">
                                    <tbody>
                                        <tr>
                                            <td>Nama *1920x400 px</td>
                                            <td>
                                                {{Form::file('image_slider_upl',array('id'=>'image_slider_upl'))}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Title</td>
                                            <td>{{Form::text('new_title',null,array('class'=>'col-sm-12'))}}</td>
                                        </tr>
                                        <tr>
                                            <td>Subtitle</td>
                                            <td>{{Form::text('new_subtitle',null,array('class'=>'col-sm-12'))}}</td>
                                        </tr>
                                        <tr>
                                            <td>Link</td>
                                            <td>{{Form::text('new_link',null,array('class'=>'col-sm-12'))}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-primary ">Save</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php echo Form::close(); ?>

                            </div>
                            <div class="col-sm-12" style="margin-top: 10px;">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th class="hide">Link</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sldrownum = 1; ?>
                                        @foreach($sliders as $sld)
                                        <tr>
                                            <td>{{$sldrownum++}}</td>
                                            <td>
                                                <a id="sld-img-{{$sld->id}}" href="{{$sld->link}}">{{$sld->img_name}}</a>
                                            </td>
                                            <td id="sld-title-{{$sld->id}}" >{{$sld->title}}</td>
                                            <td id="sld-sub-{{$sld->id}}" >{{$sld->subtitle}}</td>
                                            <td id="sld-link-{{$sld->id}}" class="hide">{{$sld->link}}</td>
                                            <td style="text-align: center;">
                                                <a class="btn-edit-slider btn-edit-sld btn btn-xs btn-success" id="{{$sld->id}}"  href="#" >Edit</a>
                                                <a class="btn-delete-slider btn btn-xs btn-warning" id="{{$sld->id}}"  href="#" >Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table> 
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<script type="text/javascript">
    $(document).ready(function () {
        var sldid;

        $('.btn-edit-slider').click(function (e) {
            e.preventDefault();
            //show table input edit
            $('#table-slider-new').fadeOut(150, function () {
                $('#table-slider-edit').removeClass('hide');
                $('#table-slider-edit').show();
            });
            //
            sldid = $(this).attr('id');
            edit(sldid);

        });

        function edit(id) {
            $('input[name=upd_image]').val($('#sld-img-' + id).text());
            $('input[name=upd_title]').val($('#sld-title-' + id).text());
            $('input[name=upd_sub]').val($('#sld-sub-' + id).text());
            $('input[name=upd_link]').val($('#sld-link-' + id).text());
            $('input[name=sld_id]').val(id);
            //change image
            $('#sld-img').hide();
            $('#sld-img').attr('src', 'images/slider/' + $('input[name=upd_image]').val());
            $('#sld-title').text($('input[name=upd_title]').val());
            $('#sld-subtitle').text($('input[name=upd_sub]').val());
            $('#sld-img').fadeIn(500);
            //scrol to view image
//            $('#sld-img').scrollIntoView()
            var aTag = $("#table-slider-edit");
            $('html,body').animate({scrollTop: aTag.offset().top}, 'slow');
        }

        /**
         * Add new slider
         */
        $('#btn-new-slider').click(function () {
            //hide edit panel
            $('#table-slider-edit').fadeOut(150, function () {
                $('#table-slider-new').removeClass('hide');
                $('#table-slider-new').show();
                //change image to blank
                $('#sld-img').hide();
                $('#sld-img').attr('src', 'images/slider/blank_image.jpg');
                $('#sld-img').fadeIn(500);
                //change title and subtitle
                $('#sld-title').text('Type title');
                $('#sld-subtitle').text('type subtitle');
            });

        });

        /**
         * Binding new slider
         */
        $('input[name=new_title]').keyup(function (e) {
            $('#sld-title').text($(this).val());
        });
        $('input[name=new_subtitle]').keyup(function () {
            $('#sld-subtitle').text($(this).val());
        });
        // image preview from local disk
        $('#image_slider_upl').on('change', function (ev) {
            var f = ev.target.files[0];
            var fr = new FileReader();

            fr.onload = function (ev2) {
                console.dir(ev2);
                $('#sld-img').attr('src', ev2.target.result);
            };

            fr.readAsDataURL(f);
        });

        /**
         * Delete slider
         */
        $('.btn-delete-slider').click(function (e) {
            var trgr = $(this);
            e.preventDefault();
            if (confirm('Anda akan menghapus data ini?')) {
                id = $(this).attr('id');
                $.get('admin/homepage/deleteslider/' + id, null, function (e) {
                    trgr.parent().parent().fadeOut();
                });
            }

        });

    });
</script>
@stop