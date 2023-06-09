<?php
require_once("../koneksi/require.php");
$id = $_GET['id'];

    
    $detail = mysqli_query($conn, "SELECT nilai.id, nilai.rata_rata, nilai.predikat, magang.nama_magang, magang.instansi, detailnilai.* from magang inner join nilai on magang.id = nilai.idMagang inner join detailnilai on nilai.id = detailnilai.idNilai where detailnilai.id = $id");
    $result = mysqli_fetch_assoc($detail);


$kriteria = mysqli_query($conn, "SELECT kriteria FROM kriteria");
$resultKriteria = mysqli_fetch_all($kriteria);
$no=1;

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="../img/score.png">

    <title>Detail Intern Value</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">


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

                    <h1 class="mt-5 text-center">Detail Intern Value</h1>
                    </br>

                    <!-- //add intern -->
                    <div class="row">
                        <div class="col-lg-2">
                            <p><a href="internvalue.php" type="button" class="btn"
                                    style="background-color: #D4C9D9; font-weight: bold;">Back</a>

                            </p>
                        </div>
                        <div class="col-lg-2" style="margin-left: -10%">

                            <p><a href="certificate1.php?id=<?= $result['id']; ?>" target="_blank" type="button"
                                    class="btn" style="background-color: #F0C2A6; font-weight: bold;">Certificate</a>

                            </p>
                        </div>
                    </div>





                    <div class="card mb-3" style="width: 18rem;">

                        <div class="card-body">
                            <h4>Detail Intern Data</h4>
                            <table cellpadding="5" class="biodata" id="biodata">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td class="text-uppercase"><?= $result['nama_magang']; ?></td>
                                </tr>
                                <tr>
                                    <td>Agency</td>
                                    <td>:</td>
                                    <td><?= $result['instansi']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- //table intern -->
                    <div class="row">
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
                                    <td colspan="2" class="text-center">Average</td>
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
                    <a class="btn" style="background-color: #F0C2A6; font-weight: bold;" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php include('script-admin.php') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script>
    $(document).ready(function() {

    $('#tableValue').DataTable({
    dom: 'Bfrtip',
    buttons: [
        
        {
            extend: 'pdfHtml5',
             title: 'Nilai Magang Hasil Praktek Kerja Lapangan PT. Visi Karya Prakarsa',
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
            }
        },
    ],
    buttons: ['pdf'],

        });

    });
    </script>

</body>

</html>