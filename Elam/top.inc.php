<?php require('connection.inc.php');
require('add_to_cart.inc.php'); 
$cat_res = mysqli_query($con, "select * from categories where status = 1");
$cat_arr = array();// putting the data into array called '$cat_arr' after fetching from database(table = categories ).
while ($row = mysqli_fetch_assoc($cat_res)) {
  $cat_arr[] = $row;
}
$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utaliceblue;-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Elam</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="/images/faviconn.ico">
  <link rel="stylesheet" href="sytle.css">
  <script src="scripts.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<!-- here 'overflow' helps to freez website when you click login button through the help of JS -->

<body style="background-color: #EEEDEB; overflow:visible;">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <div class="overly" id="overly" onclick="ClosePopup()"></div>
  <!-- Nav bar -->
  <nav class="navbar navbar-expand-lg " style="background-color:#BED3E1;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="media/images/logo.jpg" width="120" height="120"
          alt="ilam_logo"></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto order-5">
          <?php if (isset($_SESSION['USER_LOGIN'])) {
            echo '<a href="my_order.php" style="font-size: 21px;font-weight: bold; color:black; margin-right:10px;">My Order</a>';
            echo '<a href="logout.php" style="font-size: 20px;color:red;font-weight: bold;">Logout</a>';
          } else {
           echo ' <span class="nav-link" style="font-size: 20px;font-weight: bold; cursor: pointer;"
            onclick="OpenPopup()">Login</span>';
          }
          ?>
          
          <a class="nav-cart" href="cart.php"><img src="media/images/cart.svg" width="40" height="40" alt="cart_logo">
            <span class="badge bg-secondary"id="counter"><?php echo $totalProduct ?></span>
          </a>
        </div>
      </div>
    </div>
  </nav>
  <br>