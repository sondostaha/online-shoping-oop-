<?php

session_start();



require_once('../classes/product.php');
require_once('../classes/helpers/image.php');
require_once('../classes/validation/validator.php');
require_once('../classes/validation/validationInterface.php');

use helpers\image;
use validation\ValidationInterface;
use validation\validator;

if(!isset($_SESSION['id'])){
    header("location:../login.php");
    die();
  }
//if form is submit
if (isset($_POST['submit'])) {
    //read data 
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $img = $_FILES['img'];

    //validaion
    $v = new Validator;

    $v->rules('name', $name, ['required', 'string', 'max:100']);

    $v->rules('price', $price, ['required', 'numaric']);
   
    $v->rules('desc', $desc, ['required', 'string']);

    $v->rules('img', $img, ['required-img', 'image']);


    $errors = $v->errors;
//if data validate
    if ($errors==[]) {
        $image = new Image($img);
        //store data
        $data = [
            'name' => $name,
            'price' => $price,
            'desc' => $desc,
            'img' => $image->new_name
        ];

        $prod = new Products;
        $result = $prod->store($data);
        // if it stord successfully
        if ($result == true) {
            header('location:../index.php');

            $image->uplaod();
        }
        else{
            $_SESSION['errors'] = ['error storing in data base'];
            header('Location:../add.php');
        }

    } else {
        $_SESSION['errors'] = $errors;
        header("Location:../add.php");
    }
}