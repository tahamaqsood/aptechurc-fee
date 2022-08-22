


<?php 
session_start();
include('header.php');
include ('db_connect.php');
$id = $_GET['id']??"";
$std_name = $_GET['name']??"";
if(isset($_SESSION['name'])==null)
{
	header("Location:login.php");
}?>

<?php include 'topbar.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ledger</title>
</head>
<?php include 'navbar.php' ?>
  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
  
  <main id="view-panel" >
      <?php $page = isset($_GET['page']) ? $_GET['page'] :'payment_report'; ?>
  	<?php include $page.'.php' ?>
  	

  </main>
<div class="container">
    <div class="row">
            <div class="col-md-12">
                    <div class="form-group">
            </div> 

                            <div class="col-lg-4">
                            <label for="" class="mt-2">Student Name</label>
                            <h4 type="text" name="name" value="Data Not Fetched!" class="namstyl"><?php echo $std_name ?></h4>
            
                
              
                </div>
            </div>
            <hr>
            <div class="col-md-12">
                <table class="table table-bordered" id='report-list'>
                    <thead>
                    <tr>
<<<<<<< HEAD
                            <th class="text-center">Index No</th>
                            <th class="">Date</th>
                            <th >Remarks</th>
                            <th >Receipt No</th> 
=======
                            <th class="text-center">#</th>
                            <th class="">Date</th>
                            <th >Remarks</th>
                            <th >Receipt No.</th> 
>>>>>>> 1498833d43af9b5f09ab015f8544eac6bdbca9bc
                            <th class="">Paid Amount</th>
                        </tr>
                    </thead>
                   
                      <tbody>
			          <?php
                     

                      $i = 1;
                      $total = 0;
                      $payments = $conn->query("SELECT * FROM payments where  ef_id='$id' ");
                      if($payments->num_rows > 0):
			          while($row = $payments->fetch_array()):
                        $total += $row['amount'];
                        $d = $row['date_created'];
			          ?>
			          <tr>
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td>
<<<<<<< HEAD
                            <p> <?php echo date("d,M,Y H:i A",strtotime($row['date_created']))?></p>
=======
                            <p> <?php echo date("d,M,Y h:i A",strtotime($row['date_created']))?></p>
>>>>>>> 1498833d43af9b5f09ab015f8544eac6bdbca9bc
                        </td>
                        <td class="text-center">
                            <p><?php echo $row['remarks'] ?></p>
                        </td>
                        <td class="text-right">
                            <p><?php echo $row['Receipt_no'] ?></p>
                        </td>
                        <td class="text-right">
                            <p><?php echo number_format($row['amount'],2) ?></p>
                        </td>
                    </tr>
                    <?php 
                        endwhile;
                        else:
                    ?>
                    <tr>
                            <th class="text-center" colspan="5">No Data.</th>
                    </tr>
                    <?php 
                        endif;
                    ?>
			        </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-right">Total</th>
                            <th class="text-right"><?php echo number_format($total,2) ?></th>
                            
                        </tr>
                    </tfoot>
                </table>
                <hr>
                <div class="col-md-12 mb-4">
                    <center>
                        <button class="btn btn-success col-sm-3 col-md-2" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                    </center>
                </div>
            </div>
          </div>
      </div>
      </div>
</body>
<noscript>
	<style>
		table#report-list{
			width:100%;
			border-collapse:collapse
		}
		table#report-list td,table#report-list th{
			border:1px solid
		}
        p{
            margin:unset;
        }
		.text-center{
			text-align:center
		}
        .text-right{
            text-align:right
        }.row{
            position: relative;
            top:-30px;
        }.aptimg{
            position: relative;
            max-width: 180px;
            top:10px;
        }.dat{
            position: relative;
           top:-10px;
            text-align:right;
        }
	</style>
</noscript>
</html>
<?php 
$query2 = "select * from student where id_no='$id'";
$result2 = mysqli_query($conn,$query2);
$data = mysqli_fetch_assoc($result2);
$k = $data['course'];
$f = $data['father_name'];
 ?>
<script>

$('#print').click(function(){
		var _c = $('#report-list').clone();
		var ns = $('noscript').clone();
            ns.append(_c)
		var nw = window.open('','_blank','width=900,height=600')
        nw.document.write('<img class="aptimg" src="./assets/uploads/aptechlogo.png">')
        nw.document.write('<h1 class="text-right" style="position:relative; top:-50px;"><b>UNIVERSITY ROAD CENTER</b></h1>')
        nw.document.write('<p class="dat"><b>Date: <?php echo date("d/M/Y",strtotime($d)) ?> </b></p>')
        nw.document.write('<div class="row"><p class="text-left"><b>Student Name: <?php echo $std_name; ?></b></p>')
        nw.document.write('<p class="text-left"><b>Father Name: <?php echo $f; ?></b></p>')
        nw.document.write('<p class="text-left"><b>Student ID: <?php echo $id; ?></b></p>')
        nw.document.write('<p class="text-left"><b>Course: <?php echo $k; ?></b></p></div>')
        nw.document.write(ns.html())
		nw.document.close()
		nw.print()
		setTimeout(() => {
			nw.close()
		}, 500);
	})
</script>
