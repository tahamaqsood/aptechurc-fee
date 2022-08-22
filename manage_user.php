<?php 
include('db_connect.php');
include('header.php');
session_start();
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM users where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<style>
	button#submit {
    display: none;
}button.hello.btn.btn-danger{
    display: none;
}
	</style>
<div class="container-fluid">
	<div id="msg"></div>
	
	<form action="manage_user.php" method="post">	
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" placeholder="Enter Name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" placeholder="Enter Username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required  autocomplete="off">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" placeholder="Enter Password" id="password" class="form-control" value="" autocomplete="off">


			<div class="form-group">
			<label for="">User Type</label>
			<select name="type" id="" class="form-control" required>
				<option value="">Select Type</option>
				<option value="1">Admin</option>
				<option value="2">Staff</option>
			</select>
		</div>




			<?php if(isset($meta['id'])): ?>
			<small><i>Leave this blank if you dont want to change the password.</i></small>
		<?php endif; ?>
		</div>
		<?php if(isset($meta['type']) && $meta['type'] == 3): ?>
			<input type="hidden" name="type" value="3">
		<?php else: ?>
		<?php if(!isset($_GET['mtype'])): ?>
		<div class="form-group">
	
		<button type="button" class="2 btn btn-danger"  style="float:right;" data-dismiss="modal">Cancel</button> 
                
                <input type="submit" value="Submit" class="btn btn-primary"  style="float:right; margin-right:5px;" name="BtnSave">
		</div>
		<?php endif; ?>
		<?php endif; ?>
		

	</form>
</div>

<?php
if(isset($_POST['BtnSave']))
{
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = MD5($_POST['password']);
	$type = $_POST['type'];
	
	$query = "insert into users values(Null,'$name','$username','$password','$type')";
	$exec = mysqli_query($conn,$query);
	$_SESSION['decrypted_password'] = $_POST['password'];
        if($exec==true)
        {
            echo "
                    <script>
                    swal.fire({
                    title: 'NEW USER ADDED!',
                    text: 'User has been added successfully',
                    icon: 'success',
                    confirmButtonColor: 'blue',
                    timer:2000
                    }).then(function() {
                    window.location.href='index.php?page=users';
                    });
                    </script>";
        }
        else
        {
            echo "
                    <script>
                    swal.fire({
                    title: 'ERROR OCCURED',
                    text: 'Failed to add new user',
                    icon: 'error',
                    confirmButtonColor: 'blue',
                    timer:2000
                    }).then(function() {
                    window.location.href='index.php?page=users';
                    });
                    </script>";
        }
}
?>

<!-- <script>
	
	$('#manage-user').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_user',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}else{
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					end_load()
				}
			}
		})
	})

</script> -->
