<?php 
require('connection.inc.php'); 
require('functions.inc.php');
  $login_email = get_safe_value($con, $_POST['login_email']);
  $login_password = get_safe_value($con, $_POST['login_password']);
  $sql = "select * from users where email = '$login_email' and password = '$login_password'";
  $res = mysqli_query($con, $sql);// it will execute the $sql query and return the rows in res.
  $count = mysqli_num_rows($res);//returns the number of rows in a res set
  if($count > 0){
    $_SESSION['USER_LOGIN'] = 'yes';
    $_SESSION['USER_ID'] = $row['id'];
    $_SESSION['USER_NAME'] = $row['name'];
    $_SESSION['USER_EMAIL'] = $row['email'];
     header('location: index.php');
  }else{
    echo "Sorry, Username or Password was incorrect. Please enter correct login details.";
  }
?>