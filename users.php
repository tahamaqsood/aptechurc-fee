
<?php
include('db_connect.php');
?>
<div class="container-fluid">
	
	<div class="row">
	<div class="col-lg-12">
			
	</div>
	</div>
	<br>
	<div class="col-lg-12"style="position: relative; top: 75px;">
		<div class="card ">
			<div class="card-header"><b>User List</b>

				<button class="btn btn-primary float-right col-md-2 col-sm-6 " id="new_user"><i class="fa fa-plus"></i> New user</button></div>

			<div class="card-body">
				<table class="table-striped table-bordered">
			<thead>
				<tr>
					<th class="text-center">Index No</th>
					<th class="text-center">Name</th>
					<th class="text-center">Username</th>
					<th class="text-center">Roles</th>
					<th class="text-center">Operations</th>
				</tr>
			</thead>
			<tbody>
				<?php	
 					$i = 1;
 					$query = "select * from users order by name asc";
					$result = mysqli_query($conn,$query);
					while($data=mysqli_fetch_assoc($result))
					{
						?> 
						<tr>
				 	    <td class="text-center"> <?php echo $i++ ?> </td>

						<td class="text-center"> <?php echo $data['name']; ?> </td>

						<td class="text-center"> <?php echo $data['username']; ?> </td>

						<td class="text-center"> <?php if($data['type']==1) { echo "Admin"; } else if($data['type']==2) { echo "Staff"; } ?> </td>

						<td class="text-center">
										<?php
										echo "<a href='EditUsers.php?id=$data[id]' class='btn btn-info'><i class='fa fa-edit'></i></a>";
										?> &nbsp;
										<?php
										echo "<a href='DeleteUsers.php?id=$data[id]' onclick='return Confirmation()' class='btn btn-danger'><i class='fa fa-trash'></i></a>";
										?> &nbsp;
						<?php
					}
				 ?>
				 </tr>
				
			</tbody>

		</table>
			</div>
		</div>
	</div>

</div>

<script>
	$('table').dataTable();
$('#new_user').click(function(){
	uni_modal('New User','manage_user.php')
})

function Confirmation()
{
	return confirm('Are you sure you want to delete this record?');
}
</script>
