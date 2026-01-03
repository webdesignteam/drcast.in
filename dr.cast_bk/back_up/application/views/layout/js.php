<!-- <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> -->
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/main.js"></script><!-- SweetAlert2 --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js" ></script>
<script src="<?php echo base_url();?>assets/js/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/js/multiipload.js"></script>

 <!-- Form Validation -->
<script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>

<!-- table search -->
<script>
$(document).ready(function () {
    $("#myInputTextField").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        var rows = $("#searchtbl tr");
        var visibleCount = 0;

        rows.each(function () {
            var match = $(this).text().toLowerCase().indexOf(value) > -1;
            $(this).toggle(match);
            if (match) visibleCount++;
        });

        // remove old no-data row if exists
        $("#noDataRow").remove();

        // if no match, show message inside table
        if (visibleCount === 0) {
            $("#searchtbl").append('<tr id="noDataRow"><td colspan="10" style="text-align:center;color:red;font-weight:bold;">No data found</td></tr>');
        }

        // if input is empty, show all
        if (value === "") {
            $("#noDataRow").remove();
            rows.show();
        }
    });
});
</script>


<!-- table search -->




  
<script>
  let leftNavEl=document.getElementById("leftNav");

  function openLeftNav(){
    leftNavEl.classList.toggle("main_page_view");
  }
</script>
   
<script>
    $(document).ready(function() {
        $("#clear").click(function() {
              window.location.href = "<?php if(!empty($clear)){ echo $clear; } ?>";
        });
    });
    $( document ).ready(function() {
        //date picker
            $('#daterangepicker').daterangepicker({
                //"timePicker": true,
                "autoApply": true,
                "autoUpdateInput": false, // Enable autoUpdateInput
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    'Last Year': [moment().subtract(1, 'year'), moment().endOf('year')]
                },
                "startDate": "<?php if(empty($date_from)){ echo date('Y/m/d'); } else{ echo $date_from; } ?>",
                "endDate": "<?php if(empty($date_to)){ echo date('Y/m/d'); } else{ echo $date_to; } ?>",
                locale: {
                  format: 'YYYY-MM-DD'
                },
                "drops": "auto"
            }, function(start, end, label) {
              console.log('New date range selected: ' + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY') + ' (predefined range: ' + label + ')');
            });
            $('#daterangepicker').on('focus', function () {
                $(this).data('daterangepicker').autoUpdateInput = true;
            });
        });
</script>
<script>
    $(document).ready(function() {
    document.getElementById('pro-image').addEventListener('change', readImage, false);
    
    $( ".preview-images-zone" ).sortable();
    
    $(document).on('click', '.image-cancel', function() {
        let no = $(this).data('no');
        $(".preview-image.preview-show-"+no).remove();
    });
});



var num = 4;
function readImage() {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");

        for (let i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.match('image')) continue;
            
            var picReader = new FileReader();
            
            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html =  '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-cancel" data-no="' + num + '">x</div>' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            '<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image">edit</a></div>' +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
        }
        $("#pro-image").val('');
    } else {
        console.log('Browser not support');
    }
}

</script>