<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    include 'cek.php';
    include 'config.php';
    ?>
    <title>ASSET ADMIN</title>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <div id="header" class="header fixed-top d-flex align-items-center" style="background-color :aliceblue; border:white 1px solid;margin:1px">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="../assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Asset Admin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="header-nav ms-auto">
            <div class="d-flex align-items-center">

                <div class="nav navbar-nav">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="modal" data-bs-target="#modalPesan">
                        <i class="bi bi-bell-fill"></i>
                        <span class="badge bg-danger badge-number">
                            <?php
                            $periksa = $conn->query("SELECT COUNT(*) from item where jumlah < 5");
                            $q = mysqli_result($periksa, 0);
                            echo number_format($q);
                            ?>
                        </span>
                    </a>
                </div>
                <!-- End Notification Nav -->

                <!--  -->
                <div class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

                        <?php echo $_SESSION['uname'] ?>

                        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                    </a><!-- End Profile Iamge Icon -->

                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <div class="dropdown-header">
                            <?php
                            $user = $_SESSION['uname'];
                            $fo = $conn->query("select foto from admin where uname='$user'");
                            while ($f = mysqli_fetch_array($fo)) {
                            ?>

                                <div class="col-xs-6 col-md-12">
                                    <a class="thumbnail">
                                        <img class="img-fluid img-thumbnail" src="foto/<?php echo $f['foto']; ?>">
                                    </a>
                                </div>
                            <?php
                            }
                            ?>

                        </div>

                        <div>
                            <hr class="dropdown-divider">
                        </div>

                        <div>
                            <a class="dropdown-item d-flex align-items-center" href="ganti_foto.php">
                                <i class="bi bi-person"></i>
                                <span>Ganti Foto</span>
                            </a>
                        </div>
                        <div>
                            <hr class="dropdown-divider">
                        </div>

                        <div>
                            <a class="dropdown-item d-flex align-items-center" href="ganti_pass.php">
                                <i class="bi bi-key"></i>
                                <span>Ganti Password</span>
                            </a>
                        </div>
                        <div>
                            <hr class="dropdown-divider">
                        </div>

                        <div>
                            <a class="dropdown-item d-flex align-items-center" href="logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Log Out</span>
                            </a>
                        </div>

                    </div><!-- End Profile Dropdown Items -->
                </div><!-- End Profile Nav -->

            </div>
        </div><!-- End Icons Navigation -->
    </div><!-- End Header -->


    <!-- ======= Sidebar ======= -->
    <div id="sidebar" class="sidebar" style="background-color:white;border:aliceblue 1px solid;margin:1px">

        <div class="sidebar-nav" id="sidebar-nav">

            <div class="nav-item">
                <a class="nav-link " href="dashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </div><!-- End Dashboard Nav -->

            <div class="nav-item">
                <a class="nav-link " href="item.php">
                    <i class="bi bi-grid"></i>
                    <span>Data Item</span>
                </a>
            </div><!-- End Stok item Nav -->

            <div class="nav-item">
                <a class="nav-link " href="item_out.php">
                    <i class="bi bi-grid"></i>
                    <span>Data Item Keluar</span>
                </a>
            </div><!-- End Item Keluar Nav -->

        </div>
    </div><!-- End Sidebar-->


    <!-- ======= Modal Pesan ======= -->
    <div id="modalPesan" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pesan Notifikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $periksa = $conn->query("select * from item where jumlah < 5");
                    while ($q = mysqli_fetch_array($periksa)) {
                        if ($q['jumlah'] <= 5) {
                            echo "<div style='padding:5px' class='alert alert-warning'><span class='bi bi-info-square'></span> Stok <a style='color:red'>" . $q['nama'] . "</a> sudah kurang dari 5. Silahkan re-stock ulang !!</div>";
                        }
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal pesan -->

    <div id="main" class="main">