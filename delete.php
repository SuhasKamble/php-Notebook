<?php
    include "conn.php";

    $id = $_GET['id'];
    $q = "DELETE FROM `note` WHERE id=$id";
    mysqli_query($con, $q);

    header("location:home.php");

?>