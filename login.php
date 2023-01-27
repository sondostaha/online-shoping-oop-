<?php
session_start();
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
      <form method="post" action="handlers/handelLogin.php">
        <div class="form-group" >
          <label for="exampleFormControlInput1">Email</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="email" name="email">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">password</label>
          <input type="password" class="form-control" name="password" placeholder="password">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>
  </div>
</div>

<?php include('inc/footer.php');