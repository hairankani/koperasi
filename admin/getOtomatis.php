<?php
require_once("../koneksi/require.php");
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT instansi from magang where id='$id'");
$magang = mysqli_fetch_array($query);
// var_dump($magang); die();
$data = array(
            'instansi'      =>  $magang['instansi']);
 echo json_encode($data);
?>