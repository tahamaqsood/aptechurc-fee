<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
img.aplogo {
    position: relative;
    width: 250px;
    float: left;
    top: -29px;
    left: -27px;
}

</style>
<div id="page">
</div>


<div id="loading"></div>
<nav class="navbar navbar-light fixed-top">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12"style="position: relative; top: 32px;">
    <a href="./index.php?page=payments" class="text-center mb-5"><img  src="assets/uploads/aptechlogo.png"class="aplogo";></a>
	  	<div class="float-right">
        <div class=" dropdown mr-4">
            <a href="javascript:void(0)" id="manage_my_account" class="text-dark dropdown-toggle text-uppercase"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> </a>
              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -5.5em;">
                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
              </div>
        </div>
      </div>
  </div>
  
</nav>


<script>
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
</script>
 