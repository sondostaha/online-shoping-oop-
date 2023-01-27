<?php 
session_start();

if(isset($_SESSION['id'])){
  header("location:login.php");
  
}
?>
<?php include('inc/header.php');?>

<div class="containr my-5">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">

      <?php if(isset($_SESSION['errors'])) {?>
        <div class="alert alert-danger">
          <?php foreach($_SESSION['errors'] as $error) {?>
            <p class="text-center mb-0"><?php echo $error; ?></p>  
          <?php }?>
        </div>
      <?php }?>
      <?php unset($_SESSION['errors']); ?>
      <form method="post" action="handlers/handeladd.php" enctype="multipart/form-data">
        <div class="form-group" >
          <label for="exampleFormControlInput1">Product Name</label>
          <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="product name" name="name">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">price</label>
          <input type="number" class="form-control" name="price" placeholder="price">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Describtion</label>
          <textarea class="form-control"  rows="5" placeholder="Describtion" name="desc"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">image</label>
          <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>
  </div>
</div>

<?php include('inc/footer.php');