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
                        <h1 class="h3 mb-0 " style="text-align: center; color: #000">Tambah Data Simpanan Baru</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow h-100 py-2" style="background-color: #2A2024;">
                                <div class="card-body" style="border-radius: 20px;">
                                    <form action="" method="POST" role="form text-left" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #fff">Nama Anggota</label>
                                                <select class="form-control" name="id_anggota" id="id"
                                                    aria-label="Default select example" required>
                                                    <option selected>Pilih Anggota</option>
                                                    <?php
                                                    // Kita akan ambil Nama Petugas yang ada pada tabel Petugas
                                                    $anggota = mysqli_query($conn, "SELECT * FROM anggota ");
                                                    while($r = mysqli_fetch_assoc($anggota)){ 
                                                    ?>
                                                    <option value="<?= $r['id_anggota']; ?>"
                                                        id="<?= $r['id_anggota']?>">
                                                        <?= $r['nama_anggota']; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tanggal" require class="col-form-label"
                                                    style="color: #fff">Tanggal Mulai
                                                </label>
                                                <input type="date" name="tanggal_mulai" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="pokok_simpanan" style="color: #fff">Simpanan Pokok</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control" required
                                                    placeholder="Input Simpanan Pokok" name="pokok_simpanan"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="wajib_simpanan" style="color: #fff">Simpanan Wajib</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control" required
                                                    placeholder="Input Simpanan Wajib" name="wajib_simpanan"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="color: #fff">
                                            <label for="sukarela_simpanan">Simpanan Sukarela</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control"
                                                    placeholder="Input Simpanan Sukarela" name="sukarela_simpanan"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="color: #fff">
                                            <label for="swp_simpanan">Simpanan Wajib Pinjaman</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control"
                                                    placeholder="Input Simpanan Wajib Pinjaman" name="swp_simpanan"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="tabel_simpanan.php" class="btn btn-md mt-4 mb-4"
                                        style="background-color: #FFF500; color: #000; font-weight: bold; margin-right: 2%">Back</a>
                                    <button type="submit" name="tambahSimpanan" class="btn btn-md mt-4 mb-4"
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
if(isset($_POST['tambahSimpanan']))
{   
    
    $id_anggota = $_POST['id_anggota'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $pokok_simpanan = $_POST['pokok_simpanan'];
    $wajib_simpanan = $_POST['wajib_simpanan'];
    $sukarela_simpanan = $_POST['sukarela_simpanan'] ? $_POST['sukarela_simpanan'] : 0;
    $swp_simpanan = $_POST['swp_simpanan'] ? $_POST['swp_simpanan'] : 0;

    mysqli_begin_transaction($conn);

    try {
        // Insert data ke tabel simpanan
        $query1 ="INSERT INTO simpanan (`id_anggota`,
        `tanggal_mulai`,`pokok_simpanan`,`wajib_simpanan`,`sukarela_simpanan`,`swp_simpanan`) VALUES ('$id_anggota',
        '$tanggal_mulai', '$pokok_simpanan','$wajib_simpanan', '$sukarela_simpanan', '$swp_simpanan')";
        mysqli_query($conn, $query1);

        // Mendapatkan id_simpanan yang baru saja di-insert
        $id_simpanan = mysqli_insert_id($conn);

        // Insert data ke tabel angsuran_simpanan
        $query2 = "INSERT INTO angsuran_simpanan (`id_simpanan`, `id_anggota`, `tanggal_bayar`, `angsuran_wajib`, `angsuran_sukarela`, `angsuran_swp`) VALUES ('$id_simpanan', '$id_anggota', '$tanggal_mulai', '$wajib_simpanan', '$sukarela_simpanan', '$swp_simpanan')";
        mysqli_query($conn, $query2);

        // Commit transaksi jika tidak ada kesalahan
        mysqli_commit($conn);

        echo "<script type='text/javascript'>window.location.href='/koperasi/admin/tabel_simpanan.php';</script>";
    } catch (Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        mysqli_rollback($conn);

        echo "<script>alert('" . $e->getMessage() . "');</script>";
}




// $query = "INSERT INTO simpanan (`id_anggota`,
// `tanggal_mulai`,`pokok_simpanan`,`wajib_simpanan`,`sukarela_simpanan`,`swp_simpanan`) VALUES ('$id_anggota',
// '$tanggal_mulai', '$pokok_simpanan','$wajib_simpanan', '$sukarela_simpanan', '$swp_simpanan')";
// $query_run = mysqli_query($conn, $query);

// if($query_run)
// {
// echo "<script type='text/javascript'>
// window.location.href = '/koperasi/admin/tabel_simpanan.php';
// </script>";
// }
// else
// {
// echo '<script>
// alert("Data Not Saved");
// </script>';
// }


}
?>