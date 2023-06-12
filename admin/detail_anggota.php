<?php
require_once("../koneksi/require.php");
$id_anggota = $_GET['id_anggota'];

    
    $detail = mysqli_query($conn, "SELECT simpanan.*, anggota.* FROM simpanan left JOIN anggota ON simpanan.id_anggota = anggota.id_anggota where anggota.id_anggota = " . $id_anggota);
    $result = mysqli_fetch_assoc($detail);
    // var_dump($result);


$detail ="SELECT angsuran_simpanan.*, anggota.id_anggota 
FROM angsuran_simpanan 
LEFT JOIN anggota ON angsuran_simpanan.id_anggota = anggota.id_anggota 
WHERE anggota.id_anggota = " . $id_anggota;
$resultdetail = mysqli_query($conn, $detail);
// var_dump($resultdetail);
// $no=1;

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

    <title>Koperasi</title>
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

                    <h1 class="mt-5 text-center">Report Anggota</h1>
                    </br>

                    <!-- //add intern -->
                    <div class="row">
                        <div class="col-lg-2">
                            <p><a href="internvalue.php" type="button" class="btn"
                                    style="background-color: #D4C9D9; font-weight: bold;">Back</a>

                            </p>
                        </div>

                    </div>





                    <div class="card mb-3" style="width: 100%;">

                        <div class="card-body">
                            <h4>Data anggota</h4>
                            <table cellpadding="5" class="biodata" id="biodata">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td><?= $result['nama_anggota']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Bergabung</td>
                                    <td>:</td>
                                    <td><?= $result['tanggal_bergabung']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $result['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td>No Handphone</td>
                                    <td>:</td>
                                    <td><?= $result['no_hp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?= $result['jk']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= $result['ttl']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- //table intern -->
                    <div class="row">
                        <table id="tableValue" class="table table-hover" style="background: #fff" border="1">
                            <thead>
                                <tr>
                                    <th colspan="5" class="text-center">Simpanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Tanggal</th>

                                    <th>Wajib</th>
                                    <th>Sukarela</th>
                                    <th>SWP</th>
                                </tr>
                                <tr>
                                    <?php 
                                    $totalWajib = 0;
                                    $totalSukarela = 0;
                                    $totalSwp = 0;
                                    while ($r = mysqli_fetch_assoc($resultdetail)) { 
                                        $totalWajib += $r['angsuran_wajib']; 
                                        $totalSukarela += $r['angsuran_sukarela']; 
                                        $totalSwp += $r['angsuran_swp']; 
                                        ?>
                                    <td><?= $r['tanggal_bayar'] ; ?></td>
                                    <td><?= $r['angsuran_wajib']; ?></td>
                                    <td><?= $r['angsuran_sukarela']; ?></td>
                                    <td><?= $r['angsuran_swp']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Pokok: <?= $result['pokok_simpanan']; ?></th>
                                    <th>Total Wajib: <?= $totalWajib; ?></th>
                                    <th>Total Sukarela: <?= $totalSukarela; ?></th>
                                    <th>Total SWP: <?= $totalSwp; ?></th>
                                </tr>

                                <tr>
                                    <td></td>
                                    <th colspan="2" class="text-right">Total Simpanan</th>
                                    <th><?= $result['pokok_simpanan'] + $totalWajib + $totalSukarela + $totalSwp ?></th>
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


        });

    });
    </script>

</body>

</html>