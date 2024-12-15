      <?php require('top.inc.php'); ?>
      <?php require('functions.inc.php'); ?>
     <!-- body -->
     <center><h2>Products</h2></center>
      
      <hr>
       <!-- ShowRoom -->
  <div class="container-fluid">
    <div class="px-lg-5">
  
      <div class="row">
        <?php 
        $get_product = get_product($con,20);
        foreach($get_product as $list) {
          ?>
        <!-- Gallery item -->
        <div class="col-xl-3 col-lg-4 col-md-6 mb-4 text-center">
          <div class="bg-white rounded shadow-sm"><a href="product.php?id=<?php echo $list['id'] ?>"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'] ?>" class="img-fluid card-img-top" height="250rem"></a>
            <div class="p-4">
              <h4 class="card-title"> <?php echo $list['name'] ?> </h4>
              <p class="product-price" style="font-size:22px;">Rs.<?php echo $list['mrp'] ?> </p>
            </div>
          </div>
        </div>
        <!-- End -->
         <?php } ?>
      </div>
    </div>
  </div> 
   <?php require('footer.inc.php'); ?>