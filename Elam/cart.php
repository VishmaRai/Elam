<?php
require('top.inc.php');
require('functions.inc.php');
?>
<!-- cart-main-area start -->
<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">products</th>
                                    <th class="product-name">name of products</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cart_total = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $key => $val) {

                                        $productArr = get_product($con, '', '', $key);
                                        $pname = $productArr[0]['name'];
                                        $mrp = $productArr[0]['mrp'];
                                        $price = $productArr[0]['price'];
                                        $image = $productArr[0]['image'];
                                        $qty = $val['qty'];
                                        $cart_total = $cart_total + ($price * $qty);
                                        ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img
                                                        src="<?php echo PRODUCT_IMAGE_SITE_PATH . $image ?>" width="80%" /></a>
                                            </td>
                                            <td class="product-name"><a href="#">
                                                    <?php echo $pname ?>
                                                </a>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount">
                                                    Rs.
                                                    <?php echo $price ?>
                                                </span></td>
                                            <td class="product-quantity"><input type="number" min="1" id="<?php echo $key ?>qty"
                                                    value="<?php echo $qty ?>" />
                                                <br /><a href="javascript:void(0)"
                                                    onclick="manage_cart('<?php echo $key ?>','update')">update</a>
                                            </td>
                                            <td class="product-subtotal">
                                                Rs.
                                                <?php echo $qty * $price ?>
                                            </td>
                                            <td class="product-remove"><a href="javascript:void(0)"
                                                    onclick="manage_cart('<?php echo $key ?>','remove')"><img
                                                        src="media/images/trash.svg"></a></td>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h4>Total Amount: Rs.
                                <?php echo $cart_total ?>
                            </h4>
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="<?php echo SITE_PATH ?>">Continue Shopping</a>
                                </div>
                                <div class="buttons-cart checkout--btn">
                                    <?php if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] != '') {
                                      ?>  <a href="<?php echo SITE_PATH ?>checkout.php">checkout</a>
                                      <?php
                                    } else {
                                        
                                    } ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <input type="hidden" id="sid">
<input type="hidden" id="cid"> -->


<?php require('footer.inc.php') ?>