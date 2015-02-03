@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="admin/gallery/video/new" class="btn btn-sm btn-primary pull-right">New</a>
    <h1>
        Video
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <div>
            <table class="table table-striped table-bordered table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Video</th>
                        <th>Desc</th>
                        <th class="col-sm-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $pht)
                    <tr>
                        <td class="col-sm-1"></td>
                        <td>
                            <a class="example6" href="http://www.youtube.com/embed/{{$pht->img_path}}" title="{{$pht->desc}}">
                                <img width="200"  src="http://img.youtube.com/vi/{{$pht->img_path}}/0.jpg">
                            </a>
                        </td>
                        <td>
                            {{$pht->desc}}
                        </td>
                        <td class="center">
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green" href="admin/gallery/video/edit/{{$pht->id}}">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red btn-delete" href="admin/gallery/video/delete/{{$pht->id}}" >
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".example6").colorbox({
            iframe: true,
            reposition: true,
            scaleVideos: true,
            innerWidth: $(document).width() * 50 / 100,
            innerHeight: $(document).height() * 50 / 100,
            close: '&times;'
        });

        /**
         * Delete data
         */
        $('.btn-delete').click(function (e) {
            if (confirm('Anda yakin akan menghapus data ini?')) {

            } else {
                e.preventDefault();
            }
        });

        $('.datatable').dataTable({
            bAutoWidth: false,
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            aoColumns: [
                {"bSortable": false}, null, null, {"bSortable": false}
            ],
            aaSorting: [],
            fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                // Bold the grade for all 'A' grade browsers
                var index = iDisplayIndexFull + 1;
                $('td:eq(0)', nRow).html(index);
                return nRow;
            }
        });

//        var colorbox_params = {
//            iframe:true,
//            rel: 'colorbox',
//            reposition: true,
//            scaleVideos: true,
//            scrolling: false,
//            previous: '<i class="ace-icon fa fa-arrow-left"></i>',
//            next: '<i class="ace-icon fa fa-arrow-right"></i>',
//            close: '&times;',
//            current: '{current} of {total}',
//            maxWidth: '100%',
//            maxHeight: '100%',
//            onOpen: function () {
//                $overflow = document.body.style.overflow;
//                document.body.style.overflow = 'hidden';
//            },
//            onClosed: function () {
//                document.body.style.overflow = $overflow;
//            },
//            onComplete: function () {
//                $.colorbox.resize();
//            }
//        };
//        $('.cboxElement').colorbox(colorbox_params);
    });
</script>
@stop