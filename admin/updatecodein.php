<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'db_penilaian');

if(isset($_POST['updatedatai']))
{
    $id = $_POST['id'];

    $nama_magang = $_POST['nama_magang'];
    $instansi = $_POST['instansi'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "UPDATE magang set nama_magang='$nama_magang',  instansi='$instansi', email='$email', alamat='$alamat', nohp='$nohp', username='$username', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Updated"); </script>';
        header('Location:formintern.php');
    }
    else
    {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}

?>