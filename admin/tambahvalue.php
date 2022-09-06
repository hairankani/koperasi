<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'db_penilaian');

if(isset($_POST['insertdatavalue']))
{
    $idMagang = $_POST['idMagang'];
    $instansi = $_POST['instansi'];
    $nilai1 = (float)$_POST['nilai'][0];
    $nilai2 = (float)$_POST['nilai'][1];
    $nilai3 = (float)$_POST['nilai'][2];
    $nilai4 = (float)$_POST['nilai'][3];
    $nilai5 = (float)$_POST['nilai'][4];
    $nilai6 = (float)$_POST['nilai'][5];
    $nilai7 = (float)$_POST['nilai'][6];
    $nilai8 = (float)$_POST['nilai'][7];
    $nilai9 = (float)$_POST['nilai'][8];
    $nilai10 = (float)$_POST['nilai'][9];
    $nilai11 = (float)$_POST['nilai'][10];
    $nilaiA = (float)$_POST['nilai'][0];
    $nilaiB = (float)$_POST['nilai'][1];
    $nilaiC = ($nilai3+$nilai4+$nilai5+$nilai6)/4;
    $nilaiD = ($nilai7+$nilai8+$nilai9) / 3;
    $nilaiE = ($nilai10+$nilai11) / 2;

    $rata_rata = ($nilaiA+$nilaiB+$nilaiC+$nilaiD+$nilaiE)/5;
    if ($rata_rata > 90 && $rata_rata <= 100){
        $predikat = "AA";
    } else if ($rata_rata > 80 && $rata_rata <= 90 ) {
        $predikat = "A";
    } else if ($rata_rata > 70 && $rata_rata <= 80){
        $predikat = "BB";
    }else if ($rata_rata > 60 && $rata_rata <= 70){
        $predikat = "B";
    }else if ($rata_rata > 50 && $rata_rata <= 60){
        $predikat = "CC";
    }else if ($rata_rata > 30 && $rata_rata <= 50){
        $predikat = "C";
    }else if ($rata_rata > 0 && $rata_rata <= 30){
        $predikat = "D";
    } 
    

    $query = "INSERT INTO nilai (`idMagang`, `instansi`, `nilaiA`, `nilaiB`, `nilaiC`, `nilaiD`, `nilaiE`, `rata_rata`, `predikat`) VALUES ('$idMagang','$instansi','$nilaiA','$nilaiB','$nilaiC','$nilaiD','$nilaiE','$rata_rata','$predikat')";

    if(mysqli_query($connection, $query))
    {
        $idNilai = mysqli_insert_id($connection);
        $insetDetail = "INSERT INTO detailnilai (`idNilai`,`nilai1`,`nilai2`,`nilai3`,`nilai4`,`nilai5`,`nilai6`,`nilai7`,`nilai8`,`nilai9`, `nilai10`, `nilai11`) VALUES ('$idNilai','$nilai1','$nilai2','$nilai3','$nilai4','$nilai5','$nilai6','$nilai7','$nilai8','$nilai9', '$nilai10', '$nilai11')";
        mysqli_query($connection, $insetDetail);
        echo '<script> alert("Data Saved"); </script>';
        header('Location: internvalue.php');
    }
    else
    {
        echo $connection->error;
    }
}

?>