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

$getId = $_SESSION['id'];
$user = mysqli_query($conn, "SELECT users.* from users where users.id = $getId");
$get = mysqli_fetch_assoc($user);
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
                        <h1 class="h3 mb-0 text-gray-800" style="text-align: center;">Change Password</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow h-100 py-2" style="background-color: #A5C9CA;">
                                <div class="card-body" style="border-radius: 20px;">
                                    <form action="" method="POST" role="form text-left" enctype="multipart/form-data">
                                        <input type="hidden" name="id" class="form-control" value="<?= $get['id'] ?>">
                                        <input type="hidden" name="username" class="form-control"
                                            value="<?= $get['username'] ?>">
                                        <input type="hidden" name="email" class="form-control"
                                            value="<?= $get['email'] ?>">
                                        <input type="hidden" name="level" class="form-control"
                                            value="<?= $get['level'] ?>">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="password" class="col-form-label" style="color: #16161a">New
                                                    Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Add Password">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pw" class="col-form-label" style="color: #16161a">Confirm
                                                    Password
                                                </label>
                                                <input type="password" name="pw" class="form-control"
                                                    placeholder="Add Confirm Password">
                                            </div>
                                        </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="index-magang.php" class="btn btn-md btn-secondary text-light mt-4 mb-4"
                                        style="font-weight: bold;margin-right: 2%">Back</a>
                                    <button type="submit" name="changePassword" class="btn btn-md mt-4 mb-4"
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
if(isset($_POST['changePassword']))
{   
    
    $id = $_POST['id'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $tampungpw1 = $_POST['password'];
    $tampungpw2 = $_POST['pw'];
    $level = $_POST['level'];
    if ($tampungpw1 === $tampungpw2){
        $password = password_hash($tampungpw1, PASSWORD_DEFAULT);
        $query = "UPDATE users SET email='$email', username='$username', password='$password', level='$level' where users.id = '$id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run)
        {
            echo "<script>
            document.location='index-admin.php'
            </script>";
        }
        else
        {
            echo '<script> alert("Data Not Saved"); </script>';
        }
    } else {
        echo '<script> alert("Password Tidak Sama"); </script>';
    }
    
}
?>