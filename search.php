<?php
include("db_connect.php");
$ef_id = $_REQUEST['ef_id'];
if($ef_id!=="")
{

    $query = mysqli_query($conn,"select * from student where id_no='$ef_id'");
    $row = mysqli_fetch_assoc($query);

    // For student table
    // $query = "select * from student where id_no = '$ef_id'";
    // $data = mysqli_query($conn,$query);
    // $row = mysqli_fetch_assoc($data);

    // For student_ef_list table
    // $query1 = "select * from student_ef_list where ef_no = '$ef_id'";
    // $data1 = mysqli_query($conn,$query1);
    // $row1 = mysqli_fetch_assoc($data1);

    // For payments table
    // $query2 = "select * from payments where ef_id = '$ef_id'";
    // $data2 = mysqli_query($conn,$query2);
    // $row2 = mysqli_fetch_assoc($data2);

    $Name = $row['name'];
    $Timings = $row['timings'];
    $Monthly_fee = $row['monthly_fee'];
    $Amount_In_Words = $row['amount_in_words'];
    $Course = $row['course'];
    // $Name = $row['name'];
    // $Timings = $row2['TIMINGS'];
    // $Amount = $row1['total_fee'];
    // $Amount_In_Words = $row2['AMOUNT_IN_WORDS'];
}
$result = array("$Name", "$Timings", "$Monthly_fee", "$Amount_In_Words","$Course");
$myJSON = json_encode($result);
echo $myJSON;
?>