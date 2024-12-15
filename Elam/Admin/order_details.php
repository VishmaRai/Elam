<?php
require('top.inc.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "delete from users where id='$id'";
        mysqli_query($con, $delete_sql);
    }
}
$order_id=get_safe_value($con,$_GET['id']);
if(isset($_POST['update_order_status'])){
	$update_order_status=$_POST['update_order_status'];
	mysqli_query($con,"update `order` set order_status='$update_order_status' where id='$order_id'");	
}

$sql = "select * from users order by id desc";
$res = mysqli_query($con, $sql);

?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Order Detail</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                        <table class="table">
                                        <thead>
                                            <tr>
                                            <th class="product-thumbnail">Product Name</th>
												<th class="product-thumbnail">Product Image</th>
                                                <th class="product-name">Qty</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-price">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											// $uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
                                            $total_price = 0;
											while($row=mysqli_fetch_assoc($res)){
                                                 $total_price=$total_price+($row['qty']*$row['price']);
											?>
                                            <tr>
                                            <td class="product-name"><?php echo $row['name']?></td>
                                                <td class="product-name"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" width="80%"></td>
												<td class="product-name"><?php echo $row['qty']?></td>
												<td class="product-name"><?php echo $row['price']?></td>
												<td class="product-name"><?php echo $row['qty']*$row['price']?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        
                                    </table>
                                    <div id="order_status" style="margin:20px;">
                                        <strong>Order Status: </strong>
                                        <?php
							              $order_status_arr = mysqli_fetch_assoc(mysqli_query($con,"select order_status.name,order_status.id as order_status from order_status,`order` where `order`.id='$order_id' and `order`.order_status=order_status.id"));
                                            echo $order_status_arr['name'];
                                         ?>

<div>
								<form method="post">
									<select class="form-control" name="update_order_status" id="update_order_status" required onchange="select_status()">
										<option value="">Select Status</option>
										<?php
										$res=mysqli_query($con,"select * from order_status");
										while($row=mysqli_fetch_assoc($res)){
											echo "<option value=".$row['id'].">".$row['name']."</option>";
										}
										?>
									</select>
									<div id="shipped_box" style="display:none">
										<table>
											<tr>
												<td><input type="text" class="form-control" name="length" placeholder="length"/></td>
												<td><input type="text" class="form-control" name="breadth" placeholder="Breadth"/></td>
												<td><input type="text" class="form-control" name="height" placeholder="height"/></td>
												<td><input type="text" class="form-control" name="weight" placeholder="weight"/></td>
											</tr>
										</table>
									</div>
									<input type="submit" class="form-control"/>
								</form>
							</div>
                                    </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('footer.inc.php');
?>