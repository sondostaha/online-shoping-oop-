<?php
namespace helpers;
class Str{

    public static function limit($str)
    {
        if(strlen($str)>0){
        $str = substr($str, 0, 20) . '...';

        }
        return $str;
    }
    
}