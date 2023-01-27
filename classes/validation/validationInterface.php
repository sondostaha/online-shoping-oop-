<?php

namespace validation;

interface ValidationInterface {
    public function __construct($name , $value);//name da عباره عن الاسم اللي حطيطه لكل اينبوت في ال بفورم 
    public function validate();
}
