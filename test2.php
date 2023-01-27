<?php 

if(isset($_POST['submit'])){

    $img = $_FILES['img'];
    $name = $img['name'];
    $tmp_name = $img['tmp_name'];
    $ext = pathinfo($name)['extension'];
    $new_name = uniqid().'.'.$ext;

    move_uploaded_file($tmp_name, 'images/' . $new_name);




    // var_dump($img);
    // echo $name .'<br>';
    // echo $tmp_name . '<br>';
    // echo $ext;
    // echo $new_name;
}

?>
<form action="test2.php" enctype="multipart/form-data" method="post">

<input type="file" id="exampleFormControlFile1" name="img">
      
      <input type="submit" value="add" name="submit">

</form>