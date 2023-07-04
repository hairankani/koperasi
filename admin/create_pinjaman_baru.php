<?php
session_start();
require_once("../koneksi/db.php");
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
} else {
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
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
    <link rel="icon" href="../img/score.png">
    <title>Koperasi</title>
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

    .buttons-excel {
        background: red
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

                    <!-- Page Heading -->
                    <div class="align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0" style="text-align: center; color: #000">Pencairan Pinjaman</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow h-100 py-2" style="background-color: #2A2024;">
                                <div class="card-body" style="border-radius: 20px;">
                                    <form class="row g-3" method="POST" role="form text-left" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #fff">Nama Anggota</label>
                                                <select class="form-control" name="id_anggota" id="id"
                                                    aria-label="Default select example" required
                                                    onchange="cekPinjamanAktif()">
                                                    <option selected>Pilih Anggota</option>
                                                    <?php
                                                    // Kita akan ambil Nama Anggota yang ada pada tabel Anggota
                                                    $anggota = mysqli_query($conn, "SELECT * FROM anggota ");
                                                    while($r = mysqli_fetch_assoc($anggota)){ 
                                                    ?>
                                                    <option value="<?= $r['id_anggota']; ?>"
                                                        id="<?= $r['id_anggota']?>">
                                                        <?= $r['nama_anggota']; ?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tanggal" require class="col-form-label"
                                                    style="color: #fff">Tanggal Pinjaman
                                                </label>
                                                <input type="date" name="tanggal_pinjaman" id="tanggal_pinjaman" class="form-control" required
                                                onchange="calculateDates()">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label style="color: #fff">Tenor</label>
                                                <select class="form-control" name="tenor" id="tenor"
                                                    aria-label="Default select example" required
                                                    onchange="calculateDates(); calculateValues()">
                                                    <option selected>Pilih Tenor</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tanggal" require class="col-form-label"
                                                    style="color: #fff">Tanggal Pelunasan
                                                </label>
                                                <input type="date" name="tanggal_pelunasan" id="tanggal_pelunasan" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #fff">Status</label>
                                                <select class="form-control" name="status" id="id"
                                                    aria-label="Default select example" readonly>
                                                    <option selected value="1">Aktif</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="pokok_pinjaman" style="color: #fff">Pokok Pinjaman</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control" required
                                                    placeholder="Input Pinjaman Pokok" name="pokok_pinjaman"
                                                    aria-describedby="basic-addon1"
                                                    id="pokok_pinjaman"
                                                    oninput="calculateValues()">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="suku_bunga" style="color: #fff">Suku Bunga</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">% </span>
                                                </div>
                                                <input type="number" class="form-control" required
                                                    placeholder="Input Suku Bunga" name="suku_bunga"
                                                    aria-describedby="basic-addon1"
                                                    id="suku_bunga"
                                                    oninput="calculateValues()">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="nilai_bunga" style="color: #fff">Nilai Bunga</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control" required
                                                    placeholder="Input Nilai Bunga" name="nilai_bunga"
                                                    aria-describedby="basic-addon1"
                                                    id="nilai_bunga" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="jasa_pinjaman" style="color: #fff">Jasa Pinjaman</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control" required
                                                    placeholder="Input Jasa Pinjaman" name="jasa_pinjaman"
                                                    aria-describedby="basic-addon1"
                                                    id="jasa_pinjaman"
                                                    oninput="calculateValues()" readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="propisi" style="color: #fff">Propisi</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">%</span>
                                                </div>
                                                <input type="number" class="form-control" required
                                                    placeholder="Input Propisi" name="propisi"
                                                    aria-describedby="basic-addon1"
                                                    id="propisi"
                                                    oninput="calculateValues()">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="biaya_propisi" style="color: #fff">Biaya Propisi</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control" required
                                                    placeholder="Input Biaya Propisi" name="biaya_propisi"
                                                    aria-describedby="basic-addon1"
                                                    id="biaya_propisi" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="total_pencairan" style="color: #fff">Total Pencairan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                                                </div>
                                                <input type="number" class="form-control" required
                                                    placeholder="Total Pencairan" name="total_pencairan"
                                                    aria-describedby="basic-addon1"
                                                    id="total_pencairan" readonly>
                                            </div>
                                        </div>
                                        
                                        <br>

                                        <div class="col-md-12">
                                            <h3 for="informasi" style="color: #fff">Informasi</h3>
                                            <h5 id="angsuran_pokok" style="color: #fff">Angsuran Pokok : </h5>
                                            <h5 id="angsuran_bunga" style="color: #fff">Angsuran Bunga : </h5>
                                            <h5 id="jumlah_angsuran" style="color: #fff">Jumlah Angsuran : </h5>
                                        </div>

                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="tabel_pinjaman.php" class="btn btn-md mt-4 mb-4"
                                        style="background-color: #FFF500; color: #000; font-weight: bold; margin-right: 2%">Back</a>
                                    <button type="submit" name="tambahPinjaman" class="btn btn-md mt-4 mb-4"
                                        style="background-color: #00913E; color: #fff; font-weight: bold; margin-right: 2%">Submit</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    function calculateValues() {
        var pokokPinjaman = parseFloat(document.getElementById('pokok_pinjaman').value);
        var sukuBunga = parseFloat(document.getElementById('suku_bunga').value);
        var propisi = parseFloat(document.getElementById('propisi').value);
        var tenor = parseFloat(document.getElementById('tenor').value);

        var nilaiBunga = pokokPinjaman * (sukuBunga / 100);
        document.getElementById('nilai_bunga').value = nilaiBunga;

        var jasaPinjaman = tenor * nilaiBunga;
        document.getElementById('jasa_pinjaman').value = jasaPinjaman;

        var biayaPropisi = pokokPinjaman * (propisi / 100);
        document.getElementById('biaya_propisi').value = biayaPropisi;

        var totalPencairan = pokokPinjaman - biayaPropisi;
        document.getElementById('total_pencairan').value = totalPencairan;

        var angsuranPokok = pokokPinjaman / tenor;
        document.getElementById('angsuran_pokok').innerHTML = "Angsuran Pokok : " + angsuranPokok.toFixed(2);

        var angsuranBunga = jasaPinjaman / tenor;
        document.getElementById('angsuran_bunga').innerHTML = "Angsuran Bunga : " + angsuranBunga.toFixed(2);

        var jumlahAngsuran = angsuranPokok + angsuranBunga;
        document.getElementById('jumlah_angsuran').innerHTML = "Jumlah Angsuran : " + jumlahAngsuran.toFixed(2);
    }


    //fungsi untuk menambah tanggal_pinjaman + tenor = tanggal_pelunasan
    function calculateDates() {
        var tanggalPinjaman = document.getElementById('tanggal_pinjaman').value;
        var tenor = parseInt(document.getElementById('tenor').value);
        var tanggalPelunasan = new Date(tanggalPinjaman);
        tanggalPelunasan.setMonth(tanggalPelunasan.getMonth() + tenor);
        var tahun = tanggalPelunasan.getFullYear();
        var bulan = (tanggalPelunasan.getMonth() + 1).toString().padStart(2, '0');
        var tanggal = tanggalPelunasan.getDate().toString().padStart(2, '0');
        var tanggalPelunasanFormatted = tahun + '-' + bulan + '-' + tanggal;
        document.getElementById('tanggal_pelunasan').value = tanggalPelunasanFormatted;
    }

</script>

</html>

<?php 

if(isset($_POST['tambahPinjaman']))
{   
    
    $id_anggota = $_POST['id_anggota'];
    $tanggal_pinjaman = $_POST['tanggal_pinjaman'];
    $tenor = $_POST['tenor'];
    $tanggal_pelunasan = $_POST['tanggal_pelunasan'];
    $pokok_pinjaman = $_POST['pokok_pinjaman'];
    $suku_bunga = $_POST['suku_bunga'];
    $nilai_bunga = $_POST['nilai_bunga'];
    $jasa_pinjaman = $_POST['jasa_pinjaman'];
    $propisi = $_POST['propisi'];
    $biaya_propisi = $_POST['biaya_propisi'];
    $status = $_POST['status'];
    $total_pencairan = $_POST['total_pencairan'];

    mysqli_begin_transaction($conn);

    try {
        // Insert data ke tabel simpanan
        $query1 = "INSERT INTO pinjaman (id_anggota, tanggal_pinjaman, tenor, tanggal_pelunasan, pokok_pinjaman, suku_bunga, nilai_bunga, jasa_pinjaman, propisi, biaya_propisi, status, total_pencairan) VALUES ('$id_anggota', '$tanggal_pinjaman', '$tenor', '$tanggal_pelunasan', '$pokok_pinjaman', '$suku_bunga', '$nilai_bunga', '$jasa_pinjaman', '$propisi', '$biaya_propisi', '$status', '$total_pencairan')";
        // die($query1);
        mysqli_query($conn, $query1);

        // Mendapatkan id_simpanan yang baru saja di-insert
        // $id_pinjaman = mysqli_insert_id($conn);

        // Insert data ke tabel angsuran_simpanan
        // $query2 = "INSERT INTO angsuran_simpanan (`id_simpanan`, `id_anggota`, `tanggal_bayar`, `angsuran_wajib`, `angsuran_sukarela`, `angsuran_swp`) VALUES ('$id_simpanan', '$id_anggota', '$tanggal_mulai', '$wajib_simpanan', '$sukarela_simpanan', '$swp_simpanan')";
        // mysqli_query($conn, $query2);

        // // Commit transaksi jika tidak ada kesalahan
        mysqli_commit($conn);
        $_SESSION["sukses"] = 'Pinjaman Baru Berhasil Ditambahkan';
        echo "<script type='text/javascript'>window.location.href='/koperasi/admin/tabel_pinjaman.php';</script>";
    } catch (Exception $e){
        // Rollback transaksi jika terjadi kesalahan
        mysqli_rollback($conn);

        echo $e->getMessage();
    }

}
?>