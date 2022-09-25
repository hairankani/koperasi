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
$detail = mysqli_query($conn, "SELECT company.* from company inner join users on company.userId = users.id where company.userId = $getId");
$result = mysqli_fetch_assoc($detail);   
// var_dump($result['image']); die();
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
                        <h1 class="h3 mb-0 text-gray-800" style="text-align: center;">Update Company Profile</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow h-100 py-2" style="background-color: #A5C9CA;">
                                <div class="card-body" style="border-radius: 20px;">
                                    <form action="" method="POST" role="form text-left" enctype="multipart/form-data">
                                        <input type="hidden" name="id" class="form-control"
                                            value="<?= $result['id'] ?>">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama" class="col-form-label" style="color: #16161a">Company
                                                    Name</label>
                                                <input type="text" name="nama_perusahaan" class="form-control"
                                                    value="<?= $result['nama_perusahaan'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="jenis" class="col-form-label" style="color: #16161a">Type Of
                                                    Company</label>
                                                <input type="text" name="jenis_perusahaan" class="form-control"
                                                    value="<?= $result['jenis_perusahaan'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tentang" class="col-form-label" style="color: #16161a">About
                                                    Company</label>
                                                <textarea class="form-control" name="tentang"
                                                    rows="3"><?= $result['tentang'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="alamat" class="col-form-label"
                                                    style="color: #16161a">Company's Address</label>
                                                <textarea class="form-control" name="alamat"
                                                    placeholder="Add Alamat Perusahaan"
                                                    rows="3"><?= $result['alamat'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nohp" class="col-form-label" style="color: #16161a">Company
                                                    Phone Number</label>
                                                <input type="number" name="nohp" class="form-control"
                                                    value="<?= $result['nohp'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email" class="col-form-label" style="color: #16161a">Company
                                                    Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    value="<?= $result['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="website" class="col-form-label"
                                                    style="color: #16161a">Company Website</label>
                                                <input type="text" name="website" class="form-control"
                                                    value="<?= $result['website'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="website" class="col-form-label"
                                                    style="color: #16161a">Company Social Media
                                                </label>
                                                <input type="text" name="sosmed" class="form-control"
                                                    value="<?= $result['sosmed'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="image" class="col-form-label" style="color: #16161a">Company
                                                    Logo
                                                </label>
                                                <input class="form-control" type="file" name="image" id="image"
                                                    value="<?= $result['image'] != null ? $result['image'] : $result['image'] ?>">
                                                <input type="hidden" name="oldimage" value="<?= $result['image'] ?>">
                                            </div>
                                        </div>

                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="index-admin.php" class="btn mt-4 mb-4"
                                        style="background-color: #D4C9D9; font-weight: bold; margin-right: 2%">Back</a>
                                    <button type="submit" name="updatecompany" class="btn btn-md mt-4 mb-4"
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

    <?php include('script-admin.php') ?>
</body>

</html>
<?php 
if(isset($_POST['updatecompany']))
{   
    
    $id = $_POST['id'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $jenis_perusahaan = $_POST['jenis_perusahaan'];
    $tentang = $_POST['tentang'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $sosmed = $_POST['sosmed'];
    $userId = $_SESSION['id'];
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
    

    $query = "UPDATE company SET nama_perusahaan='$nama_perusahaan', jenis_perusahaan='$jenis_perusahaan', tentang='$tentang', alamat='$alamat', nohp='$nohp', email='$email', website='$website', sosmed='$sosmed', userId='$userId', image='$namaFile' where company.id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
       echo "<script>
       document.location='company.php'
       </script>";
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
?>