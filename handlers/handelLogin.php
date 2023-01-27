<?php
session_start();
require_once('../classes/validation/validationInterface.php');
require_once('../classes/validation/validator.php');
require_once('../classes/Admins.php');

use validation\validator;

if (isset($_POST['submit'])) {
    //read data 
    $email = $_POST['email'];
    $password = $_POST['password'];


    //validaion
    $v = new Validator;

    $v->rules('email', $email, ['required', 'email','max:100']);

    $v->rules('password', $password, ['required' , 'string']);

    $errors = $v->errors;
    //if data validate
    if ($errors == []) 
    {

        $admin = new Admin;
        $result =$admin->attempt($email, sha1($password));

        // if data stord successfully // لو الداتا دي متخزنه فعلا عندي
        if ($result !== null) 
        {
            $_SESSION['id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            header("location:../index.php");
        } 
        else 
        {
            $_SESSION['errors'] = ['your data is not correct'];
            header("location:../login.php");
        }

    }else{
    $_SESSION['errors'] = $errors;
    header("location:../login.php");
    } 
}else {
    
    header("location:../login.php");
}