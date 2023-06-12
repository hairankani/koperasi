<?php
require_once("../koneksi/require.php");

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/score.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Criteria Value</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">


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

                    <h1 class="mt-5 text-center">Daftar Anggota</h1>
                    </br>

                    <!-- //add intern -->
                    <p><a href="" data-bs-toggle="modal" data-bs-target="#modalTambah" type="button"
                            class="btn text-light" style="background-color: #78938A;">
                            <i class="fas fa-plus"></i>
                            Add Criteria</a>
                    </p>
                    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Criteria Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="tambahkriteria.php" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Criteria</label>
                                            <input type="text" name="kriteria" required class="form-control"
                                                placeholder="Input Criteria">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn"
                                            style="background-color: #D4C9D9; font-weight: bold;"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="insertdatacriteria" class="btn"
                                            style="background-color: #F0C2A6; font-weight: bold;">Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>




                    <!-- //table intern -->
                    <div class="row">
                        <table id="tableKriteria" class="table table-hover" style="background: #fff">
                            <thead>
                                <tr>
                                    <th scope="col">No. </th>
                                    <th scope="col">Nomor Anggota</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Bergabung</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <?php
                            $sql = mysqli_query($conn, "SELECT * FROM anggota");
                            
                            $no = 1;
                            while ($r = mysqli_fetch_assoc($sql)) {
                            ?>
                            <tr class="text-dark">
                                <td class="text-center text-dark"><?= $no ?></td>
                                <td class="text-dark"><?= $r['id_anggota']; ?></td>
                                <td class="text-dark"><?= $r['nama_anggota']; ?></td>
                                <td class="text-dark"><?= $r['tanggal_bergabung']; ?></td>


                    </div>
                    </tr>

                    <?php $no++;
                            } ?>
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

    <script>
    $(document).ready(function() {

        $('#tableKriteria').DataTable();

    });
    </script>

</body>

</html>