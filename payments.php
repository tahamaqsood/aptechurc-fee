<?php 
session_start();
include ('db_connect.php');
if(isset($_SESSION['name'])==null)
{
	header("Location:login.php");
}?>

<div class="container-fluid">
	<div class="col-lg-12"style=" position: relative; top: 30px;" >
		<div class="data mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="data">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Payments </b>
						<span class="float:right"><a class="btn btn-primary col-md-1 col-sm-6 float-right" href="javascript:void(0)" id="new_payment">
					<i class="fa fa-plus"></i> New 
				</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">Sr.No</th>
									<th class="text-center">Receipt No</th>
									<th class="text-center">Date</th>
									<th class="text-center">ID No.</th>
									<th class="text-center">EF No.</th>
									<th class="text-center">Name</th>
								    <th class="text-center">Operations</th>
									<!-- <th class="text-center">Action</th> -->
								</tr>
							</thead>
							<tbody>
								<?php 
								$qry = "select * from payments order by Receipt_no desc";
								$result = mysqli_query($conn,$qry);
								$i = 1;
								// $payments = $conn->query("SELECT p.*,p.FULL_NAME as pname ,p.Receipt_no as pReceipt_no ,s.name as sname, ef.ef_no,s.id_no FROM payments p inner join student on ef.id = p.id_no inner join student s on s.id = ef.student_id order by unix_timestamp(p.date_created) desc ");
								
								while($data = mysqli_fetch_assoc($result))
								{ 
									?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="text-center"><?php echo $data['Receipt_no'] ?></td>
									<td class="text-center">
										<p><?php echo date("d,M,Y H:i A",strtotime($data['date_created'])) ?></p>
									</td>
									<td class="text-center">
										<p><?php echo $data['id'] ?></p>
									</td>
									<td class="text-center">
										<p><?php echo $data['ef_id'] ?></p>
									</td>
									<td class="text-center">
										<p><?php echo ($data['FULL_NAME']) ?></p>
									</td>
									 <!-- <td class="text-center">
									 <p>  -->
										<!-- <?php echo number_format($data['amount'],2) ?> -->
									 <!-- </p>
									</td> -->
									<td class="text-center">
										<?php
										echo "<a href='StudentLedger.php?id=$data[ef_id]&name=$data[FULL_NAME]' class='btn btn-info'><i class='fa fa-eye'></i></a>";
										?> &nbsp;
										<?php
										echo "<a href='ViewAndPrint.php?id=$data[ef_id]' class='btn btn-success'><i class='fa fa-print'></i></a>";
										?> &nbsp;
										<?php if($_SESSION['login_type'] == 1)
											{
												echo "<a href='EditPayment.php?id=$data[ef_id]' class='btn btn-primary'><i class='fa fa-edit'></i></a>";
												?>&nbsp;
												<?php
												echo "<a class='btn btn-danger' onclick='return Confirmation()' href='DeletePayment.php?id=$data[Receipt_no]'><i class='fa fa-trash'></i></a>"; ?>&nbsp;
										<?php
											}
											?>
									</td>
								</tr>
<?php
								}
								?>
							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">     
    
    function Print() {
        //Get the print button and put it into a variable
        // var printButton = document.getElementById("printButton");
        //Set the print button visibility to 'hidden' 
        // printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.scale ='60';  
        // printButton.style.visibility = 'visible';
    }
 </script>
 
 <script>
	 function Confirmation()
    {
        return confirm('Are you sure you want to delete this record?');
    }

 </script>
<style>



	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		/* max-width:100px; */
		max-height:150px;
	}
</style>

<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	
	$('#new_payment').click(function(){
		uni_modal("New Payment ","manage_payment.php","mid-large")
		
	})

	$('.view_payment').click(function(){
		uni_modal("Payment Details","view_payment.php?ef_id="+$(this).attr('data-ef_id')+"&pid="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.edit_payment').click(function(){
		uni_modal("Manage Payment","manage_payment.php?id="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.delete_payment').click(function(){
		_conf("Are you sure to delete this payment ?","delete_payment",[$(this).attr('data-id')])
	})
	function delete_payment($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_payment',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>

