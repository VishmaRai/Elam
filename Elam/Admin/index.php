<?php
require('connection.inc.php');
require('functions.inc.php');
$msg = '';
if(isset($_POST['submit'])){
  $username = get_safe_value($con, $_POST['username']);
  $password = get_safe_value($con, $_POST['password']);
  $sql = "select * from admin_user where user_name = '$username' and password = '$password'";
  $res = mysqli_query($con, $sql);// it will execute the $sql query and return the rows in res.
  $count = mysqli_num_rows($res);//returns the number of rows in a res set
  if($count > 0){
     $_SESSION['ADMIN_LOGIN'] = 'yes';
     $_SESSION['ADMIN_USERNAME'] = $username;
     header('location: users.php');
  }else{
    $msg = "Sorry, Username or Password was incorrect. Please enter correct login details.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<div class="formGroup">
<form class="mx-auto" method="post">
<h1 class="text-center" style="font-size: 30px;">Admin Login</h1>
<div class="form-group">
  <input type="text" class="form-control mt-2" id="username" name="username"  placeholder="Username" required>
</div>
<div class="form-group">
  <input type="password" class="form-control mt-2" id="password" name="password" placeholder="Password" required>
</div>
  <button type="submit" name="submit" class="btn btn-primary mt-4">LogIn</button>
</form>
<div style="color:red; margin:15px;"><?php echo $msg; ?></div>
</div>

</body>
</html>
