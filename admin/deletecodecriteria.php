<?php
$connection = mysqli_connect("localhost","scoringi_nisa","Bep22nisa123");
$db = mysqli_select_db($connection, 'scoringi_intern');

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM kriteria WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:criteriavalue.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>