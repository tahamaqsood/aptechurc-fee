<?php include('db_connect.php');?>
<?php if($_SESSION['type'] == 2){header("Location:login.php"); } ?>
<style>
	input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.3); /* IE */
  -moz-transform: scale(1.3); /* FF */
  -webkit-transform: scale(1.3); /* Safari and Chrome */
  -o-transform: scale(1.3); /* Opera */
  transform: scale(1.3);
  padding: 10px;
  cursor:pointer;
}
/* button.btn.btn-danger.delete_student {
    background-color: yellow;
    border: 2px solid yellow;
}
button.btn.btn-danger.delete_student:clic{
	background-color: blue;
} */
</style>

<div class="container-fluid">
	
	<div class="col-lg-12"style="position: relative; top: 32px;">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Students </b>
						<span class="float:right"><a class="btn btn-primary col-md-1 col-sm-6 float-right" href="javascript:void(0)" id="new_student">
					<i class="fa fa-plus"></i> New 
				</a></span>
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">Index No</th>
									<th class="">ID No</th>
									<th class="">Name</th>
									<th class="">Information</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$student = $conn->query("SELECT * FROM student order by id_no desc ");
								while($row=$student->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td>
										<?php echo $row['id_no'] ?>
									</td>
									<td>
									<?php echo ucwords($row['name']) ?>
									</td>
									<td class="text-left">
									     <p>Father Name: <?php echo $row['father_name'] ?></p>
										 <p>Email: <?php echo $row['email'] ?></p>
										 <p>Contact: <?php echo $row['contact'] ?></p>
										 <p>Address: <?php echo $row['address'] ?></p>
										 <p>Timings: <?php echo $row['timings'] ?></p>
										 <p>Course: <?php echo $row['course'] ?></p>
										 <p>Admission Fee: <?php echo $row['admission_fee'] ?></p>
										 <p>Tution Fee: <?php echo $row['monthly_fee'] ?></p>
										<?php endwhile; ?>
									</td>
								</tr>
								
							</tbody>

						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		/* max-width:100px; */
		max-height: 150px;
	}
</style>

<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	$('#new_student').click(function(){
		uni_modal("New Student ","manage_student.php","mid-large")
		
	})
	$('.edit_student').click(function(){
		uni_modal("Manage Student  Details","manage_student.php?id="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.delete_student').click(function(){
		_conf("Are you sure to delete this Student ?","delete_student",[$(this).attr('data-id')])
	})
	function delete_student($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_student',
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
