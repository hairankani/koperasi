<?php
require_once("../koneksi/require.php");
$id_anggota = $_GET['id_anggota'];

    
    $detail = mysqli_query($conn, "SELECT simpanan.*, anggota.* FROM simpanan left JOIN anggota ON simpanan.id_anggota = anggota.id_anggota where anggota.id_anggota = " . $id_anggota);

    $result = mysqli_fetch_assoc($detail);
    if ($result == null) {
        $detail = mysqli_query($conn, "SELECT * FROM anggota WHERE anggota.id_anggota = " . $id_anggota);
        $result = mysqli_fetch_assoc($detail);
    } else {
        
    }


    $detail ="SELECT angsuran_simpanan.*, anggota.id_anggota 
    FROM angsuran_simpanan 
    LEFT JOIN anggota ON angsuran_simpanan.id_anggota = anggota.id_anggota 
    WHERE anggota.id_anggota = " . $id_anggota;
    $resultdetail = mysqli_query($conn, $detail);

// var_dump($detail);


    $detail2 = "SELECT 'pencairan' as keterangan,tanggal_pinjaman AS tanggal,pokok_pinjaman AS pencairan,0 AS angsuran 
    FROM pinjaman WHERE id_anggota= $id_anggota
    UNION 
    SELECT 'angsuran' as keterangan,tanggal_bayar AS tanggal,0 as pencairan,angsuran_pokok AS angsuran 
    FROM angsuran_pinjaman WHERE id_anggota=". $id_anggota;
    $resultdetail2 = mysqli_query($conn, $detail2);
    
// while($data=mysqli_fetch_array($resultdetail2)){
//     echo 'Hasil '. date_format(date_create($data[1]),"d/m/Y") ;
// }

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

                    <h1 class="mt-5 text-center" style="color: #000">Report Anggota</h1>
                    </br>

                    <!-- //add intern -->
                    <div class="row">
                        <div class="col-lg-2">
                            <p><a onclick="history.back(-1)" type="button" class="btn"
                                    style="background-color: #FFF402; font-weight: bold; color: #000">Back</a>

                            </p>
                        </div>

                    </div>





                    <div class="card mb-3" style="width: 100%; border-color: #FFF402">

                        <div class="card-body">
                            <h4 style="color: #000;">Data anggota</h4>
                            <table cellpadding="5" class="biodata" id="biodata">
                                <tr>
                                    <td style="color: #000;">Nama</td>
                                    <td style="color: #000;">:</td>
                                    <td style="color: #000;"><?= $result['nama_anggota']; ?></td>
                                </tr>
                                <tr>
                                    <td style="color: #000;">Tanggal Bergabung</td>
                                    <td style="color: #000;">:</td>
                                    <td style="color: #000;">
                                        <?= date('d-m-Y', strtotime($result['tanggal_bergabung'])); ?></td>
                                </tr>
                                <tr>
                                    <td style="color: #000;">Alamat</td>
                                    <td style="color: #000;">:</td>
                                    <td style="color: #000;"><?= $result['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td style="color: #000;">No Handphone</td>
                                    <td style="color: #000;">:</td>
                                    <td style="color: #000;"><?= $result['no_hp']; ?></td>
                                </tr>
                                <tr>
                                    <td style="color: #000;">Jenis Kelamin</td>
                                    <td style="color: #000;">:</td>
                                    <td style="color: #000;"><?= $result['jk']; ?></td>
                                </tr>
                                <tr>
                                    <td style="color: #000;">Tanggal Lahir</td>
                                    <td style="color: #000;">:</td>
                                    <td style="color: #000;"><?= date('d-m-Y', strtotime($result['tanggal_lahir'])); ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- //table simpanan -->
                    <div class="tampilkanSimpanan" style="background: #FFF402;padding: 15px;border-radius: 15px;">
                        <h3 class="text-center" style="color: #000;">Histori Simpanan</h3>
                        <div class="row">
                            <table id="tableSimpanan" class="table table-hover" style="background: #fff" border="1">
                                <thead>
                                    <tr>
                                        <th style="color: #000;">Tanggal</th>
                                        <th style="color: #000;">Wajib</th>
                                        <th style="color: #000;">Sukarela</th>
                                        <th style="color: #000;">SWP</th>
                                    </tr>
                                </thead>
                                <tbody>
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

                                        <td style="color: #000;">
                                            <?= $r['tanggal_bayar'] ? date('d-m-Y', strtotime($r['tanggal_bayar'])) : '-' ; ?>
                                        </td>
                                        <td style="color: #000;">
                                            <?= $r['angsuran_wajib'] ? "Rp. " . number_format($r['angsuran_wajib'], 0, ',', '.') :"Rp. " . 0; ?>
                                        </td>
                                        <td style="color: #000;">
                                            <?= $r['angsuran_sukarela'] ? "Rp. " . number_format($r['angsuran_sukarela'], 0, ',', '.') : "Rp. " . 0; ?>
                                        </td>
                                        <td style="color: #000;">
                                            <?= $r['angsuran_swp'] ? "Rp. " . number_format($r['angsuran_swp'], 0, ',', '.') : "Rp. " . 0; ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="color: #000;">Pokok:
                                            <?= (isset($result['pokok_simpanan']) ? "Rp. " . number_format($result['pokok_simpanan'], 0, ',', '.') : "Rp. " . 0) ;  ?>
                                        </th>
                                        <th style="color: #000;">Total Wajib:
                                            <?= "Rp. " . number_format($totalWajib, 0, ',', '.'); ?>
                                        </th>
                                        <th style="color: #000;">Total Sukarela:
                                            <?= "Rp. " . number_format($totalSukarela, 0, ',', '.'); ?>
                                        </th>
                                        <th style="color: #000;">Total SWP:
                                            <?= "Rp. " . number_format($totalSwp, 0, ',', '.'); ?>
                                        </th>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <th colspan="2" class="text-right" style="color: #000;">Total Simpanan</th>
                                        <th style="color: #000;">
                                            <?php $totalSimpanan = (isset($result['pokok_simpanan']) ? $result['pokok_simpanan'] : 0) + $totalWajib + $totalSukarela + $totalSwp ?>
                                            <?= "Rp. " . number_format($totalSimpanan, 0, ',', '.') ?>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- table angsuran pinjaman -->
                    <!-- //table pinjaman -->
                    <br>
                    <div class="tampilkanPinjaman" style="background: #FFF402;padding: 15px;border-radius: 15px;">
                        <h3 class="text-center" style="color: #000;">Histori Pinjaman</h3>
                        <div class="row">
                            <table id="tablePinjaman" class="table table-hover" style="background: #fff" border="1">
                                <thead>
                                    <tr>
                                        <th style="color: #000;">Tanggal</th>
                                        <th style="color: #000;">Keterangan</th>
                                        <th style="color: #000;">Pencairan</th>
                                        <th style="color: #000;">Angsuran</th>
                                        <th style="color: #000;">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php 
                                    $pencairan = 0;
                                    $angsuran = 0;
                                    $saldo = 0;
                                    $no = 0;
                                    while ($r = mysqli_fetch_assoc($resultdetail2)) { 
                                        $pencairan = $r['pencairan']; 
                                        $angsuran = $r['angsuran']; 
                                        if($no = 0){
                                            $saldo = $pencairan;
                                            $no = $no+1;
                                        } else {
                                            $saldo = ($saldo + $pencairan) - $angsuran;
                                        }
                                        ?>
                                        <td style="color: #000;">
                                            <?= date_format(date_create($r['tanggal']),"d/m/Y") ?></td>
                                        <td style="color: #000;">
                                            <?= $r['keterangan'] ?></td>
                                        <td style="color: #000;">
                                            <?= $r['pencairan'] ? $r['pencairan'] : 0; ?></td>
                                        <td style="color: #000;">
                                            <?= $r['angsuran'] ? $r['angsuran'] : 0; ?></td>
                                        <td style="color: #000;">
                                            <?= $saldo; ?></td>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {

        $('#tableSimpanan').DataTable();
        $('#tablePinjaman').DataTable({
            order: [[1, 'desc']]
        });

    });
    </script>

</body>

</html>