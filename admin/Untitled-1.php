<?php
session_start();
require_once("../koneksi/db.php");
//Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['email'])){
    header("location: login-admin.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $email = $_SESSION['email'];
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

    <title>SPK - Internship</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data From Intern</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm shadow-sm"
                            style="background-color: #ECB390;"><i class="fas fa-download fa-sm text-white-50"></i>
                            Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- <div class="col-xl-11 col-lg-7">
                            <div class="card shadow mb-4"> -->
                        <!-- Card Header - Dropdown -->

                        <!-- Card Body -->
                        <!-- <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Button create -->
                        <p><a href="tambah_kriteria.php" data-bs-toggle="modal" data-bs-target="#modalTambah"
                                type="button" class="btn text-light" style="background-color: #78938A;">Create</a>
                        </p>
                        <!-- tutup -->




                        <!-- Modal -->
                        <div class="modal fade" id="internaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Intern Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="tambahmagang.php" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Intern</label>
                                                <input type="text" name="nama_magang" class="form-control"
                                                    placeholder="Input Name's Intern">
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control"
                                                    placeholder="Input Email">
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" class="form-control"
                                                    placeholder="Input Alamat">
                                            </div>

                                            <div class="form-group">
                                                <label>No. Telp</label>
                                                <input type="text" name="nohp" class="form-control"
                                                    placeholder="Input No. Telp">
                                            </div>

                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control"
                                                    placeholder="Input Username">
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" name="password" class="form-control"
                                                    placeholder="Input Password">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="insertdataintern" class="btn btn-primary">Save
                                                Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- ########################################################################################## -->

                        <!-- Modal Edit-->
                        <div class="modal fade" id="modalEdit<?php echo $row['nisn']; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Intern Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="updatecodein.php" method="POST">

                                        <div class="modal-body">

                                            <input type="hidden" name="id" id="id">

                                            <div class="form-group">
                                                <label>Intern</label>
                                                <input type="text" name="nama_magang" id="nama_magang"
                                                    class="form-control" placeholder="Input Name's Intern">
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" id="email" class="form-control"
                                                    placeholder="Input Email">
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" id="alamat" class="form-control"
                                                    placeholder="Input Alamat">
                                            </div>

                                            <div class="form-group">
                                                <label>No. Telp</label>
                                                <input type="text" name="nohp" id="nohp" class="form-control"
                                                    placeholder="Input No. Telp">
                                            </div>

                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" id="username" class="form-control"
                                                    placeholder="Input Username">
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" name="password" id="password" class="form-control"
                                                    placeholder="Input Password">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="updatedatai" class="btn btn-primary">Update
                                                Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- ########################################################################################## -->

                        <div class="container">
                            <div class="jumbotron" style="background: #F8F9FC;">
                                <h2>Intern</h2>
                                <div class="card">
                                    <div class="card-body">
                                        <button type="button" class="btn text-light" style="background-color: #78938A;"
                                            data-bs-toggle="modal" data-bs-target="#internaddmodal">
                                            + Add Intern
                                        </button>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">

                                        <?php
                                        $connection = mysqli_connect("localhost","root","");
                                        $db = mysqli_select_db($connection, 'db_penilaian');

                                        $query = "SELECT * FROM magang";
                                        $query_run = mysqli_query($connection, $query);
                                    ?>

                                        <table class="table table-light table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No. </th>
                                                    <th scope="col">Nama Lengkap</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">No Hp</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Password</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                        if($query_run)
                                        {
                                            foreach($query_run as $row)
                                            {
                                    ?>
                                            <tbody>
                                                <tr class="table-active">
                                                    <!-- <th scope="row">1</th> -->
                                                    <td> <?php echo  $row['id']; ?> </td>
                                                    <td> <?php echo  $row['nama_magang']; ?> </td>
                                                    <td> <?php echo  $row['email']; ?> </td>
                                                    <td> <?php echo  $row['alamat']; ?> </td>
                                                    <td> <?php echo  $row['nohp']; ?> </td>
                                                    <td> <?php echo  $row['username']; ?> </td>
                                                    <td> <?php echo  $row['password']; ?> </td>
                                                    <td>
                                                        <a href="#" type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalEdit<?php echo $row['id']; ?>">Edit
                                                        </a>
                                                    </td>

                                                </tr>
                                            </tbody>
                                            <?php
                                            }
                                                  
                                        }
                                        else 
                                        {
                                            echo "No Record Found";
                                        }
                                    ?>
                                        </table>
                                    </div>
                                </div>


                            </div>


                        </div>




                        <!-- Earnings (Monthly) Card Example -->


                        <!-- Earnings (Monthly) Card Example -->


                        <!-- Earnings (Monthly) Card Example -->


                        <!-- Pending Requests Card Example -->

                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->


                        <!-- Pie Chart -->

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->


                            <!-- Color System -->


                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->


                            <!-- Approach -->
                            <!-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold" style="color: #ECB390;">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
                            </div> -->

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {
        $('.editbtni').on('click', function() {

            $('#editmodali').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#nama_magang').val(data[1]);
            $('#email').val(data[2]);
            $('#alamat').val(data[3]);
            $('#nohp').val(data[4]);
            $('#username').val(data[5]);
            $('#password').val(data[6]);


        });
    });
    </script>
</body>

</html>