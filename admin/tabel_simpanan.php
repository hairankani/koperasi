<?php
require_once("../koneksi/require.php");
setlocale(LC_TIME, 'id_ID.utf8')
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

    <title>Koperasi</title>
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

                    <h1 class="mt-5 text-center" style="color: #000">Data Simpanan</h1>
                    </br>

                    <!-- //add intern -->
                    <p><a href="create_simpanan_baru.php" type="button" class="btn text-light"
                            style="background-color: #00913E;">
                            <i class="fas fa-plus"></i>
                            Tambah Simpanan Baru</a>
                    </p>





                    <!-- //table  -->
                    <div class="row">
                        <table id="tableSimpanan" class="table table-hover" style="background: #fff; color: #000">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No. </th>
                                    <th scope="col">Nama Anggota</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Simpanan Pokok</th>
                                    <th scope="col">Simpanan Wajib</th>
                                    <th scope="col">Total Simpanan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <?php
                            $sql = mysqli_query($conn, "SELECT simpanan.*, anggota.*, SUM(angsuran_simpanan.angsuran_wajib) AS total_angsuran_wajib, SUM(angsuran_simpanan.angsuran_sukarela) AS total_angsuran_sukarela, SUM(angsuran_simpanan.angsuran_swp) AS total_angsuran_swp FROM simpanan LEFT JOIN anggota ON simpanan.id_anggota = anggota.id_anggota LEFT JOIN angsuran_simpanan ON angsuran_simpanan.id_simpanan = simpanan.id_simpanan GROUP BY simpanan.id_simpanan, anggota.id_anggota ORDER BY simpanan.id_simpanan DESC");
                            $no = 1;
                            while ($r = mysqli_fetch_assoc($sql)) {
                               
                                $total = $r['pokok_simpanan'] + $r['total_angsuran_wajib'] + $r['total_angsuran_sukarela'] + $r['total_angsuran_swp'];
                            ?>
                            <tr class="" style="color: #000">
                                <td class="text-center " style="color: #000"><?= $no ?></td>
                                <td class="" style="color: #000">
                                    <a href="detail_anggota.php?id_anggota=<?= $r['id_anggota']; ?>"
                                        data-toggle="tooltip" title="Detail">
                                        <?= $r['nama_anggota']; ?>
                                    </a>

                                </td>
                                <td class="" style="color: #000"><?= date('d/m/Y', strtotime($r['tanggal_mulai'])); ?>
                                </td>
                                <td class="" style="color: #000"><?= $r['pokok_simpanan']; ?></td>
                                <td class="" style="color: #000"><?= $r['wajib_simpanan']; ?></td>
                                <td class="" style="color: #000"><?= $total ?></td>
                                <td class="">
                                    <a href="update_simpanan_angsuran.php?id_simpanan=<?= $r['id_simpanan']; ?>"
                                        type="submit" name="view" class="btn text-light"
                                        style="background-color: #FFF300;color: #000000" data-toggle="tooltip"
                                        title="Tambah Simpanan">
                                        <i class="fas fa-plus" style="color: #000000"></i>
                                    </a>
                                    <!-- </form> -->
                                    <a href="#" type="button" class="btn text-light" style="background-color: #8B0000;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalHapus<?php echo $r['id_simpanan']; ?>"
                                        data-toggle="tooltip" title="Hapus Simpanan">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <!-- <a href="#" type="button" class="btn text-light" style="background-color: #b4c6dc;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit<?php echo $r['id_simpanan']; ?>">
                                        <i class="fas fa-pen"></i>
                                    </a> -->
                                </td>


                    </div>
                    </tr>
                    <div class="modal fade" id="modalHapus<?php echo $r['id_simpanan']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Anggota<h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <input type="hidden" name="id_simpanan" value="<?= $r['id_simpanan']; ?>">
                                        Apakah kamu yakin menghapus simpanan ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn"
                                        style="background-color: #2A2024; font-weight: bold; color: #fff"
                                        data-bs-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn"
                                        style="background-color: #8B0000; font-weight: bold; color: #fff"
                                        name="hapus">Ya</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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

        $('#tableSimpanan').DataTable();

    });
    </script>
    <script>
    <?php if($_SESSION['sukses']){ ?>
    Swal.fire({
        title: 'Sukses',
        text: '<?php echo $_SESSION['sukses']; ?>',
        icon: 'success',
    })
    <?php unset($_SESSION['sukses']); } ?>
    </script>

</body>

</html>
<!-- delete -->
<?php
if (isset($_POST['hapus'])) {
    $id_simpanan = $_POST['id_simpanan'];
    $hapus = mysqli_query($conn, "DELETE FROM simpanan WHERE id_simpanan='$id_simpanan'");
    if ($hapus) {
        $_SESSION["sukses"] = 'Data Simpanan Berhasil Dihapus';
        echo "<script>document.location='tabel_simpanan.php'</script>";
    } else {
        echo "Pesan" . mysqli_error($conn);
    }
}
?>