<?php
session_start();
require_once("../koneksi/db.php");
//Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['username'])){
    header("location: login-admin.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $username = $_SESSION['username'];
}
$company = mysqli_query($conn, 'SELECT * FROM company');
$get = mysqli_fetch_assoc($company);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>SP - Internship</title>

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
                    <div class=" align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="text-align: center">Company Profile</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm shadow-sm"
                            style="background-color: #ECB390;"><i class="fas fa-download fa-sm text-white-50"></i>
                            Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php
                            $sql = mysqli_query($conn, "SELECT * FROM company");
                            $no = 1;
                            while ($r = mysqli_fetch_assoc($sql)) {
                            ?>
                        <div class="col-lg-12 align-items-center text-center"
                            style="background: #fff;border-radius: 15px;height: 165px;border: 3px solid #A5C9CA; position: relative; z-index: 1">
                            <!-- <div class="card"
                                    style="width: 25%; margin: auto; border-color: #000; margin-top: 15px;"> -->
                            <!-- <div class="card-body"> -->
                            <img src="../img/<?= $r['image']?>" alt="" style="margin-top: 10px;">
                            <!-- </div> -->
                            <!-- </div> -->
                        </div>
                        <div class="col-lg-12"
                            style="background: #fff;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;border: 3px solid #A5C9CA; margin-top: -10px">
                            <div class="ml-5 mt-3">
                                <h1 class="fw-bold text-uppercase">
                                    <?= $r['nama_perusahaan']?></h1>
                                <h2>
                                    <?= $r['jenis_perusahaan']?></h2>
                                <h2 class="fw-bold" style="margin-top: 5%">About</h2>
                                <h3>
                                    <?= $r['tentang']?></h3>
                                <h3 class="fw-bold" style="margin-top: 8%;"><?= $r['alamat']?></h3>
                                <h3 class="fw-bold"><?= $r['nohp']?></h3>
                                <h3 class="fw-bold"><a href="<?= $r['website']?>"
                                        target="_blank"><?= $r['website']?></a></h3>
                            </div>

                        </div>
                        <?php } ?>




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
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <?php include('script-intern.php') ?>
</body>

</html>