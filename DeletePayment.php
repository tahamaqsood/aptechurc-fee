<?php

include('db_connect.php');
$id = $_GET['id'];
$query = "Delete from payments where Receipt_no='$id'";
$exec = mysqli_query($conn,$query);
if($exec==true)
        {
            echo "<script> alert('Data deleted!'); window.location.href='index.php?page=payments' </script>";
        }
        else
        {
            echo "<script> alert('Data deleted!'); window.location.href='index.php?page=payments' </script>";
        }
?>