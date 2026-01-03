<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/meta');  ?>
	<?php $this->load->view('layout/styles');  ?>
</head>
<body>
    <?php $this->load->view('layout/nav');  ?>
    <?php $this->load->view('layout/leftnav');  ?>
    
    <main class="main_page_view__content">
        <section class="">
            <div class="container">
                <div class="top_product">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="top_product_content">
                                <h4>Analysis by Divisions</h4>
                            </div>
                            <div class="card-container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="graph_container">
                                                <div class="card-content">
                                                    <h5>No of participants by divisons</h5>
                                                    <div>
                                                        <canvas id="myChart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div>
          <canvas id="test"></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </main>
  
    
<script>
   var xValues = [<?php foreach($barchart as $barchart_list) { echo '"'.$barchart_list['webinar_division'].'",'; } ?>];
    var yValues = [<?php foreach($barchart as $barchart_list) { echo $barchart_list['no_of_users'].','; } ?>];
    var barColors = ["red", "green","blue","orange","brown"];
    
    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: "No of Webinars"
        }
      }
    });
</script>
    
    <?php $this->load->view('layout/js');  ?>
</body>
</html>