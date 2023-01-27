<?php include('inc/header.php');
//session_start();
require_once('classes/product.php');

$id = $_GET['id'];

$prod = new Products;
$product =$prod->getOne($id);


?>
<div class="containr my-5">
    <div class="row">
        <?php if($product == null) {
            echo "product NOt Found";}else{
            ?>
<div class="col-lg-6"></div>

<img src="images/<?php echo $product['img'];?>" class="img-fluid" >

<div class="col-lg-6">
    <h5><?php echo $product['name'];?></h5>
    <p class="text-muted">$<?php echo $product['price'];?></p>
    <p ><?php echo  $product['desc'];?></p>

    <a href="index.php" class="btn btn-primary">Back</a>
    <?php if (isset($_SESSION['id'])) { ?>
            <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-info">Edit</a>
            <a href="handlers/handelDelete.php?id=<?php echo $product['id'] ?>" class="btn btn-danger">Delete</a>
            <?php } ?>
</div>

   
           <?php }?>
            

      
    </div>
 
</div>


<?php include('inc/footer.php');