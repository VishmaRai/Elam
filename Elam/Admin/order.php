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

$sql = "select * from users order by id desc";
$res = mysqli_query($con, $sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Orders </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Order ID</th>
                                        <th class="product-name"><span class="nobr">Order Date</span></th>
                                        <th class="product-price"><span class="nobr"> Address </span></th>
                                        <th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
                                        <th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //$uid = $_SESSION['USER_ID'];
                                    $res = mysqli_query($con, "select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status order by `order`.id desc");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                        <tr>
                                            <td class="product-add-to-cart"><a
                                                    href="order_details.php?id=<?php echo $row['id'] ?>">
                                                    <?php echo $row['id'] ?>
                                                </a>
                                                <br />
                                            </td>
                                            <td class="product-name">
                                                <?php echo $row['added_on'] ?>
                                            </td>
                                            <td class="product-name">
                                                <?php echo $row['address'] ?><br />
                                                <?php echo $row['city'] ?><br />
                                                <?php echo $row['pincode'] ?>
                                            </td>
                                            <td class="product-name">
                                                <?php echo $row['payment_status'] ?>
                                            </td>
                                            <td class="product-name">
                                                <?php echo $row['order_status_str'] ?>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
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