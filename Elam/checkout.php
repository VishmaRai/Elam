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
foreach ($_SESSION['cart'] as $key => $val) {
    $productArr = get_product($con, '', '', $key);
    $price = $productArr[0]['price'];
    $qty = $val['qty'];
    $cart_total = $cart_total + ($price * $qty);
}
?>
    <!-- stripe integration -->
<h1>
    Address Information for delivery.
</h1>
<form method="post"  action="submit2.php">
    <div class="form-row"style="padding: 10px;">
        <div class="col-7" style="padding: 10px;">
            <input type="text" name="address" class="form-control" placeholder="Address" required>
        </div>
        <div class="col-7" style="padding: 10px;">
            <input type="text" name="city" class="form-control" placeholder="City" required>
        </div>
        <div class="col-7" style="padding: 10px;">
            <input type="text" name="pincode" class="form-control" placeholder="Zip" required>
        </div>
    </div>
    <script
		src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		data-key="<?php echo $publishableKey?>"
		data-amount="<?php echo $cart_total ?>"
		data-name="Elam"
		data-description="Online Payment with stripe"
		data-currency="usd"
		data-email=""
	>
	</script>
</form>

<?php require('footer.inc.php') ?>