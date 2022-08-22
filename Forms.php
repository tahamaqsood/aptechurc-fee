<?php
include('db_connect.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
<body>
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-12">
                <form>
                    <img src="assets/uploads/Fee Receipt Logo.png">
                    <div class="form-group">
                        <div class="col-lg-8 float-left" >
                    <h1 class="uni-title">UNIVERSITY ROAD CENTER</h1>
                </div>
            </div>
                    <h6 class="ofc">Office copy</h6>
                            <div class="form-group">
                <div class="col-lg-6">
                    <h6>RECEIPT NO</h6>
                    <input type="number" class="form-control">
                </div>
                <div class="col-lg-6">
                            <h6 >DATE</h6>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-lg-6">
                    <h6 >NAME</h6>
                    <input type="text" class="form-control">
                </div>
                <div class="col-lg-6">
                                <h6 >REMARKS</h6>
                                <input type="text" class="form-control">
                            </div>
                <div class="col-lg-6">      
                    <h6 >FEE HEAD</h6>
                    <input type="text" class="form-control">
                </div>
                 <div class="col-lg-6">
                                <h6 >CHEQUE NO</h6>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-lg-6">
                    <h6 >PAYMENT MODE</h6>
                    <input type="text" class="form-control">
                </div>
                    
                <div class="col-lg-6">
                                <h6 >TIMINGS</h6>
                                <input type="text" class="form-control">
                            </div>
                                
                <div class="col-lg-6">
                            <h6 >AMOUNT</h6>
                            <input type="number" class="form-control">
                        </div>
                            <div class="col-lg-6">
                                <h6 >INPUTTER</h6>
                                <input type="text" class="form-control">
                            </div> 
                            <div class="col-lg-6">
                                <h6 >AMOUNT IN WORDS</h6>
                                <input type="text" class="form-control">
                                
                            </div>  
</div></div>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>