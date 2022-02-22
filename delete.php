<?php
    include "conn.php";
    $id = $_GET["id"]; 
    echo $id;
    mysqli_select_db($conn,'sam') or die(mysqli_error($conn));  
    $del = mysqli_query($conn,"DELETE FROM sale WHERE sid = '$id'"); 
    if($del)
    {
        header("location:dashboard.php");
    }
    else
    {
        echo '<script>';
        echo 'alert("Error deleting record")';
        echo '</script>';
    }
