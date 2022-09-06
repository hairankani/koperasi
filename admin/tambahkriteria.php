<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'db_penilaian');

if(isset($_POST['insertdatacriteria']))
{
    $kriteria = $_POST['kriteria'];

    $query = "INSERT INTO kriteria (`kriteria`) VALUES ('$kriteria')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: criteriavalue.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>