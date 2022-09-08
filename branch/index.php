<?php
include("../app/v1/connection-branch-admin.php");
include("common/header.php");
include("common/navbar.php");
include("common/sidebar.php");
administratorAuth();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header mb-2 p-0  border-bottom">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BRANCH_URL ?>" class="text-dark"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Dashboard</a></li>
            </ol>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-7">
                    <div class="card card-outline card-primary w-100">
                        <div class="card-header text-start">Financials – Key Highlights</div>
                        <div class="card-body">
                            <canvas id="financialsKeyHighlightsChartCanvasId" height="350"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="row h-50 m-0 p-0">
                        <div class="card card-outline card-primary w-100">
                            <div class="card-header text-start">Admin Expenses- YTD Feb 22</div>
                            <div class="card-body p-0 m-0">
                                <canvas id="adminExpensesYTDChartCanvasId" height="100"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="row h-50 m-0 p-0">
                        <div class="card card-outline card-primary w-100">
                            <div class="card-header text-start">Sales -Past 6 Month</div>
                            <div class="card-body m-0 p-0">
                                <canvas id="salesPastChartCanvasId" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary w-100">
                        <div class="card-header text-start">Vertical wise Revenue Break-up</div>
                        <div class="card-body">
                            <canvas id="verticalWiseRevenueBreakUpChartCanvasId" height="100"></canvas>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-6">
                    <div class="card card-outline card-primary w-100">
                        <div class="card-header text-start">Sales -Past 6 Month</div>
                        <div class="card-body">
                            <canvas id="salesPastChartCanvasId" style="min-height: 350px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-outline card-primary w-100">
                        <div class="card-header text-start">Admin Expenses- YTD Feb 22</div>
                        <div class="card-body">
                            <canvas id="adminExpensesYTDChartCanvasId" style="min-height: 350px;"></canvas>
                        </div>
                    </div>
                </div> -->


            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.Content Wrapper. Contains page content -->

<?php
include("common/footer.php");
?>


<script>
    $(document).ready(function() {

        function renderFinancialsKeyHighlightsChart() {
            let ctx = document.getElementById("financialsKeyHighlightsChartCanvasId").getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Revenue", "Direct Expenses", "S&D Cost", "Emp Cost", "Admin Cost", "Fin Cost", "Depreciation", "PBT"],
                    datasets: [{
                        label: 'Expense',
                        backgroundColor: "#0071c1",
                        data: [0, 45.45, 9.09, 385.07, 192.51, 2.94, 9.17, 0],
                    }, {
                        label: 'Revenue',
                        backgroundColor: "#92d14f",
                        data: [790.73, 745.28, 736.19, 351.12, 158.61, 155.67, 146.50, 146.50],
                    }],
                },
                options: {
                    tooltips: {
                        displayColors: true,
                        callbacks: {
                            mode: 'x',
                        },
                    },
                    scales: {
                        xAxes: [{
                            stacked: true,
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            stacked: true,
                            ticks: {
                                beginAtZero: true,
                            },
                            type: 'linear',
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom'
                    },
                }
            });
        }

        function renderVerticalWiseRevenueBreakUpChart() {
            var ctx = document.getElementById("verticalWiseRevenueBreakUpChartCanvasId");
            var chart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["SaaS/PaaS_D", "Cust_D", "Enrollment", "PEC and Kiosk Maint", "HTS AMC", "HTS Hardware","Consultaion","SaaS/PaaS_E","Cust_E"],
                    datasets: [{
                            type: "bar",
                            backgroundColor: "rgba(54, 162, 235, 0.2)",
                            borderColor: "rgba(54, 162, 235, 1)",
                            borderWidth: 1,
                            label: "Revenue",
                            data: [323.18, 131.16, 1.76, 40.05, 14.30, 6.81,6.00,241.36,0]
                        },
                        {
                            type: "line",
                            label: "Revenue",
                            borderColor: "#6610f2",
                            borderWidth: 2,
                            data: [323.18, 131.16, 1.76, 40.05, 14.30, 6.81,6.00,241.36,0],
                            lineTension: 0,
                            fill: false
                        }
                    ]
                }
            });
        }

        function renderSalesPastChart() {
            var ctx = document.getElementById("salesPastChartCanvasId");
            var chart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: ["April","May","June","July","August","September"],
                    datasets: [{
                        type: "line",
                        label: "Sales",
                        borderColor: "rgba(54, 162, 235, 1)",
                        borderWidth: 2,
                        data: [36, 127, 37, 70, 36, 37],
                        lineTension: 0,
                        fill: false
                    }]
                }
            });
        }

        function renderAdminExpensesYTDChart() {
            var ctx = document.getElementById("adminExpensesYTDChartCanvasId");
            var chart = new Chart(ctx, {
                type: "doughnut",
                data: {
                    labels: ["Prof & Consul", "Office and Estbl", "Travel & Conv", "Repair & Main", "Other Admin"],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [111.82, 20.95, 4.21, 25.05, 30.48],
                        backgroundColor: [
                            `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`,
                            `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`,
                            `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`,
                            `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`,
                            `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`
                        ],
                        hoverOffset: 4
                    }]
                }
            });
        }

        renderFinancialsKeyHighlightsChart();
        renderVerticalWiseRevenueBreakUpChart();
        renderSalesPastChart();
        renderAdminExpensesYTDChart();
    });
</script>