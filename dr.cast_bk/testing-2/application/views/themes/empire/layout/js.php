<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap-4.3.1/js/bootstrap.min.js"></script>
<!--<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="<?php echo base_url();?>assets/js/main.js"></script>-->

<!-- Form Validation -->
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
		dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Webinar Participants List'
            },
            {
                extend: 'pdfHtml5',
                title: 'Webinar Participants List',
				orientation: 'landscape',
                pageSize: 'A4'
            }
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>
<script>
$(document).ready(function() {
    $('#queries').DataTable( {
        "lengthMenu": [[50, -1], [50, "All"]],
        "searching": false
    } );
} );
</script>




