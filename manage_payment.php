<?php 
session_start();
include ('db_connect.php');
include('header.php');
 ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM payments where id = {$_GET['id']} ");
	foreach($qry->fetch_array() as $k => $v){
		$$k = $v;
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>New Payments</title>

<style>
    h1.uni-title {
    position: relative;
    bottom: 35px;
    left: 556px;
    font-weight: bold;
}
.ofc {
    text-align: right;
    position: relative;
    bottom: 33px;
    left: -16px;
}
.form-group {
    position: relative;
    top: -42px;
}

.col-lg-6 {
    float: left;
}
h6.lst {
    position: relative;
    bottom: 128px;
    text-align: center;
    float: center;
    left: 241px;
    font-size: 20px;
}
.signn {
    position: relative;
    left: 864px;
    top: -48px;
    width: 210px;
}
hr {
    position: relative;
    height: -8px;
    background-color: black;
    bottom: 119px;
    width: 90%;
}
.signline {
    position: relative;
    width: 310px;
    left: 761px;
    top: -40px;
}.col-lg-12{
    float:right;
}
h4 {
    position: relative;
    font-size: 1.5rem;
    top: -33px;
    left: 13px;
}button#submit {
    display: none;
}button.hello.btn.btn-danger{
    display: none;
}h6 {
    position: relative;
    top: 10px;
    font-weight: 600;
}.form-control{
    font-weight:500;
}
.form-control:disabled, .form-control[readonly] {
    background-color: white;
    opacity: 1;
    }
</style>

<!-- For Receipt No -->
<?php
$query = "select MAX(Receipt_no) from payments";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
// echo $row['MAX(Receipt_no)'];
?>
<!-- For Updating -->
<?php
$id = $_GET['id']??"";
$query = "select * from student where id_no='$id'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);
?>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="manage_payment.php" method="post">
                    <img src="assets/uploads/Fee Receipt Logo.png">
                    <div class="form-group">
                        <div class="col-lg-8 float-left" >
                 
                </div>
            </div>
                    <h6 class="ofc">Office copy</h6>
                            <div class="form-group">

                            <div class="col-lg-6">
                                <h6 >STUDENT ID</h6>
                                <input type="number" id="ef_id" onkeyup="GetDetail(this.value)" name="ef_id" class="form-control" required>                           
                            </div> 
                
                            <div class="col-lg-6">
                            <h6 >RECEIVING DATE</h6>
                            <input type="date" name="date" id="datePicker" class="form-control" required>
                        </div>

                        <div class="col-lg-6">
                    <h6 >NAME</h6>
                    <input type="text" name="name" id="name" value="" class="form-control" required>
                </div>


                <div class="col-lg-6">
                                <h6 >REMARKS</h6>
                                <input type="text" name="remarks" class="form-control" required>
                            </div>
                <div class="col-lg-6">      
                    <h6 >FEE HEAD</h6>  
                <input list="fee_head" id="sfee_head" placeholder="Select Course" name="fee_head" class="form-control"/>
                <datalist id="fee_head">
                <option value="ACCP REGISTRATION">
                <option value="ACCP TUITION FEE">
                <option value="DAE REGISTRATION">
                <option value="SMART PRO TUITION FEE">
                <option value="EXAM RESIT">
                <option value="BATCH TRANSFER">
                <option value="ONLINEVARSITY">
                <option value="PROSPECTUS">
                <option value="MS OFFICE">
                <option value="WEB DESIGNING">
                <option value="MICROSOFT.NET">
                <option value="ANDROID">
                <option value="C">
                <option value="AUTOCAD">
                <option value="PHP MYSQL">
                <option value="JAVA">
                <option value="C++">
                <option value="C#">
                <option value="ADV.EXCEL">
                <option value="PYTHON">
                <option value="AMAZON">
                <option value="ACNS REGISTRATION">
                <option value="ACNS TUITION FEE">
                <option value="ROUTING TECHNOLOGY">
                <option value="HARWARE PROFESSIONAL">
                <option value="SERVER ADMINISTRATOR">
                <option value="BEGINNERS ENGLISH">
                <option value="SPOKEN ENGLISH PRE. INT">
                <option value="SPOKEN ENGLISH INT">
                <option value="SPOKEN ENGLISH POST. INT">
                <option value="BUSINESS COMM.">
                <option value="OTHERS">
                </datalist>
                </div>
                 <div class="col-lg-6">
                                <h6 >CHEQUE NO</h6>
                                <input type="text" name="cheque_no" class="form-control" value="-">
                            </div>
                            <div class="col-lg-6">
                    <h6 >PAYMENT MODE</h6>
                    <select name="payment_mode" class="form-control" required>
                        <option value="">Select Payment Mode</option>
                        <option value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                    </select>
                </div>
                    
                <div class="col-lg-6">
                <h6>TIMINGS</h6>
                <input list="timings" id="stimings" placeholder="Select Timings" name="timings" class="form-control"/>
                <datalist id="timings">
                    <!-- MWF -->
                <option value="9:00 TO 11:00 (MWF)">
                <option value="11:00 TO 1:00 (MWF)">
                <option value="1:00 TO 3:00 (MWF)">
                <option value="3:00 TO 5:00 (MWF)">
                <option value="5:00 TO 7:00 (MWF)">
                <option value="7:00 TO 9:00 (MWF)">
                    <!-- TTS -->
                <option value="9:00 TO 11:00 (TTS)">
                <option value="11:00 TO 1:00 (TTS)">
                <option value="1:00 TO 3:00 (TTS)">
                <option value="3:00 TO 5:00 (TTS)">
                <option value="5:00 TO 7:00 (TTS)">
                <option value="7:00 TO 9:00 (TTS)">
                </datalist>
                </div>
                                
                <div class="col-lg-6">
                            <h6 >AMOUNT</h6>
                            <!-- onkeypress="return onlyNumbers(this.value);" onkeyup="NumToWord(this.value,'amount_in_words');"maxlength="9" -->
                            <input type="number"  name="amount" id="amount" class="form-control" required>
                        </div>
                            <div class="col-lg-6">
                                <h6 >RECIEVED BY</h6>
                                <input type="text" name="inputter" value="<?php echo $_SESSION['name']; ?>" class="form-control">
                            </div> 
                            <div class="col-lg-6">
                                <h6 >AMOUNT IN WORDS</h6>
                                <input type="text" id="amount_in_words" name="amount_in_words" class="form-control">
                            </div>  

                            <div class="col-lg-6">
                    <h6>RECEIPT NO</h6>
                    <input type="number" class="form-control" name="receipt_no" value="<?php echo $row['MAX(Receipt_no)']+1 ?>" readonly>
                </div>

                <div class="col-lg-6">
                            <h6 >MONTH OF PAYMENT</h6>
                            <select name="month_of_payment" class="form-control">
                                <option value="">Select Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                <div class="col-lg-6">
                <br>
                <input type="submit" value="Submit" class="btn btn-primary" name="BtnSave">
                <button type="button" class="2 btn btn-danger" data-dismiss="modal">Cancel</button> 
                </div>

                          
                          </form>
                        </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['BtnSave']))
    {
        $receipt_no = $_POST['receipt_no'];
        $name = $_POST['name'];
        $remarks = $_POST['remarks'];
        $date = $_POST['date'];
        $fee_head = $_POST['fee_head'];
        $cheque_no = $_POST['cheque_no'];
        $payment_mode = $_POST['payment_mode'];
        $timings = $_POST['timings'];
        $amount = $_POST['amount'];
        $inputter = $_POST['inputter'];
        $amount_in_words = $_POST['amount_in_words'];
        $month_of_payment = $_POST['month_of_payment'];
        $ef_id = $_POST['ef_id'];

        //$query = "insert into payments(id,amount,remarks) values(Null,1,'$amount','$remarks','$date','$receipt_no','$name','$fee_head','$payment_mode,'$timings','$inputter','$amount_in_words','$cheque_no')";
        $query = "insert into payments(id,amount,remarks,receipt_no,full_name,fee_head,payment_mode,timings,inputter,amount_in_words,Month_Of_Payment,cheque_no,ef_id) values(Null,'$amount','$remarks','$receipt_no','$name','$fee_head','$payment_mode','$timings','$inputter','$amount_in_words','$month_of_payment','$cheque_no',$ef_id)";

        $exec = mysqli_query($conn,$query);
        if($exec==true)
        {
            echo "
                    <script>
                    swal.fire({
                    title: 'PAYMENT SUCCESSFUL!',
                    text: 'Fee has been submitted',
                    icon: 'success',
                    confirmButtonColor: 'blue',
                    timer:2000
                    }).then(function() {
                    window.location.href='index.php?page=payments';
                    });
                    </script>";
        }
        else
        {
            echo "
                    <script>
                    swal.fire({
                    title: 'Error Occured',
                    text: 'Fee submission failed',
                    icon: 'error',
                    confirmButtonColor: 'blue',
                    timer:2000
                    }).then(function() {
                    window.location.href='index.php?page=payments';
                    });
                    </script>";
        }
    }
?>


<script>
    function GetDetail(str){
        if(str.length == 0){
            document.getElementById("name").value = "";
            document.getElementById("stimings").value="";
            document.getElementById("amount").value="";
            document.getElementById("amount_in_words").value="";
            document.getElementById("sfee_head").value="";
            return;
        }
        else{
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    var myObj = JSON.parse(this.responseText);

                    document.getElementById("name").value = myObj[0];
                    document.getElementById("stimings").value = myObj[1];
                    document.getElementById("amount").value = myObj[2];
                    document.getElementById("amount_in_words").value = myObj[3];
                    document.getElementById("sfee_head").value = myObj[4];
                }
            }
            xmlhttp.open("GET","search.php?ef_id=" + str, true);
            xmlhttp.send();
        }
    }
</script>
<script>
   document.getElementById('datePicker').valueAsDate = new Date();
    </script>