<?php
session_start();

if(!isset($_SESSION['id'])){
    header("location:../login.php");
    die();
  }

require_once('../classes/product.php');
require_once('../classes/validation/validationInterface.php');
require_once('../classes/validation/validator.php');
use validation\ValidationInterface;

use validation\Validator;


//if form is submit
if(isset($_POST['submit'])){
    $id = $_GET['id'];
//read data 
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
   // $img = $_FILES['img'];

   //validaion
   $v = new Validator;

   $v->rules('name', $name, ['required', 'string', 'max:100']);

   $v->rules('price', $price, ['required', 'numaric']);
  
   $v->rules('desc', $desc, ['required', 'string']);
   $errors = $v->errors;
   //update data

    if ($errors == []) {
        $data = [
            'name' => $name,
            'price' => $price,
            'desc' => $desc,
            // 'img' =>'iny.jpg'
        ];

        $prod = new Products;
        $result = $prod->update($id, $data);

        if ($result == true) {
            
            header('location:../show.php?id=' . $id);
        }
        else{
            $_SESSION['errors'] = ['error updating in databsae'];
            header("Location:../edit.php?id=".$id);
        }
    }else{
        $_SESSION['errors'] = $errors;
        header("Location:../edit.php?id=".$id);
    }
}else{
    header("Location:../index.php");
}   