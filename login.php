<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
// if(!isset($_SESSION['system'])){
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach($system as $k => $v){
		$_SESSION['system'][$k] = $v;
	}
// }
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" type="image/x-icon" href="assets/uploads/favicon.png>
  

<?php include('./header.php'); 
include('./footer.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    position: fixed;
	    top:0;
	    left: 0
	    /*background: #007bff;*/
	}
.aplogo{max-width: 300px;}

main#main {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    background-image: url(assets/uploads/background.jpg);
    background-size: 100% 100%;
}

	@media only screen and (min-width: 768px) and (max-width: 959px){
		.aplogo{max-width: 141px;}
}
</style>

<body class="bg-dark">


  <main id="main" >
  	
  	<div class="align-self-center w-100">
		
  		<div id="login-center" align="center">
  			<div class="card col-md-3">
  				<div class="card-body">
  					<!-- <h1 class="text-center mb-5"><img src="assets/uploads/aptechlogo.png"class="aplogo";></h1> -->
  				
  					<form method="post" action="" id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" placeholder="Enter Username" class="form-control" required>
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" placeholder="Enter Password" class="form-control" required>
  						</div>

						  <div class="form-group">
						  <label for="Role" class="control-label">Role</label>
						  <input list="Role" id="Rolee" placeholder="Select Role" name="Role" class="form-control" required/>
                          <datalist id="Role">
                          <option value="1">Admin</option>
                          <option value="2">User</option>
                          </datalist>
  						</div>
  						
  						<!-- <button name="LoginBtn" class="btn btn-outline-primary btn-block">Login Now</button> -->
						<input type="submit" value="Login" name="LoginBtn" class="btn btn-outline-primary btn-block">
  						<br>
  						<label class="control-label"><a href="https://aptech-education.com.pk/" target="_blank">Aptech | University Road Center</a>
  					</form>
  				</div>
  			</div>
  		</div>
  		</div>
  </main>




</body>

<?php
if(isset($_POST['LoginBtn']))
{
	$username = $_POST['username'];
	$password = MD5($_POST['password']);
	$type = ($_POST['Role']);
	$query = "select * from users where username='$username' and password='$password' and type='$type'";
	$result = mysqli_query($conn,$query);
	$data = mysqli_fetch_assoc($result);
	$row = mysqli_num_rows($result);
	if($row==1)
	{
        $_SESSION['name'] = $data['name'];
		
	    echo "<script> window.location.href='index.php?page=payments'; </script>";
	}else{
		$_SESSION['type'] = $data['type'];
		    echo "<script> window.location.href='index.php?page=payments'; </script>";
	}
}
?>

<script>
	$('#login-form').submit(function(e){
		// e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=payments';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>
	
</html>