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

                    <h1 class="mt-5 text-center" style="color: #000">Data Pinjaman</h1>
                    </br>

                    <!-- //add intern -->
                    <p><a href="create_pinjaman_baru.php" type="button"
                            class="btn text-light" style="background-color: #00913E;">
                            <i class="fas fa-plus"></i>
                            Tambah Pinjaman Baru</a>
                    </p>

                    <!-- //table -->
                    <div class="row">
                        <table id="tablePinjaman" class="table table-hover" style="background: #fff; color: #000">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Anggota</th>
                                    <th scope="col">Tanggal Pinjaman</th>
                                    <th scope="col">Tenor</th>
                                    <th scope="col">Tanggal Pelunasan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Pokok Pinjaman</th>
                                    <th scope="col">Suku Bunga</th>
                                    <th scope="col">Nilai Bunga</th>
                                    <th scope="col">Jasa Pinjaman</th>
                                    <th scope="col">Propisi</th>
                                    <th scope="col">Biaya Propisi</th>
                                    <th scope="col">Total Pencairan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <?php
                            $sql = mysqli_query($conn, "SELECT pinjaman.*, anggota.* FROM pinjaman LEFT JOIN anggota ON pinjaman.id_anggota = anggota.id_anggota ORDER BY pinjaman.id_pinjaman DESC");
                            $no = 1;
                            while ($r = mysqli_fetch_assoc($sql)) {
                                
                            ?>
                            <tr class="" style="color: #000">
                                <td class="text-center" style="color: #000"><?= $no ?></td>
                                <td class="" style="color: #000">
                                    <a href="detail_anggota.php?id_anggota=<?= $r['id_anggota']; ?>"
                                        data-toggle="tooltip" title="Detail">
                                        <?= $r['nama_anggota']; ?>
                                    </a>
                                </td>
                                <td class="" style="color: #000"><?= date('d/m/Y', strtotime($r['tanggal_pinjaman'])); ?></td>
                                <td class="" style="color: #000"><?= $r['tenor']; ?></td>
                                <td class="" style="color: #000"><?= date('d/m/Y', strtotime($r['tanggal_pelunasan'])); ?></td>
                                <td class="" style="color: #000">
                                <?php
                                    $status = $r['status']; // Ambil nilai status dari database
                                    if ($status == 1) {
                                        echo "Aktif";
                                    } elseif ($status == 0) {
                                        echo "Lunas";
                                    } else {
                                        echo "Status tidak valid";
                                    }
                                ?>    
                                </td>
                                <td class="" style="color: #000"><?= $r['pokok_pinjaman']; ?></td>
                                <td class="" style="color: #000"><?= $r['suku_bunga']; ?> %</td>
                                <td class="" style="color: #000"><?= $r['nilai_bunga']; ?></td>
                                <td class="" style="color: #000"><?= $r['jasa_pinjaman']; ?></td>
                                <td class="" style="color: #000"><?= $r['propisi']; ?> %</td>
                                <td class="" style="color: #000"><?= $r['biaya_propisi']; ?></td>
                                <td class="" style="color: #000"><?= $r['total_pencairan']; ?></td>
                                <td class="">
                                    <a href="update_pinjaman_angsuran.php?id_pinjaman=<?= $r['id_pinjaman']; ?>"
                                        type="submit" name="view" class="btn text-light"
                                        style="background-color: #FFF300;color: #000000" data-toggle="tooltip"
                                        title="Bayar Pinjaman">
                                        <i class="fas fa-plus" style="color: #000000"></i>
                                    </a>
                                    <a href="#" type="button" class="btn text-light" style="background-color: #8B0000;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalHapus<?php echo $r['id_pinjaman']; ?>"
                                        data-toggle="tooltip" title="Hapus Pinjaman">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>

                            <!-- MODAL HAPUS -->
                            <div class="modal fade" id="modalHapus<?php echo $r['id_pinjaman']; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Pinjaman<h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body">
                                                    <form method="post">
                                                        <input type="hidden" name="id_pinjaman" value="<?= $r['id_pinjaman']; ?>">
                                                        Apakah kamu yakin menghapus pinjaman ini?
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
                                </div>
                            </div>
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

        $('#tablePinjaman').dataTable({
            "responsive": true,
        });

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

<?php
if (isset($_POST['hapus'])) {
    $id_pinjaman = $_POST['id_pinjaman'];
    $hapus = mysqli_query($conn, "DELETE FROM pinjaman WHERE id_pinjaman='$id_pinjaman'");
    if ($hapus) {
        $_SESSION["sukses"] = 'Data Pinjaman Berhasil Dihapus';
        echo "<script>document.location='tabel_pinjaman.php'</script>";
    } else {
        echo "Pesan" . mysqli_error($conn);
    }
}
?>