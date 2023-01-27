<?php include('inc/header.php');?>
<?php
//session_start();

require_once('classes/product.php');
require_once('classes/helpers/str.php');

use helpers\str;

$prod = new Products;
$products =$prod->getAll();
?>
<div class="containr my-5">
    <div class="row">
        <?php if($products !== [] ) {?>
            <?php foreach($products as $product){ ?>
        <div class="col-lg-4">


                <div class="card">
        <img src="images/<?php echo $product['img'];?>" class="card-img-top" >
        <div class="card-body">
            <h5 class="card-title"><?php echo $product['name'];?></h5>
            <p class="text-muted">$<?php echo $product['price'];?></p>
            <p class="card-text"><?php echo Str::limit($product['desc']);?></p>

            <a href="show.php?id=<?php echo $product['id'];?>" class="btn btn-primary">Show</a>
            <?php if(isset($_SESSION['id'])) {?>
            <a href="edit.php?id=<?php echo $product['id'];?>" class="btn btn-info">Edit</a>
            <a href="handlers/handelDelete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger">Delete</a>
            <?php } ?>
        </div>
        </div>
     </div>
      
</div>
    <?php } ?>
    <?php }else echo "NO Product Found"?>
</div>


<?php include('inc/footer.php');