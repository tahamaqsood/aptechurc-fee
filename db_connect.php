<?php 
// $conn = new mysqli('localhost','root','','Aptechurc_db')or die("Could not connect to mysql".mysqli_error($conn));
$conn = mysqli_connect('localhost','root','','Aptechurc_db');
if($conn!=true)
{
    echo "<script>alert('Database not connected');</script>";
}
?>
