<?php
session_start();
require_once("../koneksi/db.php");
//Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
}

$getId = $_GET['id_pinjaman'];
//$detail1 untuk menentukan jumlah angs_pokok, angs_bunga, jml_angs
$detail = mysqli_query($conn, "SELECT p.id_pinjaman, (p.pokok_pinjaman / p.tenor) AS angs_pokok,p.nilai_bunga as angs_bunga, (p.pokok_pinjaman / p.tenor) + p.nilai_bunga as jml_angs from pinjaman p where p.id_pinjaman = " . $getId . " AND p.status = 1");
$result = mysqli_fetch_assoc($detail);

//$detail2 untuk mengetahui sisa_angs_pokok
$detail2 = mysqli_query($conn, "SELECT a.id_anggota, (p.pokok_pinjaman - SUM(a.angsuran_pokok)) AS sisa_angs_pokok FROM pinjaman p LEFT JOIN angsuran_pinjaman a ON p.id_anggota = a.id_anggota WHERE p.id_pinjaman =" . $getId . " AND p.status = 1");
$result2 = mysqli_fetch_assoc($detail2);

// var_dump($result['wajib_pinjaman']);
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
    <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .buttons-excel {
        background: red
    }
    </style>

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
                        <h1 class="h3 mb-0 text-gray-800" style="text-align: center;color: #000">Angsuran Pinjaman</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow h-100 py-2" style="background-color: #2A2024;">
                                <div class="card-body" style="border-radius: 20px;">
                                    <form action="" method="POST" role="form text-left" enctype="multipart/form-data">
                                        <input type="hidden" name="id_pinjaman" class="form-control" required readonly
                                            value="<?= $result['id_pinjaman']; ?>">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #fff">Nama Anggota</label>
                                                <?php
                                                    $anggota = mysqli_query($conn, "SELECT pinjaman.id_anggota, anggota.id_anggota, anggota.nama_anggota FROM pinjaman INNER JOIN anggota ON pinjaman.id_anggota = anggota.id_anggota where pinjaman.id_pinjaman = " . $result['id_pinjaman']);
                                                    while ($r = mysqli_fetch_assoc($anggota)) { 
                                                        ?>
                                                <input type="hidden" name="id_anggota" class="form-control" required
                                                    readonly value="<?= $r['id_anggota']; ?>">
                                                <input type="text" name="" class="form-control" required readonly
                                                    value="<?= $r['nama_anggota']; ?>">
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tanggal" require class="col-form-label"
                                                    style="color: #fff">Tanggal Bayar
                                                </label>
                                                <input type="date" name="tanggal_bayar" class="form-control" required
                                                value="<?php echo date("Y-m-d");?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="sisa_angsuran_pokok" style="color: #fff">Sisa Pokok Pinjaman</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control" required
                                                    placeholder="Sisa Pokok Pinjaman" name="sisa_pokok_pinjaman"
                                                    aria-describedby="basic-addon1"
                                                    value="<?= $result2['sisa_angs_pokok']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="angsuran_pokok" style="color: #fff">Angsuran Pokok</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control" required
                                                    placeholder="Angsuran Pokok" name="angsuran_pokok"
                                                    aria-describedby="basic-addon1"
                                                    value="<?= $result['angs_pokok']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="color: #fff">
                                            <label for="angsuran_bunga">Angsuran Bunga</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control"
                                                    placeholder="Angsuran Bunga" name="angsuran_bunga"
                                                    aria-describedby="basic-addon1"
                                                    value="<?= $result['angs_bunga'] ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="color: #fff">
                                            <label for="total_angsuran">Total Angsuran</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control"
                                                    placeholder="Total Angsuran" name="total_angsuran"
                                                    aria-describedby="basic-addon1"
                                                    value="<?= $result['jml_angs'] ?>">
                                            </div>
                                        </div>
                                        
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="tabel_pinjaman.php" class="btn btn-md mt-4 mb-4"
                                        style="background-color: #FFF500; color: #000; font-weight: bold; margin-right: 2%">Back</a>
                                    <button type="submit" name="updatePinjaman" class="btn btn-md mt-4 mb-4"
                                        style="background-color: #00913E; color: #fff; font-weight: bold; margin-right: 2%">Submit</button>
                                </div>
                            </div>

                            </form>
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
</body>

</html>
<?php 
if(isset($_POST['updatePinjaman']))
{   
    
    $id_pinjaman = $_POST['id_pinjaman'];
    $id_anggota = $_POST['id_anggota'];
    $tanggal_bayar = $_POST['tanggal_bayar'];
    $angsuran_pokok = $_POST['angsuran_pokok'];
    $jasa_pinjaman = $_POST['angsuran_bunga'];
    $total_angsuran = $_POST['total_angsuran'];
    $query = "INSERT INTO angsuran_pinjaman (`id_pinjaman`, `id_anggota`, `tanggal_bayar`, `angsuran_pokok`, `jasa_pinjaman`, `total_angsuran`) VALUES ('$id_pinjaman', '$id_anggota', '$tanggal_bayar', '$angsuran_pokok', '$jasa_pinjaman', '$total_angsuran')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo "<script type='text/javascript'>window.location.href='/koperasi/admin/tabel_pinjaman.php';</script>";
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
    
    
}
?>