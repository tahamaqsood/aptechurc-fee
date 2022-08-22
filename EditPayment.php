<?php
session_start();
include('db_connect.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Edit Payment</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Sweet Alert2 css file -->
    <link rel="stylesheet" href="dist/sweetalert2.min.css">
    <!-- Sweet Alert2 Js file -->
    <script src="dist/sweetalert2.all.min.js"></script>
    <!-- Fav icon CDN -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
}
</style>  
</head>
<?php
$id = $_GET['id']??"";
$query = "select * from payments where ef_id='$id'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);

$otherTimings = $data['TIMINGS']; //For custom timings
?>
<body>
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <img src="assets/uploads/Fee Receipt Logo.png">
                    <div class="form-group">
                        <div class="col-lg-8 float-left" >
                    <h1 class="uni-title">UNIVERSITY ROAD CENTER </h1>
                </div>
            </div>
                    <h6 class="ofc">Office copy</h6>
                            <div class="form-group">
                <!-- For id -->
                <input type="hidden" name="hiddenID" value="<?php echo $data['id']; ?>">
                        <div class="col-lg-6">
                    <h6 >NAME</h6>
                    <input type="text" name="name" value="<?php echo $data['FULL_NAME']; ?>" class="form-control" required>
                </div>
                <div class="col-lg-6">
                                <h6 >REMARKS</h6>
                                <input type="text" name="remarks" value="<?php echo $data['remarks']; ?>" class="form-control" required>
                            </div>
                <div class="col-lg-6">      
                    <h6 >FEE HEAD</h6>
                    <?php
                    if($data['FEE_HEAD']!='' && $data['FEE_HEAD']!=null)
                    {
                        ?>
                        <input list="fee_head" value="<?php echo $data['FEE_HEAD']; ?>" name="fee_head" placeholder="Select" class="form-control"/>
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
                        <?php
                    }
                    ?>
                </div>
                 <div class="col-lg-6">
                                <h6 >CHEQUE NO</h6>
                                <input type="text" name="cheque_no" value="<?php echo $data['CHEQUE_NO']; ?>" class="form-control" value="-">
                            </div>
                            <div class="col-lg-6">
                    <h6 >PAYMENT MODE</h6>
                    <select name="payment_mode" class="form-control" required>
                        <option value="">Select Payment Mode</option>
                        <?php
                        if($data['PAYMENT_MODE']=='Cash')
                        {
                            echo '<option value="Cash" selected>Cash</option>
                            <option value="Cheque">Cheque</option>';
                        }
                        else if($data['PAYMENT_MODE']=='Cheque')
                        {
                            echo '<option value="Cash">Cash</option>
                            <option value="Cheque" selected>Cheque</option>';
                        }
                        ?>
                    </select>
                </div>
                    
                <div class="col-lg-6">      
                    <h6 >TIMINGS</h6>
                    <?php
                    if($data['TIMINGS']!='' && $data['TIMINGS']!=null)
                    {
                        ?>
                        <input list="timings" value="<?php echo $data['TIMINGS']; ?>" name="timings" placeholder="Select" class="form-control"/>
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
                        <?php
                    }
                    ?>     
                </div>

                                
                <div class="col-lg-6">
                            <h6 >AMOUNT</h6>
                            <input type="number" name="amount" value="<?php echo $data['amount']; ?>" class="form-control" required>
                        </div>
                            <div class="col-lg-6">
                                <h6 >INPUTTER</h6>
                                <input type="text" name="inputter" value="<?php echo $_SESSION['name']; ?>" class="form-control">
                            </div> 
                            <div class="col-lg-6">
                                <h6 >AMOUNT IN WORDS</h6>
                                <input type="text" name="amount_in_words" value="<?php echo $data['AMOUNT_IN_WORDS']; ?>" class="form-control">
                            </div>  

                            <div class="col-lg-6">
                            <h6 >MONTH OF PAYMENT</h6>
                            <?php
                            if($data['Month_Of_Payment']!="" && $data['Month_Of_Payment']!=null)
                            {
                                ?> 
                                <select name="month_of_payment" class="form-control">
                                <option value="">Select Month</option>
                                <option value="<?php echo $data['Month_Of_Payment']; ?>" selected> <?php echo $data['Month_Of_Payment']; ?> </option>
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
                                <?php
                            }
                            ?>
                        </div>

                            <div class="col-lg-6"> 
                                <br>                          
                                <input type="submit" value="Update" name="BtnUpdate" class="btn btn-outline-info">  
                            </div>
                        </div>
                    </div>
<div class="col-lg-12">
                              <h4>* Cheques subject to relization</h4>
                              <h4>* This receipt must be produced when demanded</h4>
                              <h4>* Fee once paid is not refundable</h4>
</div>
                              <div class="form-group">
                                <div class="col-lg-4">
                             <hr class="signline"/>
                              <h6 class="signn">Issuing Signature</h6>
                              </div>
                            </div>
                              <hr/>
                              <h6 class="lst">1st Floor-Bell Arcade, Block-1, Main University Road, Opp. Unversity of Karachi.
                                <br>
                              URL: www.aptech-education.com.pk Tel:021-3466922-3, 0336-2197164</h6>
                            </div>
                          </form>
                        </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['BtnUpdate']))
    {
        $hiddenID = $_POST['hiddenID']; //hidden
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

        //$qry = "update payments set ef_id='$ef_id,Receipt_no='$receipt_no',amount='$amount',remarks='$remarks',date_created='$date',FULL_NAME='$name',FEE_HEAD='$fee_head',PAYMENT_MODE='$payment_mode',AMOUNT_IN_WORDS='$amount_in_words',CHEQUE_NO='$cheque_no',TIMINGS='$timings',INPUTTER='$inputter' where id='$hiddenID'";
        // $qry = "update payments set ef_id='$ef_id where id='$hiddenID'";
        $qry = "update payments set amount='$amount',remarks='$remarks',FULL_NAME='$name',FEE_HEAD='$fee_head',PAYMENT_MODE='$payment_mode',AMOUNT_IN_WORDS='$amount_in_words',Month_Of_Payment='$month_of_payment',CHEQUE_NO='$cheque_no',TIMINGS='$timings',INPUTTER='$inputter' where id='$hiddenID'";

        $exec = mysqli_query($conn,$qry);
        if($exec==true)
        {
            echo "
                    <script>
                    swal.fire({
                    title: 'UPDATED!',
                    text: 'Data has been updated successfully...!',
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
                    text: 'Data updation failed..',
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>