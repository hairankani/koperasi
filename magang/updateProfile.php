<?php
session_start();
require_once("../koneksi/db.php");
//Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['username'])){
    header("location: login-admin.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
}

$getId = $_SESSION['id'];
$magang = mysqli_query($conn, "SELECT magang.*, users.username  from magang inner join users on magang.userId = users.id where magang.userId = $getId");
$get = mysqli_fetch_assoc($magang);
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
    </style>

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
                        <h1 class="h3 mb-0 text-gray-800" style="text-align: center;">Update Your Profile!</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow h-100 py-2" style="background-color: #A5C9CA;">
                                <div class="card-body" style="border-radius: 20px;">
                                    <form action="" method="POST" role="form text-left" enctype="multipart/form-data">
                                        <input type="hidden" name="id" class="form-control" value="<?= $get['id'] ?>">
                                        <input type="hidden" name="startIntern" class="form-control"
                                            value="<?= $get['startIntern'] ?>">
                                        <input type="hidden" name="endIntern" class="form-control"
                                            value="<?= $get['endIntern'] ?>">
                                        <input type="hidden" name="password" class="form-control"
                                            value="<?= $get['password'] ?>">
                                        <input type="hidden" name="userId" class="form-control"
                                            value="<?= $get['userId'] ?>">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="username" class="col-form-label"
                                                    style="color: #16161a">Username
                                                </label>
                                                <input type="text" name="username" required class="form-control"
                                                    value="<?= $get['username'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama" class="col-form-label"
                                                    style="color: #16161a">Name</label>
                                                <input type="text" name="nama_magang" required class="form-control"
                                                    value="<?= $get['nama_magang'] ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="instansi" class="col-form-label"
                                                    style="color: #16161a">Agency
                                                </label>
                                                <input type="text" name="instansi" required class="form-control"
                                                    value="<?= $get['instansi'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email" class="col-form-label" style="color: #16161a">Email
                                                </label>
                                                <input type="email" name="email" required class="form-control"
                                                    value="<?= $get['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="alamat" class="col-form-label" required
                                                    style="color: #16161a">Address
                                                </label>
                                                <textarea class="form-control" name="alamat"
                                                    rows="3"><?= $get['alamat'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nohp" class="col-form-label" style="color: #16161a">Phone
                                                    Number
                                                </label>
                                                <input type="number" name="nohp" required class="form-control"
                                                    value="<?= $get['nohp'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Gender : </label>
                                                <label><input type="radio" name="jeniskelamin" value="Laki-Laki"
                                                        <?php if($get['jeniskelamin']=='Laki-Laki'){?> checked="checked" <?php
                                                        }?>>
                                                    Male</label>
                                                <label><input type="radio" name="jeniskelamin" value="Perempuan"
                                                        <?php if($get['jeniskelamin']=='Perempuan'){?>checked="checked" <?php
                                                        }?>>
                                                    Female</label>
                                            </div>
                                        </div>


                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="index-magang.php" class="btn mt-4 mb-4"
                                        style="background-color: #D4C9D9; font-weight: bold; margin-right: 2%">Back</a>
                                    <button type="submit" name="updateprofile" class="btn btn-md mt-4 mb-4"
                                        style="background-color: #F0C2A6; font-weight: bold; margin-right: 2%">Submit</button>
                                </div>
                                </form>
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

    <?php include('script-intern.php') ?>
</body>

</html>
<?php 
if(isset($_POST['updateprofile']))
{   
    
    $id = $_POST['id'];
    $nama_magang = $_POST['nama_magang'];
    $instansi = $_POST['instansi'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $startIntern = $_POST['startIntern'];
    $endIntern = $_POST['endIntern'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userId = $_POST['userId'];
    $namaFile = $_FILES['image']['name'];
    // $namaSementara = $_FILES['image']['tmp_name'];
    // $folder = "img/" . $namaFile;
    // $terupload = move_uploaded_file($namaSementara, $folder);

    if ($namaFile == null) {
        $namaFile = $_POST['oldimage'];
    } else {
        if (strlen($namaFile)>0) {
            //upload Photo
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                move_uploaded_file ($_FILES['image']['tmp_name'], "../img/".$namaFile);
            }
        } 
    }
    

    $query = "UPDATE magang SET nama_magang='$nama_magang', instansi='$instansi', email='$email', alamat='$alamat', nohp='$nohp', jeniskelamin='$jeniskelamin', startIntern='$startIntern', endIntern='$endIntern', username='$username', password='$password', userId='$userId', image='$namaFile' where magang.id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $setUser = "UPDATE users set username='$username' where users.id = '$userId'";
        mysqli_query($conn, $setUser);
        echo "<script>
        document.location='profile.php'
        </script>";
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
?>