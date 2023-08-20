var lang = {
    "sLengthMenu": "Tampilkan _MENU_ data",
    "sEmptyTable": "Tidak ada data",
    "sInfo": "Menampilkan nomor _START_ - _END_ dari _TOTAL_ data",
    "sInfoEmpty": "Menampilkan 0 data",
    "sInfoFiltered": "(dari _MAX_ data)",
    "sSearch": "Cari:",
    "sZeroRecords": "Data yang Anda cari tidak ada",
    "oPaginate" : {
        "sFirst" : "Pertama",
        "sLast" : "Terakhir",
        "sNext" : "Selanjutnya",
        "sPrevious" : "Sebelumnya"
    }
};
var custom_dom = "<'row'<'col-sm-12 col-md-6 d-flex'Bl><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'<'table-responsive't>r>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>";
$(document).ready(function() {
	$('#dataTable_export_on').dataTable( {
        dom: custom_dom,
        buttons: [
            {
                extend:'print',
                split: ['pdf', 'excel'],
            }
        ],
        "language": lang
	} );
    $('#dataTable_export_members').dataTable( {
        dom: custom_dom,
        buttons: [
            {
                extend:'print',
                exportOptions: {columns: [0,1,2,3,4]},
                title: 'Daftar Anggota',
                split: [
                    {
                        extend:'pdf',
                        exportOptions: {columns: [0,1,2,3,4]},
                        title: 'Daftar Anggota'
                    },
                    {
                        extend:'excel',
                        exportOptions: {columns: [0,1,2,3,4]},
                        title: 'Daftar Anggota'
                    }
                ],
            }
        ],
        "language": lang
	} );
    $('#dataTable_export_salary').dataTable( {
        dom: custom_dom,
        buttons: [
            {
                extend:'print',
                title: 'Riwayat Pendapatan',
                split: [
                    {
                        extend:'pdf',
                        title: 'Riwayat Pendapatan'
                    },
                    {
                        extend:'excel',
                        title: 'Riwayat Pendapatan'
                    }
                ],
            }
        ],
        "language": lang
	} );
	$('#dataTable').dataTable( {
        "language": lang
	} );
} );