<?php
require_once("../koneksi/require.php");
$id = $_GET['id'];

    
$detail = mysqli_query($conn, "SELECT nilai.id, nilai.rata_rata, nilai.predikat, magang.nama_magang, magang.instansi, detailnilai.* from magang inner join nilai on magang.id = nilai.idMagang inner join detailnilai on nilai.id = detailnilai.idNilai where detailnilai.id = $id");
$result = mysqli_fetch_assoc($detail);

$date = date('d-m-Y');


$kriteria = mysqli_query($conn, "SELECT kriteria FROM kriteria");
$resultKriteria = mysqli_fetch_all($kriteria);
$no=1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Internship Chertificate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
    body {
        color: #fff;
        background-image: url('../img/Sertifikat6.png');
        background-repeat: no-repeat;
        background-size: 800px;
    }

    .name {
        position: relative;
        margin-left: 110px;
        margin-top: 210px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 35px;
        font-weight: bold;
    }

    .date {
        position: fixed;
        margin-top: 100px;
        margin-left: 320px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;

    }

    .value {
        position: fixed;
        margin-top: 35px;
        margin-left: 280px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 15px;
    }

    .p {
        position: relative;
        margin-left: 340px;
        margin-top: -70px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 15px;
    }

    .c {
        position: fixed;
        margin-top: 10px;
        margin-left: 290px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 15px;
    }
    </style>

</head>

<body>
    <div class="bg">

        <div class="name" style="color:black"><?= $result['nama_magang']; ?></div>
        <div class="date" style="color:black">Date : <?= $date ?></div>
        <div class="value" style="color:black">AntriQue with value : <?= $result['rata_rata']; ?></div>
        <div class="c" style="color:black">Has completed internship at</div>
        <div class="p" style="color:black;">Presented to</div>
    </div>
</body>

</html>