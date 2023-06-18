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
$getId = $_GET['id_anggota'];
$detail = mysqli_query($conn, "SELECT * from anggota where id_anggota = " . $getId);
$result = mysqli_fetch_assoc($detail);
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
                        <h1 class="h3 mb-0 text-gray-800" style="text-align: center;color: #000">Data Anggota</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow h-100 py-2" style="background-color: #2A2024;">
                                <div class="card-body" style="border-radius: 20px;">
                                    <form action="" method="POST" role="form text-left" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #fff">Nomor Anggota</label>
                                                <input type="text" name="id_anggota" class="form-control" required
                                                    value="<?= $result['id_anggota']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #fff">Nama Anggota</label>
                                                <input type="text" name="nama_anggota" class="form-control" required
                                                    value="<?= $result['nama_anggota']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="alamat" require class="col-form-label"
                                                    style="color: #fff">Alamat
                                                </label>
                                                <textarea name="alamat" id="" cols="30" rows="10" class="form-control"
                                                    required><?php echo $result['alamat'];?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="no_hp" style="color: #fff">Nomor Handphone</label>
                                                <input type="number" name="no_hp" class="form-control" required
                                                    value="<?= $result['no_hp']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="jk" style="color: #fff">Jenis Kelamin</label>
                                                <select class="form-control" name="jk" id="id"
                                                    aria-label="Default select example" required>
                                                    <option value="Laki-Laki"
                                                        <?php echo ($result['jk'] == 'Laki-Laki') ? 'selected' : ''; ?>>
                                                        Laki-Laki</option>
                                                    <option value="Perempuan"
                                                        <?php echo ($result['jk'] == 'Perempuan') ? 'selected' : ''; ?>>
                                                        Perempuan</option>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="color: #fff">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir" class="form-control" required
                                                    value="<?= $result['tanggal_lahir']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="color: #fff">
                                            <div class="form-group">
                                                <label for="tanggal_bergabung">Tanggal Bergabung</label>
                                                <input type="date" name="tanggal_bergabung" class="form-control"
                                                    required value="<?= $result['tanggal_bergabung']; ?>">
                                                </diuv>
                                            </div>
                                        </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="tabel_simpanan.php" class="btn btn-md mt-4 mb-4"
                                        style="background-color: #FFF500; color: #000; font-weight: bold; margin-right: 2%">Back</a>
                                    <button type="submit" name="updateAnggota" class="btn btn-md mt-4 mb-4"
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
if(isset($_POST['updateAnggota']))
{   
    
    $id_anggota = $_POST['id_anggota'];
    $nama_anggota = $_POST['nama_anggota'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $jk = $_POST['jk'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tanggal_bergabung = $_POST['tanggal_bergabung'];
    $query = "UPDATE anggota set nama_anggota='$nama_anggota', alamat='$alamat', no_hp='$no_hp', jk='$jk', tanggal_lahir='$tanggal_lahir', tanggal_bergabung='$tanggal_bergabung' WHERE id_anggota='$id_anggota' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION["sukses"] = 'Data Anggota Berhasil Diubah';
        echo "<script type='text/javascript'>window.location.href='/koperasi/admin/tabel_anggota.php';</script>";
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
    
    
}
?>