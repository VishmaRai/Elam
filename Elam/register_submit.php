<?php 
require('connection.inc.php'); 
require('functions.inc.php');
$name = get_safe_value($con, $_POST['name']);
$email = get_safe_value($con, $_POST['email']);
$mobile = get_safe_value($con, $_POST['mobile']);
$password = get_safe_value($con, $_POST['password']);

$check_user = mysqli_num_rows(mysqli_query($con,"select * from users where email='$email' and mobile='$mobile'"));
if ($check_user > 0) {
    echo"Email or phone number already exists. Please enter new email or phone number.";
    ?><a href="register.php">click here</a>
    <?php
}else{
$added_on = date("Y-m-d h:i:s");
mysqli_query($con,"insert into users(name,email,mobile,password,added_on) values('$name','$email','$mobile','$password','$added_on')");
   echo "Successfully inserted new email or phone number";
   echo " Go to hompage and login.";
   ?><a href="index.php">click here</a><?php
}
?>
