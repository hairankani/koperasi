<?php 
    session_start();
    include '../koneksi/db.php';
 
    // menangkap data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // menyeleksi data pada tabel admin dengan username dan password yang sesuai
    $data = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);
 
    if($cek > 0){

        $level = mysqli_fetch_assoc($data);
        if ($level['level'] == 'admin'){
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "admin";
            header("location: index-admin.php");
        } else if ($level['level'] == 'magang'){
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "magang";
            $_SESSION['id'] = $level['id'];
            header("location: ../magang/index-magang.php");
        }

        
    } else{
        header("location:login-admin.php?error=Username dan Password Salah!");  
    }
?>