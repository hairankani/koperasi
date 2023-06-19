<?php 
require_once("../koneksi/db.php");
if (isset($_GET['id_anggota'])) {
    $id_anggota = $_GET['id_anggota'];

    // Mengambil detail anggota berdasarkan ID dari database
    $query = "SELECT * FROM simpanan WHERE id_anggota = '$id_anggota'";
    $result = mysqli_query($conn, $query);

    // Memeriksa jika query berhasil dieksekusi
    if ($result) {
        // Memeriksa jika anggota ditemukan
        if (mysqli_num_rows($result) > 0) {
            $anggota = mysqli_fetch_assoc($result);

            // Mengirim data anggota dalam format JSON sebagai respons
            header('Content-Type: application/json');
            echo json_encode($anggota);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Angsuran tidak ada, Silahkan tambahkan simpanan baru']);
            echo '<script>alert("Angsuran tidak ada, Silahkan tambahkan simpanan baru");</script>'; // Menampilkan alert di sisi klien
        }
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}
?>