<?php
session_start();
include('db_connect.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Print Receipt</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    bottom: 27px;
float: right;
    font-weight: bold;
}
.ofc {
    left: 510px;
    position: relative;
    bottom: 33px;

    float: right;
}
.form-group {
    position: relative;
    top: -42px;
}

.col-sm-6 {
    float: left;
}h6 {
    font-weight: bold;
    position: relative;
    top: 9px;
}
h6.lst {
    position: relative;
    text-align: center;
    float: left;
    left: 239px;
    top: -100px;
}
h6.lst2 {
    position: relative;
    /* bottom: 76px; */
    top: -17px;
    text-align: center;
    left: -64px;
}
.signn {
    position: relative;
    left: 800px;
    top: -24px;
    width: 210px;
}
.signn2 {
    position: relative;
    left: 800px;
    top: -93px;
    width: 210px;
}
hr {
    position: relative;
    height: -8px;
    height: 1px;
    background-color: black;
    bottom: -7px;
    width: 90%;
}
.signline {
    position: relative;
    width: 310px;
    left: 710px;
    height: 1px;
    top: -14px;
}.signline2 {
    position: relative;
    width: 310px;
    left: 710px;
    top: -82px;
    height: 1px;
}
.col-lg-12{
    float:right;
}
h4 {
    position: relative;
    font-size: 1.5rem;
    top: 2px;
    left: 13px;
}
h6.std {
    position: relative;
    
    top: -19px;
    left: 13px;
}
.container {
    margin-left: 40px;
    position: relative;
    top: 6px;
}
form.std_form {
    position: relative;
    top: -25px;
}
button#printButton {
    position: absolute;
    top: -945px;
    left: 584px;
    max-height: 38px;
    width: 110px;
}.form-control:disabled, .form-control[readonly] {
    background-color: #e9ecef;
    opacity: 1;
    border: 1px solid;
    font-weight: bold;
    color: black;
}a.btn.btn-secondary {
    position: absolute;
    top: -945px;
    width: 110px;
    left: 445px;
}
</style>  
</head>
<?php
$id = $_GET['id']??"";
$query = "select * from payments where ef_id='$id'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);
?>
<body>
    <!-- Office Use -->
    <div id="margin" class="margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="post">
                    <img src="assets/uploads/Fee Receipt Logo.png">
                    <div class="form-group">
                        <div class="" >
                    <h1 class="uni-title">UNIVERSITY ROAD CENTER</h1>
                    <!-- <a href="logout.php" class="btn btn-danger">logout</a> -->
                </div>
            </div>
                    <h6 class="ofc">Office copy</h6>
                            <br><br>
                    <div class="row">
                <div class="col-sm-6">
                    <h6>RECEIPT NO</h6>
                    <input type="number" name="receipt_no" value="<?php echo $data['Receipt_no']; ?>" class="form-control" disabled required>
                </div>
                <div class="col-sm-6">
                <h6 >RECEIVING DATE</h6>
                            <input type="text" name="date" value="<?php echo date("d,M,Y H:i A",strtotime($data['date_created'])) ?>" class="form-control" disabled required>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                    <h6 >NAME</h6>
                    <input type="text" name="name" value="<?php echo $data['FULL_NAME']; ?>" class="form-control" disabled required>
                </div>
                <div class="col-sm-6">
                <h6 >MONTH OF PAYMENT</h6>
                            <?php
                            if($data['Month_Of_Payment']!="" && $data['Month_Of_Payment']!=null)
                            {
                                ?> 
                                <input type="text" value="<?php echo $data['Month_Of_Payment']; ?>" class="form-control" disabled>
                                <?php
                            }
                            ?>
                              
                            </div></div>
                            <div class="row">
                <div class="col-sm-6">      
                    <h6 >FEE HEAD</h6>
                    <input type="text" name="fee_head" value="<?php echo $data['FEE_HEAD']; ?>" class="form-control" disabled required>
                </div>
                 <div class="col-sm-6">
                                <h6 >CHEQUE NO</h6>
                                <input type="text" name="cheque_no" value="<?php echo $data['CHEQUE_NO']; ?>" class="form-control" disabled value="-">
                            </div></div>
                            <div class="row">
                            <div class="col-sm-6">
                    <h6 >PAYMENT MODE</h6>
                    <?php 
                    if($data['PAYMENT_MODE']=='Cash')
                    {
                        echo "<input type='text' disabled class='form-control' value='Cash'";
                    }
                    else if($data['PAYMENT_MODE']=='Cheque')
                    {
                        echo "<input type='text' disabled class='form-control' value='Cheque'";
                    }
                    ?>
                    <input type="text" name="payment_mode" class="form-control" value="">
                </div>
                    
                
                <div class="col-sm-6">
                <h6 >TIMINGS</h6>
                    <?php
                    if($data['TIMINGS']!='' && $data['TIMINGS']!=null)
                    {
                        ?>
                        <input list="timings" value="<?php echo $data['TIMINGS']; ?>" name="timings" placeholder="Select" disabled class="form-control"/>
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

                            </div></div>

                            <div class="row">
                                
                <div class="col-sm-6">
                            <h6 >AMOUNT</h6>
                            <input type="number" disabled name="amount" value="<?php echo $data['amount']; ?>" class="form-control" required>
                        </div>
                            <div class="col-sm-6">
                                <h6 >RECIEVED BY</h6>
                                <input type="text" disabled name="inputter" value="<?php echo $_SESSION['name']; ?>" class="form-control">
                            </div> </div>

                            <div class="row">
                            <div class="col-sm-6">
                                <h6 >AMOUNT IN WORDS</h6>
                                <input type="text" disabled name="amount_in_words" value="<?php echo $data['AMOUNT_IN_WORDS']; ?>" class="form-control">
                            </div> 

                            <div class="col-sm-6">
                            <h6 >REMARKS</h6>
                                <input type="text" name="remarks" value="<?php echo $data['remarks']; ?>" class="form-control" disabled required>
                            </div>

<div class="col-lg-12">
                              <h6 >* Cheques subject to realization</h6>
                              <h6 >* This receipt must be produced when demanded</h6>
                              <h6 >* Fee once paid is not refundable</h6>
</div>
                              <div class="form-group">
                                <div class="col-sm-8">
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



    <!-- Student Copy -->
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <form method="post" class="std_form">
                    <img src="assets/uploads/Fee Receipt Logo.png">
                    <div class="form-group">
                        <div class="" >
                    <h1 class="uni-title">UNIVERSITY ROAD CENTER</h1>
                    <!-- <a href="logout.php" class="btn btn-danger">logout</a> -->
                </div>
            </div>
                    <h6 class="ofc">Student Copy</h6>
                            <br><br>
                    <div class="row">
                <div class="col-sm-6">
                    <h6>RECEIPT NO</h6>
                    <input type="number" name="receipt_no" value="<?php echo $data['Receipt_no']; ?>" class="form-control" disabled required>
                </div>
                <div class="col-sm-6">
                <h6 >RECEIVING DATE</h6>
                            <input type="text" name="date" value="<?php echo date("d M,Y H:i A",strtotime($data['date_created'])) ?>" class="form-control" disabled required>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                    <h6 >NAME</h6>
                    <input type="text" name="name" value="<?php echo $data['FULL_NAME']; ?>" class="form-control" disabled required>
                </div>
                <div class="col-sm-6">
                <h6 >MONTH OF PAYMENT</h6>
                            <?php
                            if($data['Month_Of_Payment']!="" && $data['Month_Of_Payment']!=null)
                            {
                                ?> 
                                <input type="text" value="<?php echo $data['Month_Of_Payment']; ?>" class="form-control" disabled>
                                <?php
                            }
                            ?>
                            </div></div>
                            <div class="row">
                <div class="col-sm-6">      
                    <h6 >FEE HEAD</h6>
                    <input type="text" name="fee_head" value="<?php echo $data['FEE_HEAD']; ?>" class="form-control" disabled required>
                </div>
                 <div class="col-sm-6">
                                <h6 >CHEQUE NO</h6>
                                <input type="text" name="cheque_no" value="<?php echo $data['CHEQUE_NO']; ?>" class="form-control" disabled value="-">
                            </div></div>
                            <div class="row">
                            <div class="col-sm-6">
                    <h6 >PAYMENT MODE</h6>
                    <?php 
                    if($data['PAYMENT_MODE']=='Cash')
                    {
                        echo "<input type='text' disabled class='form-control' value='Cash'";
                    }
                    else if($data['PAYMENT_MODE']=='Cheque')
                    {
                        echo "<input type='text' disabled class='form-control' value='Cheque'";
                    }
                    ?>
                    <input type="text" name="payment_mode" class="form-control" value="">
                </div>
                    
                
                <div class="col-sm-6">
                <h6 >TIMINGS</h6>
                    <?php
                    if($data['TIMINGS']!='' && $data['TIMINGS']!=null)
                    {
                        ?>
                        <input list="timings" value="<?php echo $data['TIMINGS']; ?>" name="timings" placeholder="Select" disabled class="form-control"/>
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

                            </div></div>

                            <div class="row">
                                
                <div class="col-sm-6">
                            <h6 >AMOUNT</h6>
                            <input type="number" disabled name="amount" value="<?php echo $data['amount']; ?>" class="form-control" required>
                        </div>
                            <div class="col-sm-6">
                                <h6 >RECIEVED BY</h6>
                                <input type="text" disabled name="inputter" value="<?php echo $_SESSION['name']; ?>" class="form-control">
                            </div> </div>

                            <div class="row">
                            <div class="col-sm-6">
                                <h6 >AMOUNT IN WORDS</h6>
                                <input type="text" disabled name="amount_in_words" value="<?php echo $data['AMOUNT_IN_WORDS']; ?>" class="form-control">
                            </div>  

                            <div class="col-sm-6">
                            <h6 >REMARKS</h6>
                                <input type="text" name="remarks" value="<?php echo $data['remarks']; ?>" class="form-control" disabled required>
                          
                            </div>

                            <!-- <div class="col-sm-6">
                                <h6 >Student EF ID</h6>
                                <input type="number" disabled name="ef_id" value="<?php echo $data['ef_id']; ?>" class="form-control">
                            </div>-->  
                        </div> 

                          
</div>
<div class="col-lg-12">
                              <h6 class="std" >* Cheques subject to realization</h6>
                              <h6 class="std" >* This receipt must be produced when demanded</h6>
                              <h6 class="std" >* Fee once paid is not refundable</h6>
</div>
                              <div >
                            
                                <hr class="signline2"/>
                              <h6 class="signn2">Issuing Signature</h6>
                             
                            </div>
                      <div>
                              <h6 class="lst2">1st Floor-Bell Arcade, Block-1, Main University Road, Opp. Unversity of Karachi.
                             <br>
                              URL: www.aptech-education.com.pk Tel:021-3466922-3, 0336-2197164</h6>
                            </div> 

                         <div class="col-sm-6">                           
                                <button class="btn btn-success" id="printButton" type="button" onclick="PrintNow()"> Print <i class='fa fa-print'></i></button>  
                                <a href="./index.php?page=payments" class="btn btn-secondary" id="backButton" type="button"> Home <i class="fa fa-home"></i></a>
                            </div>   
                          </form>
                        </div>
            </div>
        </div>
    </div>
   
    
    
   
    <!-- Using Javascript to print page -->
    <script type="text/javascript">     
    
    function PrintNow() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printButton");
        var backButton = document.getElementById("backButton");        
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        backButton.style.visibility = 'hidden';
      
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
        backButton.style.visibility = 'visible';
    }
 </script>
 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>