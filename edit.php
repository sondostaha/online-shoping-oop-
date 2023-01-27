<?php 

include('inc/header.php');
session_start();

if(isset($_SESSION['id'])){
    header("location:ilogin.php");
    
  }
require_once('classes/product.php');

$id = $_GET['id'];

$prod = new Products;
$product =$prod->getOne($id);


?>
<div class="containr my-5">
    <div class="row">
    <div class="col-lg-6">
        <?php if(isset($_SESSION['errors'])) {?>
            <div class="alert alert-danger">
            <?php foreach($_SESSION['errors'] as $error) {?>
                <p class="text-center mb-0"><?php echo $error; ?></p>  
            <?php }?>
            </div>
        <?php }?>
        <?php unset($_SESSION['errors']); ?>
        <form method="post" action="handlers/handlerEdit.php?id=<?php echo $product['id'] ?>" >
        <div class="form-group" >
            <label for="exampleFormControlInput1">Product Name</label>
            <input type="name" class="form-control" id="exampleFormControlInput1" value="<?php echo $product['name'];?>" placeholder="product name" name="name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">price</label>
            <input type="number" class="form-control" name="price" value="<?php echo $product['price'];?>" placeholder="price">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Describtion</label>
            <textarea class="form-control"  rows="5" placeholder="Describtion"  name="desc"><?php echo $product['desc'];?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Edit</button>
        </form>
    </div>
    </div>
    
</div>


<?php include('inc/footer.php');