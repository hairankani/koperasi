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


    <title>Criteria Value</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
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

                    <h1 class="mt-5 text-center">Intern Value</h1>
                    </br>

                    <!-- //add intern -->
                    <p><a href="" data-bs-toggle="modal" data-bs-target="#modalTambah" type="button"
                            class="btn text-light" style="background-color: #78938A;">Create</a>
                    </p>
                    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">

                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Intern Value</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="tambahvalue.php" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Magang</label>
                                            <select class="form-select" name="idMagang" id="id" onchange="otomatis()"
                                                aria-label="Default select example">
                                                <option selected>Pilih Magang</option>
                                                <?php
                                                    // Kita akan ambil Nama Petugas yang ada pada tabel Petugas
                                                    $magang = mysqli_query($conn, "SELECT * FROM magang ");
                                                    while($r = mysqli_fetch_assoc($magang)){ 
                                                    ?>
                                                <option value="<?= $r['id']; ?>" id="<?= $r['id']?>">
                                                    <?= $r['nama_magang']; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Instansi</label>
                                            <input type="text" name="instansi" id="instansi" class="form-control"
                                                readonly>
                                        </div>
                                        <label>Penilaian</label>
                                        <?php
                                        $kriteria = mysqli_query($conn, "SELECT kriteria FROM kriteria");
                                        while($r = mysqli_fetch_assoc($kriteria)){ 
                                            ?>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Username"
                                                aria-label="Username" value="<?= $r['kriteria'] ?>" readonly>
                                            <span class="input-group-text">-</span>
                                            <input type="number" class="form-control" name="nilai[]"
                                                placeholder="Input Nilai" aria-label="Server">
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="insertdatavalue" class="btn btn-primary">Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>




                    <!-- //table intern -->
                    <div class="row">
                        <table id="tableValue" class="table table-light table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2" class="text-center">No. </th>
                                    <th scope="col" rowspan="2">Nama Magang</th>
                                    <th scope="col" rowspan="2">Instansi</th>
                                    <th scope="col" class="text-center" colspan="5">Kriteria</th>
                                    <th scope="col" rowspan="2">Rata Rata Nilai</th>
                                    <th scope="col" rowspan="2">Predikat</th>
                                    <th scope="col" rowspan="2">Action</th>
                                </tr>
                                <tr>
                                    <th>Kedisiplinan Bekerja</th>
                                    <th>Tanggung Jawab</th>
                                    <th>Keterampilan</th>
                                    <th>Kemampuan Berkomunikasi</th>
                                    <th>Kemampuan Berbahasa</th>
                                </tr>
                            </thead>
                            <?php
                            $sql = mysqli_query($conn, "SELECT nilai.*, magang.nama_magang, detailnilai.id iddetail, detailnilai.idNilai FROM magang INNER JOIN nilai ON magang.id = nilai.idMagang inner join detailnilai on nilai.id = detailNilai.idNilai");
                            $no = 1;
                            while ($r = mysqli_fetch_assoc($sql)) 
                            {
                                // var_dump($r['iddetail']);die();
                            ?>
                            <tr class="text-dark">
                                <td class="text-center text-dark"><?= $no ?></td>
                                <td class="text-dark"><?= $r['nama_magang']; ?></td>
                                <td class="text-dark"><?= $r['instansi']; ?></td>
                                <td class="text-dark"><?= $r['nilaiA']; ?></td>
                                <td class="text-dark"><?= $r['nilaiB']; ?></td>
                                <td class="text-dark"><?= $r['nilaiC']; ?></td>
                                <td class="text-dark"><?= $r['nilaiD']; ?></td>
                                <td class="text-dark"><?= $r['nilaiE']; ?></td>
                                <td class="text-dark"><?= $r['rata_rata']; ?></td>
                                <td class="text-dark"><?= $r['predikat']; ?></td>
                                <td class="text-center text-dark">
                                    <!-- <form action="detailvalue.php" method="POST"> -->
                                    <!-- <input type='hidden' name='id' value="<?php echo $r['iddetail']; ?>"> -->
                                    <a href="detailvalue.php?id=<?= $r['iddetail']; ?>" type="submit" name="view"
                                        class="btn btn-info">View</a>
                                    <!-- </form> -->
                                    <a href="#" type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalHapus<?php echo $r['id']; ?>">Delete</a>
                                </td>
                                <!-- delete -->
                                <div class="modal fade" id="modalHapus<?php echo $r['id']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Intern Value<h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post">
                                                    <input type="hidden" name="id" value="<?= $r['id']; ?>">
                                                    Are you sure to delete this Intern Value?
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

    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script>
    $(document).ready(function() {

        $('#tableValue').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
            ]
            // buttons: ['copy', 'print', 'pdf', 'colvis'],

        });

    });

    function otomatis() {
        var id = $("#id").val();

        $.ajax({
            url: 'getOtomatis.php',
            data: {
                id: id
            }
        }).then(function(data) {
            var json = data,
                obj = JSON.parse(json);
            $('#instansi').val(obj.instansi);
        });
    }
    </script>

</body>

</html>

<!-- delete -->
<?php
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $hapus = mysqli_query($conn, "DELETE FROM nilai WHERE id='$id'");
    if ($hapus) {
        echo "<script>document.location='internvalue.php'</script>";
    } else {
        echo "Pesan" . mysqli_error($conn);
    }
}
?>