<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->load->view('themes/'.$eventinfo[0]['wc_tm_name'].'/layout/meta'); ?>
    <?php $this->load->view('themes/'.$eventinfo[0]['wc_tm_name'].'/layout/styles'); ?>
</head>
<body>
    <?php //echo"<pre>"; print_r($eventinfo); ?>
    <ul>
        <li><a href="streaming">Streaming</a></li>
        <li><a href="logout">logout</a></li>
    </ul>

    <div>
        <?php if($eventinfo[0]['wc_ws_company'] == 'DRCAST'){ ?>
            Technical Partner: DRCAST
        <?php } elseif($eventinfo[0]['wc_ws_company'] == 'Hetero'){ ?>
            Technical Partner: Hetero Healthcare
        <?php } elseif($eventinfo[0]['wc_ws_company'] == 'Azista'){ ?>
            Technical Partner: Azista Industries
        <?php } ?>
    </div>
    
    <?php if($eventinfo[0]['wc_w_platform'] == 'WebinarPortal'){ ?>
        <iframe width="720" height="500" src="https://www.youtube-nocookie.com/embed/<?php echo $eventinfo[0]['wc_w_streaming_link']; ?>?modestbranding=1&controls=1&showinfo=1" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <?php } else{ echo "Platform Not Selected"; } ?>
    
    
    <form class="form-horizontal" method="post" name="querysubmission" id="querysubmission" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">Ask your Query ?</div>
            <div class="card-body">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="query"></textarea>
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary log-btn" value="Send Query" name="submit">
                </div>
            </div>
        </div>
    </form>
    
    <?php $this->load->view('themes/'.$eventinfo[0]['wc_tm_name'].'/layout/js'); ?>
    <script>
        $(function() {
        $("#querysubmission").validate({
            rules: {
                query: {
                    required: true,
                }
            },
            messages: {
                query: {
                    required: "Enter your Query",
                }
            },
            submitHandler: function(form) {
                // for demo
                var myForm = document.getElementById("querysubmission");
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url();?>Home/submitquery",
                    dataType: "text", // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: new FormData(myForm),
                    success: function(data) {
                        // alert(data);
                        var obj = jQuery.parseJSON(data);
                        if (obj.status == 1) {
                            $('#querysubmission')[0].reset();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Query Submitted.',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                $('#querysubmission')[0].reset();
                            });
                        } else {
                            Swal.fire("Oops", obj.message, "error");
                        }
                    },
                });
                return false;
            },
        });
    });
    </script>
</body>
</html>