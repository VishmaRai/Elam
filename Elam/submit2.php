<?php
require('top.inc.php');
require('functions.inc.php');
require('config.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
	?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}
$cart_total = 0;
$total_price = 0;
    $address = get_safe_value($con, $_POST['address']);
    $city = get_safe_value($con, $_POST['city']);
    $pincode = get_safe_value($con, $_POST['pincode']);
    $user_id = $_SESSION['USER_ID'];

    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($con, '', '', $key);
        $price = $productArr[0]['price'];
        $qty = $val['qty'];
        $cart_total = $cart_total + ($price * $qty);
    }

    $total_price = $cart_total;
    $payment_status = 'paid';
    $order_status = '1';
    $added_on = date('Y-m-d h:i:s');
            
    mysqli_query($con, "insert into `order`(user_id,address,city,pincode,total_price,payment_status,order_status,added_on) values('$user_id','$address','$city','$pincode','$total_price','$payment_status','$order_status','$added_on')");

    $order_id = mysqli_insert_id($con);
    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($con, '', '', $key);
        $price = $productArr[0]['price'];
        $qty = $val['qty'];
       
        mysqli_query($con, "insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
        
    }
    unset($_SESSION['cart']);   
    $userArr=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_id'"));
    
    if(isset($_POST['stripeToken'])){
        \Stripe\Stripe::setVerifySslCerts(false);
    
        $token=$_POST['stripeToken'];
    
        $data=\Stripe\Charge::create(array(
            "amount"=>$total_price,
            //"coutomer"=>$userArr['name'],
           // "id"=>$user_id,
           // "city"=>$city,
           //"email"=>$userArr['email'],
           // "phone"=>$userArr['mobile'],
            "currency"=>"usd",
            "source"=>$token,
        ));
    
        header("Location:payment_complete.php");
        die();
    }
    ?>