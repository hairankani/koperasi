<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'db_penilaian');
require('../koneksi/require.php');

if(isset($_POST['insertdataintern']))
{   
    $nama_magang = $_POST['nama_magang'];
    $instansi = $_POST['instansi'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $startIntern = $_POST['startIntern'];
    $endIntern = $_POST['endIntern'];;
    $arr = explode(' ',trim($nama_magang));
    $username = $arr[0];
    $password = password_hash(date("dmY", strtotime($startIntern)), PASSWORD_DEFAULT);
    $level = "magang";
    $insertUser = "INSERT into users (`username`,`email`,`password`,`level`) values ('$username','$email','$password','$level')";
    if(mysqli_query($connection, $insertUser))
    {   
        $userId = mysqli_insert_id($connection);
        $query = "INSERT INTO magang (`nama_magang`,`instansi`,`email`,`alamat`,`nohp`,`jeniskelamin`,`startIntern`,`endIntern`,`username`,`password`, `userId`) VALUES ('$nama_magang','$instansi','$email','$alamat','$nohp','$jeniskelamin','$startIntern','$endIntern','$username','$password', '$userId')";

        mysqli_query($connection, $query);
        echo '<script> alert("Data Saved"); </script>';
        header('Location: interndata.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>