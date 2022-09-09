<?php
require_once("../koneksi/require.php");

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

    <title>Intern Data</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
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

                    <h1 class="mt-5 text-center">Intern Data</h1>
                    </br>

                    <!-- //add intern -->
                    <p><a href="" data-bs-toggle="modal" data-bs-target="#modalTambah" type="button"
                            class="btn text-light" style="background-color: #78938A;">
                            <i class="fas fa-plus"></i>
                            Add Intern</a>
                    </p>
                    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                            <label>Full Name</label>
                                            <input type="text" name="nama_magang" class="form-control"
                                                placeholder="Input Name's Intern">
                                        </div>
                                        <div class="form-group">
                                            <label>Instansi</label>
                                            <input type="text" name="instansi" class="form-control"
                                                placeholder="Input Instansi">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Input Email">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="alamat"
                                                id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="number" name="nohp" class="form-control"
                                                placeholder="Input Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <label>Gender : </label>
                                            <label><input type="radio" name="jeniskelamin" value="Laki-Laki">
                                                Laki-Laki</label>
                                            <label><input type="radio" name="jeniskelamin" value="Perempuan">
                                                Perempuan</label>
                                        </div>
                                        <div class="form-group">
                                            <label>Start Internr</label>
                                            <input type="date" name="startIntern" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>End Intern</label>
                                            <input type="date" name="endIntern" class="form-control">
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="insertdataintern" class="btn btn-primary">Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>




                    <!-- //table intern -->
                    <div class="row">
                        <table id="tableintern" class="table table-light table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No. </th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Instansi</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Start</th>
                                    <th scope="col">End</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <?php
                            $sql = mysqli_query($conn, "SELECT * FROM magang");
                            $no = 1;
                            while ($r = mysqli_fetch_assoc($sql)) {
                            ?>
                            <tr class="text-dark">
                                <td class="text-center text-dark"><?= $no ?></td>
                                <td class="text-dark"><?= $r['nama_magang']; ?></td>
                                <td class="text-dark"><?= $r['instansi']; ?></td>
                                <td class="text-dark"><?= $r['email']; ?></td>
                                <td class="text-dark"><?= $r['alamat']; ?></td>
                                <td class="text-dark"><?= $r['nohp']; ?></td>
                                <td class="text-dark"><?= $r['jeniskelamin']; ?></td>
                                <td class="text-dark"><?= date("d-m-Y", strtotime($r['startIntern']))?></td>
                                <td class="text-dark"><?= date("d-m-Y", strtotime($r['endIntern'])) ?></td>
                                <td class="text-dark"><?= $r['username']; ?></td>
                                <td class="text-center text-dark"><a href="#" type="button" class="btn text-light"
                                        style="background-color: #8B0000;" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus<?php echo $r['id']; ?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="#" type="button" class="btn text-light" style="background-color: #b4c6dc;"
                                        data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $r['id']; ?>">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </td>
                                <!-- delete -->
                                <div class="modal fade" id="modalHapus<?php echo $r['id']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Intern<h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post">
                                                    <input type="hidden" name="id" value="<?= $r['id']; ?>">
                                                    Are you sure to delete this Intern?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-danger" name="hapus">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- edit -->
                                <div class="modal fade" id="modalEdit<?php echo $r['id']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-titlec" id="exampleModalLabel">Edit Intern</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form method="post">
                                                    <?php
                                                        $id = $r['id'];

                                                        $query_edit = mysqli_query($conn, "SELECT * FROM magang WHERE id='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {
                                                        ?>
                                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                    <div class="mb-3">
                                                        <label>Full Name</label>
                                                        <input type="text" name="nama_magang" id="nama_magang"
                                                            class="form-control" value="<?= $row['nama_magang']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Instansi</label>
                                                        <input type="text" name="instansi" id="instansi"
                                                            class="form-control" value="<?= $row['instansi']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Email</label>
                                                        <input type="text" name="email" id="email" class="form-control"
                                                            value="<?= $row['email']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Address</label>
                                                        <input type="text" name="alamat" id="alamat"
                                                            class="form-control" value="<?= $row['alamat']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Phone Number</label>
                                                        <input type="text" name="nohp" id="nohp" class="form-control"
                                                            value="<?= $row['nohp']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Username</label>
                                                        <input type="text" name="username" id="username"
                                                            class="form-control" value="<?= $row['username']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Password</label>
                                                        <input type="text" name="password" id="password"
                                                            class="form-control" value="<?= $row['password']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            name="update">Submit</button>
                                                    </div>
                                            </div>

                                            <?php
                                                        }
                                            ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    </tr>
                    <?php $no++;
                            } ?>
                    </table>

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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {

        $('#tableintern').DataTable();

    });
    </script>

</body>

</html>

<?php
// Proses update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_magang = $_POST['nama_magang'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $update = mysqli_query($conn, "UPDATE magang set nama_magang='$nama_magang', email='$email', alamat='$alamat', nohp='$nohp', username='$username', password='$password' where magang.id = '$id'");
    if ($update) {
        echo "<script>
        document.location='interndata.php'
        </script>";
    } else {
        echo "<script>
        alert('Gagal');
        </script>";
    }
}
?>
<!-- delete -->
<?php
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $hapus = mysqli_query($conn, "DELETE FROM magang WHERE id='$id'");
    if ($hapus) {
        echo "<script>document.location='interndata.php'</script>";
    } else {
        echo "Pesan" . mysqli_error($conn);
    }
}
?>