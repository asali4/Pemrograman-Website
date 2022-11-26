<?php
include 'head.php';
?>

<div class="col-md-10">
    <h3><b>Dashboard</b></h3>
</div>
<br />

<!-- Pie Chart Card -->
<div class="col-lg">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Chart <span>/Item On Stock</span></h5>

            <!-- Pie Chart -->
            <div id="pieChart"></div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#pieChart"), {
                        series: [
                            <?php
                            $makanan = mysqli_query($conn, "select * from item where jenis='makanan'");
                            echo mysqli_num_rows($makanan);
                            ?>,
                            <?php
                            $minuman = mysqli_query($conn, "select * from item where jenis='minuman'");
                            echo mysqli_num_rows($minuman);
                            ?>
                        ],
                        chart: {
                            height: 350,
                            type: 'pie',
                            toolbar: {
                                show: true
                            }
                        },
                        labels: ["Makanan", "Minuman"]
                    }).render();
                });
            </script>
            <!-- End Pie Chart -->

        </div>
    </div>
</div>
<!-- End Pie Chart Card -->




<?php
include 'footer.php';
?>