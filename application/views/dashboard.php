<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('layout/meta'); ?>
    <?php $this->load->view('layout/styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Card styling */
        .card {
            width: 100%;
        }
        .t-a-i-count .card {
            border: none;
            border-radius: 16px;
            background: linear-gradient(145deg, #ffffff, #f5f5f5);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        }

        /* Accent bar (top color) */
        .card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 6px;
            width: 100%;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        /* Match bar colors with chart */
        .card.upcard::before { background: #28a745; } /* Upcoming */
        .card.cwcard::before { background: #007bff; } /* Completed */
        .card.owcard::before { background: #ffc107; } /* Ongoing */
        .card.swcard::before { background: #17a2b8; } /* Scheduled */
        .card.cdwcard::before { background: #dc3545; } /* Cancelled */
        



        /* Card content */
        .card-content {
            padding: 22px 18px 18px 18px;
            text-align: center;
        }
        .card-title {
            font-size: 15px;
            font-weight: 600;
            color: #444;
            margin-top: 10px;
            letter-spacing: 0.3px;
        }
        .card-description {
            font-size: 2rem;
            font-weight: 700;
            color: #057340;
            margin-top: 6px;
        }
        /* Icon style */
        .card-content i {
            font-size: 28px;
            color: #057340;
            background: #e6f4ee;
            padding: 12px;
            border-radius: 50%;
        }

        /* Chart container */
        .chart-container {
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
          
            margin: 30px auto;
        }
        .main_page_view__content{
            padding-top: 0px;
        }
    </style>
</head>
<body>
    <div class="pre-loader" id="loading">
        <img src="<?php echo base_url();?>/assets/img/loader.gif?Version=<?php echo Version; ?>" alt="Loading...">
    </div>

    <?php $this->load->view('layout/nav'); ?>
    <?php $this->load->view('layout/leftnav'); ?>

    <main class="main_page_view__content">
        <section>
            <div class="container">
                <div class="top_product">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="top_product_content">
                                <h4>Dashboard</h4>
                            </div>

                            <!-- Date filter -->
                            <div class="middle_date_picker">
                                <form id="filters1" name="filters1" method="post" class="md_filters" novalidate="novalidate">
                                    <div class="middle_flt datebtn">
                                        <i class="fa fa-calendar"></i>&nbsp;<span></span>
                                        <i class="fa fa-caret-down"></i>
                                        <input id="daterangepicker" type="text" name="daterange"
                                            value="<?php if(!empty($date_from) && !empty($date_to)){ echo $date_from.' - '.$date_to; } ?>"
                                            placeholder="Select Date" class="dtrangeinput valid" aria-invalid="false" autocomplete="off">
                                    </div>
                                    <input type="submit" value="Search" class="btn datebtn" name="search">
                                    <a href="#" id="clear" class="clear_filter">Clear</a>
                                </form>
                            </div>

                            <!-- Cards Row -->
                            <div class="t-a-i-count">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="card upcard">
                                            <div class="card-content">
                                                <i class="fa-solid fa-calendar-check"></i>
                                                <h2 class="card-title">Upcoming Webinars</h2>
                                                <p class="card-description" id="upcomingCount"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card cwcard">
                                            <div class="card-content">
                                                <i class="fa-solid fa-circle-check"></i>
                                                <h2 class="card-title">Completed Webinars</h2>
                                                <p class="card-description" id="completedCount"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card owcard">
                                            <div class="card-content">
                                                <i class="fa-solid fa-play-circle"></i>
                                                <h2 class="card-title">Ongoing Webinars</h2>
                                                <p class="card-description" id="ongoingCount"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card swcard">
                                            <div class="card-content">
                                                <i class="fa-solid fa-clock"></i>
                                                <h2 class="card-title">Scheduled Webinars</h2>
                                                <p class="card-description" id="scheduledCount"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="card cdwcard">
                                            <div class="card-content">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                                <h2 class="card-title">Cancelled Webinars</h2>
                                                <p class="card-description" id="cancelledCount"></p>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-sm-9">
                                          <canvas id="webinarChart"></canvas>
                                    </div>
                                </div>

                               
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </main>

    <?php $this->load->view('layout/copyright'); ?>
    <?php $this->load->view('layout/js'); ?>
    <?php $this->load->view('layout/daterange'); ?>

    <!-- Chart Script -->
    <script>
        const ctx = document.getElementById('webinarChart').getContext('2d');
        const data = {
            labels: ["Upcoming", "Completed", "Ongoing", "Scheduled", "Cancelled"],
            datasets: [{
                label: "Webinars",
                data: [50, 100, 23, 44, 20],
                backgroundColor: [
                    "#28a745", "#007bff", "#ffc107", "#17a2b8", "#dc3545"
                ],
                borderRadius: 6,
                barThickness: 35
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Webinar Summary',
                        color: '#000',
                        font: { size: 18, weight: '600' }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#000', font: { size: 13 } },
                        grid: { display: false }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#000', font: { size: 13 } },
                        grid: { color: 'rgba(0,0,0,0.05)' }
                    }
                }
            }
        };

        new Chart(ctx, config);
    </script>

    <!-- Count Animation -->
    <script>
        function animateCount(id, endValue, duration = 1000) {
            let startValue = 0;
            const increment = endValue / (duration / 16);
            const counter = document.getElementById(id);
            const timer = setInterval(() => {
                startValue += increment;
                if (startValue >= endValue) {
                    clearInterval(timer);
                    counter.textContent = endValue;
                } else {
                    counter.textContent = Math.floor(startValue);
                }
            }, 16);
        }

        animateCount("upcomingCount", 5);
        animateCount("completedCount", 8);
        animateCount("ongoingCount", 3);
        animateCount("scheduledCount", 4);
        animateCount("cancelledCount", 2);
    </script>
</body>
</html>
