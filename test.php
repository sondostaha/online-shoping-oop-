<?php
require_once('classes/product.php');

$pro = new Products;

// echo $pro->update(9,[
//     'name'=> 'new product updated',
//     'desc'=> 'hiii product',
//     'img'=> '4.jpg',
//     'price'=> 100.99,
    
// ]);
// echo $pro->store([
//     'name'=> 'new product updated',
//     'desc'=> 'hiii product',
//     'img'=> '4.jpg',
//     'price'=> 100.99,
    

// ]);
// echo $pro->delete(9);
echo $pro->getAll();
