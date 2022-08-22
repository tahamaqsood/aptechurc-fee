<?php
session_start();
include('db_connect.php');
include('header.php');
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
$query = "select * from users where id='$id'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);
?>
<body>
    <div class="container" style="margin-top:50px;">
        <div class="row">
        <div class="col-md-12">


                    <div class="form-group">
                        <div class="col-lg-12">
                    <img src="assets/uploads/Fee Receipt Logo.png">
                        <div class="col-lg-8 float-left" >
                    <h1 class="uni-title">UNIVERSITY ROAD CENTER</h1>
                </div>
            </div>
</div>

                           
                    <div class="container" style="margin-top:120px;">
                    <div class="row">
                    <div class="col-md-12 mx-auto">
                    <div class="form-group">
                    <!-- Form -->
                    <form action="EditUsers.php" method="post">
                    <!-- For Hidden Id -->
                    <input type="hidden" name="hiddenID" value="<?php echo $data['id']; ?>">
                    
                    <!-- Name -->
                    <div class="col-lg-6">
                    <label for="" style="font-weight:900">NAME</label>
                    <input type="text" style="font-weight:900" name="name" value="<?php echo $data['name']; ?>" class="form-control" required>
                    </div>

                    <!-- Username -->
                    <div class="col-lg-6">
                    <label for="" style="font-weight:900">USERNAME</label>
                    <input type="text" style="font-weight:900" name="username" value="<?php echo $data['username']; ?>" class="form-control" required>
                    </div>

                    <!-- Password -->
                    <div class="col-lg-6">
                    <label for="" style="font-weight:900">PASSWORD</label>
                    <input type="password" style="font-weight:900" placeholder="Enter Password" name="password" value="<?php echo $data['password']; ?>" class="form-control" required>
                    </div>

                    <!-- Role -->
                    <div class="col-lg-6">
                    <label for="" style="font-weight:900">ROLE</label>
                    <select name="type" style="font-weight:900" class="form-control" placeholder="Select Type" required>
                        <?php
                        if($data['type']==1)
                        {
                            echo'<option value="1" selected>Admin</option>
                            <option value="2">Staff</option>';
                        }
                        else if($data['type']==2)
                        {
                            echo'<option value="1">Admin</option>
                            <option value="2" selected>Staff</option>';

                        }
                       
                        ?>
                    </select>
                    </div></div> 

                    <!-- Update Button -->
                    <div class="form-group">
                    <div class="col-lg-6">
                    <br>
                    <input type="submit" value="Update" name="BtnUpdate" class="btn btn-info">
                    </form>
                    </div></div></div>
                    



    <?php
    if(isset($_POST['BtnUpdate']))
    {
        $hiddenID = $_POST['hiddenID'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = MD5($_POST['password']);
        $type = $_POST['type'];

        $qry = "update users set name='$name',username='$username',password='$password',type='$type' where id='$hiddenID'";
        $exec = mysqli_query($conn,$qry);
        if($exec==true)
        {
            echo "
                    <script>
                    swal.fire({
                    title: 'UPDATED!',
                    text: 'User has been updated successfully...!',
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
                    title: 'Error Occured!',
                    text: 'User not updated.',
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>