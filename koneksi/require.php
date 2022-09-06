<?php 
session_start();
require_once("db.php");

if(!isset($_SESSION['username'])){
    header("location: ../admin/login-admin.php");
}else{
    $username = $_SESSION['username'];
}
?>