<?php
namespace validation;
require_once('validationInterface.php');


class Max implements ValidationInterface{

    public $name;
    public $value;
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value= $value;  
    }
    public function validate(){

        if (strlen($this->value ) >100) {

            return "$this->name must be less than 100 char ";

        }
        return '';
    }
}