<?php
namespace validation;

require_once('validationInterface.php');
require_once('Required.php');
require_once('max.php');
require_once('str.php');
require_once('numaric.php');
require_once('email.php');
require_once('requiredImage.php');
require_once('image.php');



class Validator{

    public $errors = [];

    private function makeValidaion(ValidationInterface $v)
    {
         return $v->validate();
    }
    public function rules($name, $value, array $rules)
    {

        foreach ($rules as $rule) {
            if ($rule = 'required-img') {
                $error = $this->makeValidaion(new RequiredImage($name, $value));
            }
            elseif ($rule = 'image') {
                $error = $this->makeValidaion(new Image($name, $value));
            }
            elseif($rule == 'required') 
            {
               $error = $this->makeValidaion(new Required($name, $value));
            }
            elseif ($rule = 'max:100') 
            {
               $error = $this->makeValidaion(new Max($name, $value));
            }
            elseif ($rule = 'string') 
            {
               $error = $this->makeValidaion(new Str($name, $value));
            }
            elseif ($rule = 'numaric') 
            {
               $error = $this->makeValidaion(new NUM($name, $value));

            }
            elseif ($rule = 'email') {
               $error = $this->makeValidaion(new Email($name, $value));
            } 
            else{
                $error = '';
            }
            
            if($error !=='')
            {
                array_push($this->errors , $error);
            }
        }
    }
}
    