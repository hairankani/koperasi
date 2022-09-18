<?php
session_start();
require_once("../koneksi/db.php");
//Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['username'])){
    header("location: ../magang/login-magang.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
}

$id = $_SESSION['id'];
// var_dump($id); die();
    
    $detail = mysqli_query($conn, "SELECT nilai.id, nilai.rata_rata, nilai.predikat, magang.nama_magang, magang.instansi, detailnilai.* from magang inner join nilai on magang.id = nilai.idMagang inner join detailnilai on nilai.id = detailnilai.idNilai where magang.userId = $id");
    $result = mysqli_fetch_assoc($detail);


$kriteria = mysqli_query($conn, "SELECT kriteria FROM kriteria");
$resultKriteria = mysqli_fetch_all($kriteria);
$no=1;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
                    <div class="align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="text-align: center;">View Grades</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm shadow-sm"
                            style="background-color: #ECB390;"><i class="fas fa-download fa-sm text-white-50"></i>
                            Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow h-100 py-2" style="background-color: #fff;">
                                <div class="card-body" style="border-radius: 20px;">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-lg-12">
                                            <div class="card mb-3 border-0" style="width: 18rem;">
                                                <div class="card-body">
                                                    <table cellpadding="5" class="biodata" id="biodata">
                                                        <tr style="font-size: 24px">
                                                            <td>Name</td>
                                                            <td>:</td>
                                                            <td class="text-uppercase"><?= $result['nama_magang']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr style="font-size: 24px">
                                                            <td>Agency</td>
                                                            <td>:</td>
                                                            <td><?= $result['instansi']; ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-lg-12">

                                            <table id="tableValue" class="table table-hover" style="background: #fff">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No. </th>
                                                        <th scope="col">Criteria</th>
                                                        <th scope="col">Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $resultKriteria[0][0]; ?></td>
                                                        <td><?= $result['nilai1']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $resultKriteria[1][0]; ?></td>
                                                        <td><?= $result['nilai2']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $resultKriteria[2][0]; ?></td>
                                                        <td><?= $result['nilai3']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $resultKriteria[3][0]; ?></td>
                                                        <td><?= $result['nilai4']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $resultKriteria[4][0]; ?></td>
                                                        <td><?= $result['nilai5']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $resultKriteria[5][0]; ?></td>
                                                        <td><?= $result['nilai6']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $resultKriteria[6][0]; ?></td>
                                                        <td><?= $result['nilai7']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $resultKriteria[7][0]; ?></td>
                                                        <td><?= $result['nilai8']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $resultKriteria[8][0]; ?></td>
                                                        <td><?= $result['nilai9']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $resultKriteria[9][0]; ?></td>
                                                        <td><?= $result['nilai10']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $resultKriteria[10][0]; ?></td>
                                                        <td><?= $result['nilai11']; ?></td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2" class="text-center">Average Value</td>
                                                        <td><?= $result['rata_rata']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="text-center">Predicate</td>
                                                        <td><?= $result['predikat']; ?></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>







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
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn" style="background-color: #D4C9D9; font-weight: bold;" type="button"
                            data-dismiss="modal">Cancel</button>
                        <a class="btn" style="background-color: #F0C2A6; font-weight: bold;"
                            href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <?php include('script-intern.php') ?>
</body>

</html>