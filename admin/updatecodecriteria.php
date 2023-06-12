<?php

$connection = mysqli_connect("localhost","scoringi_nisa","Bep22nisa123");
$db = mysqli_select_db($connection, 'scoringi_intern');

if(isset($_POST['updatedata']))
{
    $id = $_POST['update_id'];

    $kriteria = $_POST['kriteria'];
    $bobot = $_POST['bobot'];

    $query = "UPDATE kriteria set kriteria='$kriteria', bobot='$bobot' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Updated"); </script>';
        header('Location:criteriavalue.php');
    }
    else
    {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}

?>