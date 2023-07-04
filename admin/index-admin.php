<?php
session_start();
require_once("../koneksi/db.php");
//Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['username'])){
    header("location: index.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/score.png">

    <title>Koperasi</title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('sidebar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('topbar.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm shadow-sm"
                            style="background-color: #ECB390;"><i class="fas fa-download fa-sm text-white-50"></i>
                            Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="background-color: #FCF600;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Data Anggota</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $anggota = mysqli_query($conn,"SELECT * FROM anggota");
                                                    $jumlahAnggota = mysqli_num_rows($anggota);
                                                ?>
                                                <?php echo "$jumlahAnggota" ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="background-color: #FCF600;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Total Pinjaman</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $pinjaman = mysqli_query($conn,"SELECT SUM(pokok_pinjaman) AS totalPinjaman FROM pinjaman");
                                                    $totalPinjamanPokok = mysqli_fetch_assoc($pinjaman);
                                                    $totalPinjaman = $totalPinjamanPokok['totalPinjaman'];
                                                ?>
                                                <?= $totalPinjaman ? "Rp. " . number_format($totalPinjaman, 0, ',', '.') : 0 ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="background-color: #FCF600    ;">
                                <div class="card-body" style="border-radius: 20px;">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Total Simpanan</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php
                                                            $simpanan = mysqli_query($conn,"SELECT SUM(angsuran_wajib) + SUM(angsuran_sukarela) + SUM(angsuran_swp) AS totalSimpanan FROM angsuran_simpanan");
                                                            $totalAngsuran = mysqli_fetch_assoc($simpanan);
                                                            $pokok = mysqli_query($conn,"SELECT SUM(pokok_simpanan) AS totalPokok FROM simpanan");
                                                            $totalPokok = mysqli_fetch_assoc($pokok);
                                                            $totalSimpanan = $totalAngsuran['totalSimpanan'] + $totalPokok['totalPokok'];

                                                        ?>
                                                        <?= $totalSimpanan ? "Rp. " . number_format($totalSimpanan, 0, ',', '.') : 0  ?>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <!-- <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-12">
                            <div class="card shadow h-100 py-2" style="background-color: #A5C9CA;">
                                <div class="card-body" style="border-radius: 20px;">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-4">
                                            <img src="../img/koalaremove.png" alt="">
                                        </div>
                                        <div class="col-lg-8" style="color: #ffff;">
                                            <h3><b>Hi, <?= $username; ?>!</h5></b>
                                                <h4>If the intern has finished carrying out of the
                                                    internship in accordance with specified time span,
                                                    please rate it in the <u><a href="internvalue.php"
                                                            style="color: #fff">Intern
                                                            Value!</a></u></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->






                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <?php include('footer.php') ?>

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Are you sure want to Logout?😟</div>
                    <div class="modal-footer">
                        <button class="btn" style="background-color: #D4C9D9; font-weight: bold;" type="button"
                            data-dismiss="modal">Cancel</button>
                        <a class="btn" style="background-color: #F0C2A6; font-weight: bold;"
                            href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <?php include('script-admin.php') ?>
</body>

</html>