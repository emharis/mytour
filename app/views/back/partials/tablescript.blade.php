<link href="backend/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="backend/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="backend/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript">
    
    $(document).ready(function () {
        /**
         * Datatable init
         * dan setting datatable dengan autonumber column
         */
        $('.datatable').dataTable({
            bAutoWidth: false,
                    aLengthMenu: [
                        [25, 50, 100, 200, -1],
                        [25, 50, 100, 200, "All"]
                    ],
                    fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                        // Bold the grade for all 'A' grade browsers
                        var index = iDisplayIndexFull + 1;
                        $('td:eq(0)', nRow).html(index);
                        return nRow;
                    }
                });
    });
</script>