<?php 
    session_start();
    include '../koneksi/db.php';
 
    // menangkap data yang dikirim dari form login
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    // menyeleksi data pada tabel admin dengan email dan password yang sesuai
    $data = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
 
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);
 
    if($cek > 0){
        $_SESSION['email'] = $email;
        header("location: index-magang.php");
    } else{
        header("location:login-magang.php?error=Email dan Password Salah!");  
    }
?>