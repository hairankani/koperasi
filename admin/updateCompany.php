<?php
session_start();
require_once("../koneksi/db.php");
//Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['username'])){
    header("location: ../admin/login-admin.php");
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
                        <h1 class="h3 mb-0 text-gray-800" style="text-align: center;">Edit Profile</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm shadow-sm"
                            style="background-color: #ECB390;"><i class="fas fa-download fa-sm text-white-50"></i>
                            Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow h-100 py-2" style="background-color: #A5C9CA;">
                                <div class="card-body" style="border-radius: 20px;">
                                    <form action="" method="POST" role="form text-left" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama" class="col-form-label" style="color: #16161a">Nama
                                                    Perusahaan</label>
                                                <input type="text" name="nama_perusahaan" class="form-control"
                                                    placeholder="Add Nama Perusahaan">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="jenis" class="col-form-label" style="color: #16161a">Jenis
                                                    Perusahaan</label>
                                                <input type="text" name="jenis_perusahaan" class="form-control"
                                                    placeholder="Add Jenis Perusahaan">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tentang" class="col-form-label"
                                                    style="color: #16161a">Tentang
                                                    Perusahaan</label>
                                                <textarea class="form-control" name="tentang"
                                                    placeholder="Add Tentang Perusahaan" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="alamat" class="col-form-label" style="color: #16161a">Alamat
                                                    Perusahaan</label>
                                                <textarea class="form-control" name="alamat"
                                                    placeholder="Add Alamat Perusahaan" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nohp" class="col-form-label" style="color: #16161a">Nomor HP
                                                    Perusahaan</label>
                                                <input type="number" name="nohp" class="form-control"
                                                    placeholder="Add NO HP Perusahaan">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email" class="col-form-label" style="color: #16161a">Email
                                                    Perusahaan</label>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Add Email Perusahaan">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="website" class="col-form-label"
                                                    style="color: #16161a">Website
                                                    Perusahaan</label>
                                                <input type="text" name="website" class="form-control"
                                                    placeholder="Add Website Perusahaan">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="website" class="col-form-label"
                                                    style="color: #16161a">Social Media
                                                    Perusahaan</label>
                                                <input type="text" name="sosmed" class="form-control"
                                                    placeholder="Add Social Media Perusahaan">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="image" class="col-form-label" style="color: #16161a">Logo
                                                    Perusahaan</label>
                                                <input class="form-control" type="file" name="image" id="image">
                                            </div>
                                        </div>

                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="index-admin.php" class="btn btn-md btn-secondary text-light mt-4 mb-4"
                                        style="font-weight: bold;margin-right: 2%">Back</a>
                                    <button type="submit" name="insertcompany" class="btn btn-md mt-4 mb-4"
                                        style="background: #c9bbcf;color: #16161a ;margin-right: 2%">Submit</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php include('script-admin.php') ?>
</body>

</html>
<?php 
if(isset($_POST['insertcompany']))
{
  
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $jenis_perusahaan = $_POST['jenis_perusahaan'];
    $tentang = $_POST['tentang'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $sosmed = $_POST['sosmed'];
    $namaFile = $_FILES['image']['name'];
    // $namaSementara = $_FILES['image']['tmp_name'];
    // $folder = "img/" . $namaFile;
    // $terupload = move_uploaded_file($namaSementara, $folder);
    if (strlen($namaFile)>0) {
        //upload Photo
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            move_uploaded_file ($_FILES['image']['tmp_name'], "../img/".$namaFile);
        }
    }

    $query = "INSERT INTO company (`nama_perusahaan`, `jenis_perusahaan`,`tentang`,`alamat`,`nohp`,`email`,`website`,`sosmed`, `image`) VALUES ('$nama_perusahaan', '$jenis_perusahaan', '$tentang','$alamat', '$nohp', '$email', '$website', '$sosmed' ,'$namaFile')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo "<script type='text/javascript'>window.location.href='/spkj/admin/company.php';</script>";
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
?>