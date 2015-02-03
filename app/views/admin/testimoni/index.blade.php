@extends('admin.partials.master')

@section('main_content')

<div class="page-header">
    <a href="admin/testimoni/new" class="btn btn-sm btn-primary pull-right">New</a>
    <h1>
        Testimoni
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <div>
            <table class="table table-striped table-bordered table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Company</th>
                        <th>Website</th>
                        <th>Testimony</th>
                        <th class="col-sm-2">Publish</th>
                        <th class="col-sm-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonis as $tst)
                    <tr>
                        <td ></td>
                        <td >{{$tst->nama}}</td>
                        <td >{{$tst->company}}</td>
                        <td >{{$tst->website}}</td>
                        <td>{{substr($tst->message,0,100)}}[...]</td>
                        <td  style="text-align: center;">
                            @if($tst->publish == 'Y')
                            <span class="label label-info arrowed-in arrowed-in-right">Published</span>
                            @else
                            <span class="label label-warning arrowed-in arrowed-in-right">Pending</span>
                            @endif
                        </td>
                        <td class="center">
                            <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green" href="admin/testimoni/edit/{{$tst->id}}">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red btn-delete" href="admin/testimoni/delete/{{$tst->id}}" >
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
            aoColumns: [
                {"bSortable": false}, null,null,null, null, null, {"bSortable": false}
            ],
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