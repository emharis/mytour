@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="admin/menu/new" class="btn btn-sm btn-primary pull-right">New</a>
    <h1>
        Menu
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <div>
            <table class="table table-striped table-bordered table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th class="col-sm-2">Type</th>
                        <th class="col-sm-1">Publish</th>
                        <th class="col-sm-1">Menu Order</th>
                        <th class="col-sm-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $mn)
                    <tr>
                        <td class="col-sm-1"></td>
                        <td>{{$mn->nama}}</td>
                        <td>
                            @if($mn->type == 1)
                            Home Page
                            @elseif($mn->type == 2)
                            Static Page
                            @elseif($mn->type == 3)
                            Blog List
                            @elseif($mn->type == 4)
                            Contact Page
                            @elseif($mn->type == 5)
                            Image/Video Gallery
                            @elseif($mn->type == 6)
                            List of Destination
                            @elseif($mn->type == 7)
                            Booking System
                            @elseif($mn->type == 8)
                            Testimony Page
                            @endif
                        </td>
                        <td class="center">
                            @if($mn->publish == 'Y')
                            <span class="label label-info arrowed-in arrowed-in-right">Publish</span>
                            @else
                            <span class="label label-warning arrowed-in arrowed-in-right">Pending</span>
                            @endif
                        </td>
                        <td class="center">
                            <a href="admin/menu/up/{{$mn->id}}" class="btn btn-xs btn-info"><i class="ace-icon fa fa-arrow-up"></i></a>
                            <a href="admin/menu/down/{{$mn->id}}" class="btn btn-xs btn-warning"><i class="ace-icon fa fa-arrow-down"></i></a>
                        </td>
                        <td class="center">
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green" href="admin/menu/edit/{{$mn->id}}">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red btn-delete" href="admin/menu/delete/{{$mn->id}}" >
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
        $('.btn-delete').click(function (e) {
            if(confirm('Anda yakin akan menghapus data ini?')){
                
            }else{
                e.preventDefault();
            }
        });

        $('.datatable').dataTable({
            bAutoWidth: false,
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            "bSort": false,
            aaSorting: [],
            fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                // Bold the grade for all 'A' grade browsers
                var index = iDisplayIndexFull + 1;
                $('td:eq(0)', nRow).html(index);
                return nRow;
            }
        });
    });
</script>
@stop