<?php include('inc/header.php');?>
<?php
session_start();

if(!isset($_SESSION['id'])){
    header("location:../login.php");
    die();
  }

require_once('../classes/product.php');
$id = $_GET['id'];
$prod = new Products;
$product = $prod->getOne($id);

$img = $product['img'];

unlink('../images/'.$img); // دي بتمسح الصوره من الفيل الاول بعدين بتمسح كل البيانات وبتاخد المسار بس




$result = $prod->delete($id);

if($result==true){
    header('location:../index.php');
}