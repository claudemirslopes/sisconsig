
   
  $(function () {
    $("#example0").DataTable({
      "order": [[ 0, "asc" ]],
      "responsive": true, "lengthChange": false, "autoWidth": false,
	  "iDisplayLength": 50,
      "aoColumnDefs": [{
        "bSortable": false,
        "aTargets": ["nosort"],
      }],
      "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example0_wrapper .col-md-6:eq(0)');
    $("#example1").DataTable({
      "order": [[ 0, "desc" ]],
      "responsive": true, "lengthChange": false, "autoWidth": false,
	  "iDisplayLength": 50,
      "aoColumnDefs": [{
        "bSortable": false,
        "aTargets": ["nosort"],
      }],
      "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
	  "iDisplayLength": 50,
      "aoColumnDefs": [{
        "bSortable": false,
        "aTargets": ["nosort"],
      }],
    });
    $("#example3").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
		"iDisplayLength": 50,
        "aoColumnDefs": [{
        "bSortable": false,
        "aTargets": ["nosort"],    
      }],
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$("#example4").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false,
			"iDisplayLength": 30,
					"aoColumnDefs": [{
					"bSortable": false,
					"aTargets": ["nosort"],    
				}],
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
